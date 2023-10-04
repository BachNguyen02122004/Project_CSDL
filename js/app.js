document.addEventListener('DOMContentLoaded', function() {
  // Lấy danh sách các phần tử sản phẩm
  var productList = document.querySelectorAll('.product-item');
  var buy = document.querySelectorAll('.buy');
  var cart = document.querySelector('.header__cart-view');
  
  cart.addEventListener('click', function(e){
    e.preventDefault();
    var productLink = this.getAttribute('href');
    window.location.href = '../php/cart.php';
  });
  // Lặp qua từng phần tử sản phẩm và thêm sự kiện click
  productList.forEach(function(product) {
    product.addEventListener('click', function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
      var productLink = this.getAttribute('href');
      var id = productLink.split('=')[1]; // Lấy giá trị của tham số "id"
      window.location.href = '../php/product.php?id=' + id; // Chuyển hướng đến trang "connect.php" với tham số "id"
    });
  });
  
var images = document.querySelectorAll('.item-small');
images.forEach(function(image) {
  image.addEventListener('mouseover', function(e) {
    console.log(e);
    var url = image.getAttribute('src');
    var mainImage = document.getElementById('product-image').setAttribute('src', url);
  })
})

// Lấy các phần tử cần sử dụng
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
//       window.location.href = '../php/cart.php'; 
//   });
// });


});