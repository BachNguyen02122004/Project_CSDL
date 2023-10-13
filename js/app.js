
document.addEventListener('DOMContentLoaded', function() {

  const decreaseButtons = document.querySelectorAll('.item-down-up[aria-label="Decrease"]');
  const increaseButtons = document.querySelectorAll('.item-down-up:not([aria-label="Decrease"])');
  const inputElements = document.querySelectorAll('.text-number');
  handleDelete();
  
  
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
  
var images = document.querySelectorAll('.item-small');
images.forEach(function (image) {
  image.addEventListener('mouseover', function (e) {
  images.forEach(function(image) {
  image.addEventListener('mouseover', function(e) {
    console.log(e);
    var url = image.getAttribute('src');
    var mainImage = document.getElementById('product-image').setAttribute('src', url);
  })
})
  });
});
  
  });
  
  
  function handleDelete() {
    
    const eraseProduct = document.querySelectorAll('.erase-product');
  
    eraseProduct.forEach(btn => {
      btn.addEventListener('click', () => {
        const productId = btn.closest('.product-info').querySelector('#productId').textContent;
        console.log(productId);
        const formProduct = {
          productId: productId
        };
        deleteProduct(formProduct);
        
      });
    });
  };
  
    // xóa product id dùng call api
    function deleteProduct(id) {
      fetch('../php/delete_product.php', {
        method: 'DELETE',
        body: JSON.stringify(id),
        headers: {
          'Content-Type': 'application/json',
        },
      })
        .then(response => response.json())
        .then(data => {
          // Xử lý phản hồi từ server (nếu cần)
          console.log(data);
          window.location.href = '../php/cart.php';
        })
        
      
    }