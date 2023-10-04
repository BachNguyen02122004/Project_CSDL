
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
    
    fetch('../php/update_product.php', {
      method: 'POST',
      headers: {
              'Content-Type': 'application/json',
      }, 
      body: JSON.stringify( productId ),
    })
      .then(response => response.json())
      
      .then(callback)
      .then(data => {
        // Xử lý phản hồi từ server (nếu cần)
        console.log(data);
        window.location.href = "../php/cart.php";
      })
      

      .catch(error => {
        console.error('Lỗi:', error);
      });
  }