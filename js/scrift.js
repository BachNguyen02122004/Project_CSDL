
document.addEventListener('DOMContentLoaded', function() {
    handleCreate();
    // handleCreateProduct();
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

// function handleCreateProduct() {
//   var creatBtn = document.querySelector('.buy-fake-item');

//   creatBtn.onclick = function() {
//       var productId = document.querySelector('#product-id').innerHTML;
//       var name = document.querySelector('#product-name').innerHTML;
//       var image = document.getElementById('product-image').src;
//       console.log(name, image, productId);
//       var i = 0;
//       var formProduct = {
//           id : i++,
//           productId : productId, 
//           name : name, 
//           image  : image
//       }
//       addtoCart(formProduct);
      
//   }
// }




function addtoCart(productId, callback) {
    
    fetch('http://localhost/website/php/update_product.php', {
      method: 'POST',
      headers: {
              'Content-Type': 'application/json',
      }, 
      body: JSON.stringify( productId ),
    })
      .then(response => response.json())
      
      .then(callback)
      .then(data => {
        
        console.log(data);
        window.location.href = '../php/cart.php';
      })

      .catch(error => {
        console.error('Lỗi:', error);
      });
  }