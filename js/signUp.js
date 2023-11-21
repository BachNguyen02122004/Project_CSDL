
let i = 1;
document.addEventListener('DOMContentLoaded', function(){
    signUp();
  });
  
  function signUp(){
    const fullNameInput = document.getElementById('fullname');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const signUpButton = document.getElementById('sign-up-key');
    
    signUpButton.addEventListener('click', function(e){
      e.preventDefault();
      
      const userSignUp = {
        id : i++,
        fullName: fullNameInput.value,
        usernameInput: usernameInput.value,
        passwordInput: passwordInput.value
      };
  
      addUser(userSignUp);
    });
  }
  
  function addUser(user) {
    fetch('../php/addUser.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(user),
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          toast({
            title: "Thành công!",
            message: "Đăng ký thành công",
            type: "success",
            duration: 2500
          });
          setTimeout(function(){
            window.location.href = "../html/form.html";
          }, 2500);
          
        } else {
          console.error('Error:', data.error);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
  const main = document.querySelector('#toast');
  if (main) {
    const toast = document.createElement("div");

    // Auto remove toast
    const autoRemoveId = setTimeout(function () {
      main.removeChild(toast);
    }, duration + 1000);

    // Remove toast when clicked
    toast.onclick = function (e) {
      if (e.target.closest(".toast__close")) {
        main.removeChild(toast);
        clearTimeout(autoRemoveId);
      }
    };

    const icons = {
      success: "fas fa-check-circle",
      info: "fas fa-info-circle",
      warning: "fas fa-exclamation-circle",
      error: "fas fa-exclamation-circle"
    };
    const icon = icons[type];
    const delay = (duration / 2000).toFixed(2);

    toast.classList.add("toast", `toast--${type}`);
    toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

    toast.innerHTML = `
      <div class="toast__icon">
          <i class="${icon}"></i>
      </div>
      <div class="toast__body">
          <h3 class="toast__title">${title}</h3>
          <p class="toast__msg">${message}</p>
      </div>
      <div class="toast__close">
          <i class="fas fa-times"></i>
      </div>
    `;
    main.appendChild(toast);
  }
}