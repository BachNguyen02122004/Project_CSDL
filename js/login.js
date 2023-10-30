const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const loginButton = document.getElementById('loginKey');
const empty = document.querySelector(".empty-user");

usernameInput.addEventListener('input', checkInputValidity);
passwordInput.addEventListener('input', checkInputValidity);
// check empty
usernameInput.addEventListener('input', checkEmpty);

function checkInputValidity() {
  const usernameValue = usernameInput.value;
  const passwordValue = passwordInput.value;

  if (usernameValue.trim() !== "" && passwordValue.trim() !== "") {
    loginButton.disabled = false;

    loginButton.addEventListener('click', function (e) {
      e.preventDefault();
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
            console.error('Error:', data.error);
          } else {
            window.location.href = "../html/index.html";
          }
        })
        .catch(error => {
          console.error('There has been a problem with your fetch operation:', error);
        });
    });
  } else {
    loginButton.disabled = true;
  }
}

function checkEmpty(){
  const usernameValue = usernameInput.value;
  const passwordValue = passwordInput.value;

  if (usernameValue.trim() !== "" || passwordValue.trim() !== "") {
    empty.style.display = "none";
  } else {
    empty.style.display = "block";
  }
}