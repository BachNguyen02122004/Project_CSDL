document.addEventListener('DOMContentLoaded', function() {
  
  handleCreate();
  addtoCart();
  // loadCart();
});

var cart = [];


function handleCreate() {
  var creatBtn = document.querySelector('.buy');

  creatBtn.onclick = function() {
      var productId = document.querySelector('#product-id').innerHTML;
      var name = document.querySelector('#product-name').innerHTML;
      var image = document.getElementById('product-image').src;
      var quantity = parseInt(document.querySelector('.text-number').value);

      if (productId && name && image && !isNaN(quantity)) {
          var existingProductIndex = cart.findIndex(function(item) {
              return item.productId === productId;
          });

          if (existingProductIndex !== -1) {
              // If the product exists, increase the quantity
              if (cart[existingProductIndex].quantity !== undefined) {
                  cart[existingProductIndex].quantity += quantity;
                  console.log(productId, image, name, cart[existingProductIndex].quantity);
              } else {
                  cart[existingProductIndex].quantity = quantity;
                  
              }
          } 
          var i = 0;
              // If the product doesn't exist, add it to the cart
              var formProduct = {
                  id : cart.length + 1,
                  productId: productId,
                  name: name,
                  image: image,
                  quantity: quantity
              };
              cart.push(formProduct);
              cart.forEach(function(e) {
                console.log(e);
              })
              addtoCart(cart[cart.length - 1]);
      }
  }
}

function addtoCart(cart, callback) {
  fetch('http://localhost/website/php/update_product.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(cart), 
  })
    .then((response) => response.json())
    .then(callback)
    .then((data) => {
      console.log(data);
      window.location.href = '../php/cart.php';
    })
    .catch((error) => {
      console.error('Lỗi:', error);
    });
}
