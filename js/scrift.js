document.addEventListener('DOMContentLoaded', function () {

  handleCreate();
  addtoCart();
  // loadCartFromLocalStorage();
});

function handleCreate() {

  var creatBtn = document.querySelector('.buy');

  creatBtn.onclick = function () {

    var productId = document.querySelector('#product-id').innerHTML;
    var name = document.querySelector('#product-name').innerHTML;
    var image = document.getElementById('product-image').src;
    var quantity = parseInt(document.querySelector('.text-number').value);


    //changed
    var TypeId = 1;

    var selectedElement = document.querySelector('.color-1.selected');
    if (selectedElement !== null && selectedElement !== undefined) {
      var type = selectedElement.innerHTML;
      switch (type) {
        case 'Đen':
          TypeId = 1;
          console.log(type);
          break;
        case 'Trắng':
          TypeId = 2;
          console.log(type);
          break;
        case 'Vàng':
          TypeId = 3;
          console.log(type);
          break;
        case 'Đỏ':
          TypeId = 4;
          console.log(type);
          break;
        case 'Nâu':
          TypeId = 5;
          console.log(type);
          break;
        default:
          console.log("Unknown color: " + type);
          break;
      }
    } else {
      console.log("Selected element is null or undefined. Using default TypeId: " + TypeId);
    }


    if (productId && name && image && !isNaN(quantity)) {
      var cart = getCartFromLocalStorage();
      var maxId = cart.reduce(function (max, product) {
        return product.id > max ? product.id : max;
      }, 0);
      // If the product doesn't exist, add it to the cart
      //changed
      var formProduct = {
        id: maxId + 1,
        productId: productId,
        name: name,
        image: image,
        quantity: quantity,
        TypeId: TypeId
      };
      // cart.push(formProduct);
      // setCartToLocalStorage(cart);
      // cart.forEach(function (e) {

      //   console.log(e, cart.length);
      // });

      addtoCart(formProduct);
      productCount++;
      // saveCartToLocalStorage();
    }
  }
}
function setCartToLocalStorage(cart) {
  localStorage.setItem('cart', JSON.stringify(cart));
}

function getCartFromLocalStorage() {
  var cartData = localStorage.getItem('cart');
  return cartData ? JSON.parse(cartData) : [];
}

function saveCartToLocalStorage() {
  localStorage.setItem('cart', JSON.stringify(cart));
  localStorage.setItem('productCount', productCount.toString());
}
function loadCartFromLocalStorage() {
  var cart = getCartFromLocalStorage();
}


function addtoCart(product, callback) {
  fetch('../php/update_product.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(product),
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