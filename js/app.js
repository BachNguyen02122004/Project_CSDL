document.addEventListener('DOMContentLoaded', function() {
  // Lấy danh sách các phần tử sản phẩm
  var productList = document.querySelectorAll('.product-item');

  // Lặp qua từng phần tử sản phẩm và thêm sự kiện click
  productList.forEach(function(product) {
    product.addEventListener('click', function(event) {
      event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
      var productLink = this.getAttribute('href');
      var id = productLink.split('=')[1]; // Lấy giá trị của tham số "id"
      window.location.href = './connect.php?id=' + id; // Chuyển hướng đến trang "connect.php" với tham số "id"
    });
  });
});

var images = document.querySelectorAll('.item-small');
images.forEach(function(image) {
  image.addEventListener('click', function(e) {
    var url = image.getAttribute('src');
    var mainImage = document.getElementById('product-image').setAttribute('src', url);
  })
})


