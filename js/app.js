document.addEventListener('DOMContentLoaded', function() {
  // Lấy danh sách các phần tử sản phẩm
  var productList = document.querySelectorAll('.product-item');

  // Lặp qua từng phần tử sản phẩm và thêm sự kiện click
  productList.forEach(function(product) {
    product.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default behavior of the link
      var productLink = this.getAttribute('href');
      window.location.href = './link.html';
    });
  });
  
});