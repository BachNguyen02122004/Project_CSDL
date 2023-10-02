document.addEventListener('DOMContentLoaded', function () {
  // Lấy danh sách các phần tử sản phẩm
  var productList = document.querySelectorAll('.product-item');
  var buy = document.querySelectorAll('.buy');
  var cart = document.querySelector('.header__cart-view');
<<<<<<< HEAD
  
  cart.addEventListener('click', function(e){
    e.preventDefault();
    var productLink = this.getAttribute('href');
    window.location.href = '../php/cart.php';
=======
  cart.addEventListener('click', function (e) {
    e.preventDefault();
    var productLink = this.getAttribute('href');
    window.location.href = '../html/cart.php';
>>>>>>> f651abca2307d5119b299032fd198cf1f469f740
  });
  // Lặp qua từng phần tử sản phẩm và thêm sự kiện click
  productList.forEach(function (product) {
    product.addEventListener('click', function (event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
      var productLink = this.getAttribute('href');
      var id = productLink.split('=')[1]; // Lấy giá trị của tham số "id"
      window.location.href = '../php/product.php?id=' + id; // Chuyển hướng đến trang "connect.php" với tham số "id"
    });
  });
<<<<<<< HEAD
  
=======


  buy.forEach(function (e) {
    e.addEventListener('click', function (event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
      var productLink = this.getAttribute('href');
      window.location.href = '../html/cart.php';

    });
  });
});



>>>>>>> f651abca2307d5119b299032fd198cf1f469f740
var images = document.querySelectorAll('.item-small');
images.forEach(function (image) {
  image.addEventListener('mouseover', function (e) {
    console.log(e);
    var url = image.getAttribute('src');
    var mainImage = document.getElementById('product-image').setAttribute('src', url);
  })
})

// Lấy các phần tử cần sử dụng
<<<<<<< HEAD
const decreaseButtons = document.querySelectorAll('.item-down-up[aria-label="Decrease"]');
const increaseButtons = document.querySelectorAll('.item-down-up:not([aria-label="Decrease"])');
const inputElements = document.querySelectorAll('.text-number');

// Thiết lập sự kiện khi nhấn nút giảm
decreaseButtons.forEach(function (button, index) {
  button.addEventListener('click', function () {
    let value = parseInt(inputElements[index].value);

    if (value > 1) {
      value--;
      inputElements[index].value = value;
      console.log(value);
    }
  });
});

// Thiết lập sự kiện khi nhấn nút tăng
increaseButtons.forEach(function (button, index) {
  button.addEventListener('click', function () {
    let value = parseInt(inputElements[index].value);
    console.log(value);
    value++;
    inputElements[index].value = value;
  });
});


// buy.forEach(function(e){
//   e.addEventListener('click', function(event){
//     event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
//       var productLink = this.getAttribute('href');
//       var productId = this.getAttribute('id'); // Lấy ID sản phẩm từ thuộc tính data
//       addtoCart(productId);
//       console.log(productId);
     

//   });
// });


// function addtoCart(productId) {
//   // Gửi yêu cầu AJAX hoặc fetch API để thêm sản phẩm vào cơ sở dữ liệu
//   // Ví dụ sử dụng fetch API và PHP
//   fetch('update_product.php', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json',
//     },
//     body: JSON.stringify( productId ),
//   })
//     .then(response => response.json())
//     .then(data => {
//       // Xử lý phản hồi từ server (nếu cần)
//       console.log(data);
//       // Render sản phẩm đã mua trong trang giỏ hàng
//       renderCartItem(productId);
//     })
//     .catch(error => {
//       console.error('Lỗi:', error);
//     });
// }

});
=======
document.addEventListener('DOMContentLoaded', function () {
  const decreaseButton = document.querySelector('.item-down-up[aria-label="Decrease"]');
  const increaseButton = document.querySelector('.item-down-up:not([aria-label="Decrease"])');
  const inputElement = document.querySelector('.text-number');

  decreaseButton.addEventListener('click', function () {
    let value = parseInt(inputElement.value);

    if (value > 1) {
      value--;
      inputElement.value = value;
    }
  });


  increaseButton.addEventListener('click', function () {
    let value = parseInt(inputElement.value);

    value++;
    inputElement.value = value;
  });

});


document.addEventListener('DOMContentLoaded', function () {
  //add to cart
  var userID = 1;
  var productID = 4;

  var addToCartButton = document.querySelectorAll('.buy');

  addToCartButton.addEventListener('click', function () {
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "../php/addToCart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var data = "productID=" + productID + "&userID=" + userID;

    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {

        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          console.log("sending success message");
        } else {
          console.log(response.error);
        }
      }
    };

    xhr.send(data);
  });
});
>>>>>>> f651abca2307d5119b299032fd198cf1f469f740
