const endpoint3 = '../php/getUsername.php';

  fetch(endpoint3, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => response.json())
    .then(data => {
      const userNameElement = document.getElementsByClassName('navbar__user-name')[0];
      const logoutButton = document.getElementById('logout');
      const userImageElement = document.getElementById('user_image');

      if (data.username !== null) {
        userNameElement.innerHTML = data.username;
        logoutButton.innerHTML = '<a href="../html/form.html">Đăng xuất</a>';
        userImageElement.src = "../img/admin.jpg";
      } else {
        userNameElement.innerHTML = 'Guest';
        logoutButton.innerHTML = '<a href="../html/form.html">Đăng nhập</a>';
        userImageElement.src = "../img/guest.png";
      }
    })
    .catch(error => {
      document.getElementsByClassName('navbar__user-name')[0].innerHTML = 'Guest';
    });
