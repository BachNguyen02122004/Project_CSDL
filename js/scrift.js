
document.addEventListener('DOMContentLoaded', function() {
    handleCreate();
    addtoCart();
});




function handleCreate() {
    var creatBtn = document.querySelector('.buy');

    creatBtn.onclick = function() {
        var productId = document.querySelector('#product-id').innerHTML;
        var name = document.querySelector('#product-name').innerHTML;
        var image = document.getElementById('product-image').src;
        console.log(name, image, productId);
        var i = 0;
        var formProduct = {
            id : i++,
            productId : productId, 
            name : name, 
            image  : image
        }
        addtoCart(formProduct);
    }
}


function addtoCart(productId, callback) {
    // Gửi yêu cầu AJAX hoặc fetch API để thêm sản phẩm vào cơ sở dữ liệu
    // Ví dụ sử dụng fetch API và PHP
    fetch('http://localhost/website/php/update_product.php', {
      method: 'POST',
      headers: {
              'Content-Type': 'application/json',
      }, 
      body: JSON.stringify( productId ),
    })
      .then(response => response.json())
      .then(data => {
        // Xử lý phản hồi từ server (nếu cần)
        console.log(data);
        // Render sản phẩm đã mua trong trang giỏ hàng
      })
      .then(callback)

      .catch(error => {
        console.error('Lỗi:', error);
      });
  }