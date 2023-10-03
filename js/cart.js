
document.addEventListener('DOMContentLoaded', function() {
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

});