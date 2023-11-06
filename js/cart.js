
const decreaseButtons = document.querySelectorAll('.item-down-up[aria-label="Decrease"]');
const increaseButtons = document.querySelectorAll('.item-down-up:not([aria-label="Decrease"])');
const inputElements = document.querySelectorAll('.text-number');
const real_coins = Array.from(document.querySelectorAll(".coin-item-cart")).map(element => element.textContent);
const coinsElement = document.querySelectorAll("#coin-number");
const coins = [];
let total_coin = parseInt(document.querySelector(".real-coin").textContent.replace(/\D/g, ""));
const productId= document.querySelectorAll('#productId');
const typeProduct = document.querySelectorAll('#TypeProduct');


document.addEventListener('DOMContentLoaded', function () {
  // console.log(total_coin);
  // console.log(coins);

  handleDelete(); 
  changePage();

  decreaseButtons.forEach(function (button, index) {
    button.addEventListener('click', function () {
      let value = parseInt(inputElements[index].value);

      if (value > 1) {
        value--;
        inputElements[index].value = value;
        coins[index] = parseInt(real_coins[index].replace(/\D/g, "")) * inputElements[index].value;
        total_coin -= parseInt(real_coins[index].replace(/\D/g, ""));
        console.log(productId[index]);

        var url = "../php/dataChange.php?index=" + encodeURIComponent((productId[index].innerHTML)) + "&value=" + encodeURIComponent(value) + "&productType=" + encodeURIComponent(typeProduct[index].innerHTML);
        fetch(url, {
          method: 'POST', // Use POST method to send data
          headers: {
            'Content-Type': 'application/json' // Set content type to JSON
          }
        })
          .then(response => response.json())
          .then(data => {
            // Handle the response from the PHP file
            console.log(data);
          })
          .catch(error => {
            // Handle errors
            console.error('Error:', error);
          });

        updateTotalPrice(index);
        updateTotalCoin();
      }
    });
  });

  // Thiết lập sự kiện khi nhấn nút tăng
  increaseButtons.forEach(function (button, index) {
    button.addEventListener('click', function () {
      let value = parseInt(inputElements[index].value);
      value++;
      console.log(value);
      console.log(productId[index]);
      console.log(typeProduct);
      var url = "../php/dataChange.php?index=" + encodeURIComponent((productId[index].innerHTML)) + "&value=" + encodeURIComponent(value) + "&productType=" + encodeURIComponent(typeProduct[index].innerHTML);
      fetch(url, {
        method: 'POST', // Use POST method to send data
        headers: {
          'Content-Type': 'application/json' // Set content type to JSON
        }
      })
        .then(response => response.json())
        .then(data => {
          // Handle the response from the PHP file
          console.log(data);
        })
        .catch(error => {
          // Handle errors
          console.error('Error:', error);
        });

      inputElements[index].value = value;
      coins[index] = parseInt(real_coins[index].replace(/\D/g, "")) * inputElements[index].value;
      total_coin += parseInt(real_coins[index].replace(/\D/g, ""));
      updateTotalPrice(index);
      updateTotalCoin();
    });
  });
});

function updateTotalPrice(index) {

  const quantity = inputElements[index].value;
  const totalPriceElement = document.querySelectorAll('.coin-number')[index];
  const totalPrice = coins[index];

  totalPriceElement.textContent = '₫' + totalPrice.toLocaleString('vi-VN');

}

function updateTotalCoin() {
  const totalCoinElement = document.querySelector('.real-coin');

  const formattedTotalCoin = total_coin.toLocaleString('vi-VN');
  //console.log(formattedTotalCoin);
  totalCoinElement.textContent = "₫" + formattedTotalCoin;
}


//changed
function handleDelete() {

  const eraseProduct = document.querySelectorAll('.erase-product');

  eraseProduct.forEach(btn => {
    btn.addEventListener('click', () => {
      const productId = btn.closest('.product-info').querySelector('#productId').textContent;
      const typeId = btn.closest('.product-info').querySelector('#TypeProduct').textContent;
      console.log(productId);
      const formProduct = {
        productId: productId,
        typeId: typeId
      };
      deleteProduct(formProduct);

    });
  });
};

function changePage(){
  const button = document.querySelector('.buy-product-cart');
  button.addEventListener('click', function(e){
    e.preventDefault();
    window.location.href = "../html/checkout.html";
  })
}

// xóa product id dùng call api
function deleteProduct(id) {
  fetch('../php/delete_product.php', {
    method: 'DELETE',
    body: JSON.stringify(id),
    headers: {
      'Content-Type': 'application/json',
    },
  })
    // .then(response => response.json())
    .then(data => {
      // Xử lý phản hồi từ server (nếu cần)
      // console.log(data); 
      window.location.href = '../php/cart.php';
    })


}