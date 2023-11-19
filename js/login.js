const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const loginButton = document.getElementById('loginKey');
const empty = document.querySelector(".empty-user");

document.addEventListener('DOMContentLoaded', function(){
  usernameInput.addEventListener('input', checkInputValidity);
  passwordInput.addEventListener('input', checkInputValidity);
  usernameInput.addEventListener('input', checkEmpty);
  loginButton.addEventListener('click', clickBtn);
});

function checkInputValidity() {
  const usernameValue = usernameInput.value;
  const passwordValue = passwordInput.value;
  
  if (usernameValue.trim() !== "" && passwordValue.trim() !== "") {
    loginButton.disabled = false;
  } else {
    loginButton.disabled = true;
  }
}


function clickBtn(e) {
  e.preventDefault();
  const usernameValue = usernameInput.value;
  const passwordValue = passwordInput.value;
  console.log(usernameValue, passwordValue);
  
  const url = `../php/checkLogin.php?username=${usernameValue}&password=${passwordValue}`;

  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      
      return response.json();
    })
    .then(data => {
      if (data.error) {
        toast({
          title: "Thất bại!",
          message: "Đăng nhập thất bại",
          type: "error",
          duration: 2500
        });
        console.error('Error:', data.error);
      } else {
        toast({
          title: "Thành công!",
          message: "Đăng nhập thành công",
          type: "success",
          duration: 2500
        });
        setTimeout(function(){
          window.location.href = "../html/index.html";
        }, 2500);
        
      }
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

function checkEmpty() {
  const usernameValue = usernameInput.value;
  const passwordValue = passwordInput.value;

  if (usernameValue.trim() !== "" || passwordValue.trim() !== "") {
    empty.style.display = "none";
  } else {
    empty.style.display = "block";
  }
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