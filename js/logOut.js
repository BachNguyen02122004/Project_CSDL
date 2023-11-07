const logoutButton = document.getElementById('logout');

logoutButton.addEventListener('click', () => {
  const url = '../php/logOut.php';
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
  })
  .then(response => response.json())
  .then(data => {
    console.log('Logout successful:', data);
  })
  .catch(error => {
    console.error('Logout failed:', error);
  });
});
