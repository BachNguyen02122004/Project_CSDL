const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const loginButton = document.getElementById('loginKey');


usernameInput.addEventListener('input', checkInputValidity);
passwordInput.addEventListener('input', checkInputValidity);

checkInputValidity();

function checkInputValidity() {
  const usernameInput = document.getElementById('username').value;
  const passwordInput = document.getElementById('password').value;
  const loginButton = document.getElementById('loginKey');

  if (usernameInput.trim() !== "" && passwordInput.trim() !== "") {
    loginButton.disabled = false;

    passwordInput = hashPassword(usernameInput);

    const url = `../php/checkLogin.php?username=${encodeURIComponent(usernameInput)}&password=${encodeURIComponent(passwordInput)}`;

    loginButton.addEventListener('click', function () {
      fetch(url, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
        },
      })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          if (data.error) {
            //document.getElementById('error-message').textContent = data.error;
          } else {
            
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

async function hashPassword(password) {
  const encoder = new TextEncoder();
  const data = encoder.encode(password);
  const hashBuffer = await crypto.subtle.digest('SHA-256', data);
  const hashArray = Array.from(new Uint8Array(hashBuffer));
  const hashedPassword = hashArray.map(byte => byte.toString(16).padStart(2, '0')).join('');
  return hashedPassword;
}
