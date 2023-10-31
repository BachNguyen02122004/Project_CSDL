

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
          window.location.href = "../html/form.html";
        } else {
          console.error('Error:', data.error);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }