document.addEventListener('DOMContentLoaded', function () {
  // Lấy danh sách các phần tử sản phẩm
  var productList = document.querySelectorAll('.product-item');
  var buy = document.querySelectorAll('.buy');
  var cart = document.querySelector('.header__cart-view');
  cart.addEventListener('click', function (e) {
    e.preventDefault();
    var productLink = this.getAttribute('href');
    window.location.href = '../html/cart.php';
  });
  // Lặp qua từng phần tử sản phẩm và thêm sự kiện click
  productList.forEach(function (product) {
    product.addEventListener('click', function (event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
      var productLink = this.getAttribute('href');
      var id = productLink.split('=')[1]; // Lấy giá trị của tham số "id"
      window.location.href = '../php/connect.php?id=' + id; // Chuyển hướng đến trang "connect.php" với tham số "id"
    });
  });
});



var images = document.querySelectorAll('.item-small');
images.forEach(function (image) {
  image.addEventListener('mouseover', function (e) {
    console.log(e);
    var url = image.getAttribute('src');
    var mainImage = document.getElementById('product-image').setAttribute('src', url);
  })
})



// Lấy các phần tử cần sử dụng
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
