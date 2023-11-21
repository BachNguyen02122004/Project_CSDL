// thay đổi địa chỉ
const address = document.querySelector('.info-item-1');
const info = document.querySelector('.infomation-item');
console.log(info.innerHTML);

var addressID;
var theID;
var changeAdd;

async function handleAddChangeAddress() {
  const btn = document.querySelector('.change-item');
  console.log(btn);
  btn.addEventListener('click', async function (e) {
    e.preventDefault();
    let aside = document.querySelector('aside');
    if (!aside) {
      const div = document.createElement('aside');
      div.className = "lfYZV2";
      const root = document.querySelector('#container');

      try {
        const response = await fetch('../php/getAddress.php');
        const data = await response.json();
        var cnt = 0;

        let addressHTML = `<div class="PLRlNg">
                            <div class="_3Vkt1z">
                                <div class="_3LZNLo">
                                    <div class="qM6DTY">
                                        <div>Địa Chỉ Của Tôi</div>
                                    </div>
                                    <div class="X278ad jD5CHU">
                                        <div class="stardust-spinner--hidden stardust-spinner">
                                            <div class="stardust-spinner__background">
                                                <div class="stardust-spinner__main" role="img"><svg width="34" height="12" viewBox="-1 0 33 12">
                                                        <circle class="stardust-spinner__spinner" cx="4" cy="6" r="4" fill="#EE4D2D"></circle>
                                                        <circle class="stardust-spinner__spinner" cx="16" cy="6" r="4" fill="#EE4D2D"></circle>
                                                        <circle class="stardust-spinner__spinner" cx="28" cy="6" r="4" fill="#EE4D2D"></circle>
                                                    </svg></div>
                                            </div>
                                        </div>
                                        <div role="radiogroup" aria-label="Địa Chỉ Của Tôi">`;

        data.forEach(row => {
          // Access each attribute in the row
          cnt++;
          const addID = row.id;
          const fullname = row.name;
          const sdt = row.phone_number;
          const addressLine1 = row.address_line1;
          const addressLine2 = row.address_line2;
          const is_default = row.is_default;

          addressHTML += `<div class="_79Pezb -wWYCG">
                            <div class="address_id${cnt}" style="display:none">${addID}</div>
                            <div class="oMEsz4">
                                <div class="stardust-radio stardust-radio--checked" tabindex="0" role="radio" aria-checked="false"
                                    aria-disabled="false"
                                    aria-labelledby="address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_header address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_content address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_badge address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_invalid-flag">
                                    <div class="stardust-radio-button${cnt === 1 ? ' stardust-radio-button--checked' : ''}"> 
                                      <div class="stardust-radio-button__outer-circle">
                                            <div class="stardust-radio-button__inner-circle"></div>
                                        </div>
                                    </div>
                                    <div class="stardust-radio__content">
                                        <div class="stardust-radio__label"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="nL8Pxz">
                                <div role="heading" class="_5iyJY7 phl0s1">
                                    <div id="address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_header" class="CYaaBD QDEIR1"><span
                                            class="luHECB vNAC0j">
                                            <div class="_4oCLBy">${fullname}</div>
                                        </span>
                                        <div class="FR0iUj"></div>
                                        <div role="row" class="MzzQoA oZLC5C lQPEK6">(+84) ${sdt}</div>
                                    </div>
                                    <div class="MPRaRR"><button class="JCO1ui" fdprocessedid="4shkxk">Cập nhật</button>
                                    </div>
                                </div>
                                <div id="address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_content" role="heading" class="_5iyJY7 phl0s1">
                                    <div class="CYaaBD QDEIR1">
                                        <div class="gSHonO">
                                            <div role="row" class="lQPEK6">${addressLine1}</div>
                                        </div>
                                    </div>
                                    <div class="nC8H0V MPRaRR"></div>
                                </div>
                                <div id="address-card_9f8036a7-b0ac-4266-ab42-9e12c3d2a202_badge" role="row" class="KDcxI9 lQPEK6"><span
                                        role="mark" class="RQY2Ux ar+2Gw vg3e9N">Mặc định</span>
                                </div>
                            </div>
                        </div>`;
        })

        addressHTML += `</div><button class="cN4f-L NCvv2A D7bRLo add-item" fdprocessedid="6f4us"><svg viewBox="0 0 10 10"
                          class="Ecxm7g">
                          <path stroke="none" d="m10 4.5h-4.5v-4.5h-1v4.5h-4.5v1h4.5v4.5h1v-4.5h4.5z"></path>
                      </svg>Thêm Địa Chỉ Mới</button>
                  </div>
                  <div class="lmuINm"><button class="u5sL-t cN4f-L NCvv2A D7bRLo btn-exit"
                      fdprocessedid="cl704v">Huỷ</button><button class="RZP5QG NCvv2A qouWQk" fdprocessedid="ev74p">Xác
                      nhận</button></div>
                  </div>
                  </div>
                  </div>
                  <div class="WrX5pq"></div>`;

        div.innerHTML = addressHTML;

        root.appendChild(div);
        const checkboxes = document.querySelectorAll('.stardust-radio-button');
        const inner = document.querySelector('.stardust-radio-button__inner-circle');
        const outer = document.querySelector('.stardust-radio-button__outer-circle');
        console.log(outer);
        console.log(inner);
        // xử lý đổi checked
        checkboxes.forEach((checkbox, index) => {
          console.log(checkboxes);
          checkbox.addEventListener('click', () => {
            addressID = '.address_id' + (index + 1);
            theID = document.querySelector(addressID).innerHTML;
            changeAdd = "../php/changeAddress.php?id=" + encodeURIComponent(theID);

            console.log(checkboxes[index]);
            checkboxes.forEach((cb, innerIndex) => {
              console.log(innerIndex);
              cb.classList.remove('stardust-radio-button--checked');
              console.log(cb);
            });


            checkboxes[index].classList.add('stardust-radio-button--checked');
            console.log(checkboxes[index]);
            changeAddress(index);

          })

        });

        exit();
        handleCreateAddress();
      } catch (error) {
        console.error('Error fetching data from the database:', error);
      }
    }
    else {
      aside.style.display = 'flex';
      saveAddressToLocalStorage();
    }
  })
}


function saveAddressToLocalStorage() {
  const address = document.querySelector('.info-item-1');
  if (address) {
    const addressHTML = address.innerHTML;
    const storedAddress = localStorage.getItem('address');
    if (addressHTML !== storedAddress) {
      localStorage.setItem('address', addressHTML);
    }
  }
}

document.addEventListener('DOMContentLoaded', function () {
  handleAddChangeAddress();
  // loadAddressFromLocalStorage();
});


function changeAddress(index) {
  const button = document.querySelector('.RZP5QG');
  console.log(button);
  button.addEventListener('click', function (e) {
    e.preventDefault();
    const change = document.querySelectorAll('.gSHonO');
    const address = document.querySelector('.info-item-1');
    if (address && change.length > index) {
      address.innerHTML = change[index].innerHTML;
      const aside = document.querySelector('aside');
      aside.style.display = 'none';

      saveAddressToLocalStorage();
      updateDisplayedAddress(address.innerHTML, index);
    }

    fetch(changeAdd, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
    })
      .then(response => response.json())
      .then(data => {
        // Xử lý kết quả trả về từ server
        console.log(data);
      })
      .catch(error => {
        // Xử lý lỗi nếu có
        console.error(error);
      });
      window.location.reload();
  });
}

function exit() {
  const button = document.querySelector('.btn-exit');
  console.log(button);
  button.addEventListener('click', function (e) {
    e.preventDefault();
    const aside = document.querySelector('aside');
    if (aside) {
      aside.style.display = 'none';
    }
  });
}

function updateDisplayedAddress(addressHTML, index) {
  const addressElements = document.querySelectorAll('.gSHonO');
  if (addressElements.length > index) {
    addressElements[index].innerHTML = addressHTML;
  }
}


function handleCreateAddress() {
  const btn = document.querySelector('.add-item');
  console.log(btn);
  btn.addEventListener('click', function (e) {
    e.preventDefault();
    const newCreate = document.querySelector('._3Vkt1z');
    console.log(newCreate);
    const newDiv = document.createElement('div');
    const changDiv = document.querySelector('._3LZNLo');
    newDiv.innerHTML = '<div class="OQ30XY"><div class="u+U3aD">Địa chỉ mới</div><form><div class="Eb7GWV"><div class="_9eRQLw"><div class="L9HW8v"><div class="K-poJS jdMqY8"><div class="HgxESG"><div class="PEzOwl">Họ và tên</div><input class="fasO4g" type="text" placeholder="Họ và tên" autocomplete="name" maxlength="64" aria-describedby="input-error-message_60bb6ecc-0d8f-4682-9d96-5d58c33d6b0d" value="" fdprocessedid="2t3nyv"></div></div><div class="tpACWk"></div><div class="K-poJS CtC2LZ"><div class="HgxESG"><div class="PEzOwl">Số điện thoại</div><input class="fasO4g" type="text" placeholder="Số điện thoại" autocomplete="user-address-phone" aria-describedby="phone-error-message_8ccaf1db-6c05-462c-bfd5-d7447ffb60a5" value="" fdprocessedid="j4ell"></div></div></div><div class="L9HW8v"><div class="m5RZka"><div class="sxTpqI"><div class="VePcq8"><div class="CiVSHD">Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã</div><div class="JjPh4H _5z99K0">Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã</div><input class="i7whFJ MgsReA" type="text" placeholder="Tỉnh/ Thành phố, Quận/Huyện, Phường/Xã" value="" fdprocessedid="akrbzb"><div class="_2Z-v7G"><div class="Ttkjwu"></div><div class="RCkTSv"></div></div></div></div></div></div><div class="L9HW8v"><div class="+Xl5nl"><div class="n17Gd9 arFjjr _6KpdBY"><div class="NyBSWA"><div class="_1j9jyh">Địa chỉ cụ thể</div><textarea class="KyMAqX"  rows="2" placeholder="Địa chỉ cụ thể" autocomplete="user-street-address" maxlength="128"></textarea></div></div><div class="k1bYqA"></div></div></div><div class="L9HW8v"><div class="enAKBW"><div class="SW6kJd _3K4n6U u-bILp"><svg fill="none" viewBox="0 0 440 120" preserveAspectRatio="xMidYMid slice" class="kdOXMk"><g clip-path="url(#clip0)"><path fill="#F7F8F9" d="M0 0h440v120H0z"></path><g filter="url(#filter0_d)" stroke="#FBFBFC"><path stroke-width="10" d="M-6.779-.48l123 61"></path><path stroke-width="12" d="M11.524 124.548l30-67"></path><path stroke-width="10" d="M-7.796 33.512l112 55"></path><path stroke-width="12" d="M103.473 88.664l41-97"></path><path stroke-width="10" d="M322.96 33.054l35-48m5.078 109.853l-51-10M442.064 94l-78 1"></path><path stroke-width="12" d="M410.037 130.663l-4-36"></path><path stroke-width="11" d="M73.36 39.047l28-44"></path><path stroke-width="12" d="M31.552 19.486l12-26"></path><path stroke-width="10" d="M116.01 60.422l41 18"></path><path stroke-width="12" d="M140.286 123.17l41-128"></path><path stroke-width="10" d="M164.244 42.682l-32-12"></path><path stroke-width="11" d="M256.298 124.068l-89-81"></path><path stroke-width="10" d="M242.102 24.626l-78-32M273.319-4.26l-80 71m26.348 26.974l-82 29m184.93-91.441l-102 62"></path><path stroke-width="11" d="M144.386 123.146l-39-34"></path><path stroke-width="12" d="M79.949 125.762l25-39"></path><path d="M241.5-7c18 8 70.203 32.864 82 39.5 16 9 39.5 35 39.5 61 0 27-18 34.5-28.5 42.5" stroke-width="10"></path><path d="M240 23.5c31 25.5 74 52 72.5 62s-51.5 28.333-77 41M337.5 13s23.5-7 28-8S445 7.5 445 7.5" stroke-width="10"></path><path d="M413 4c-1 13-3.4 40.5-5 42.5s-39.667 9-56 12" stroke-width="11"></path></g></g><defs><clipPath id="clip0"><path fill="#fff" d="M0 0h440v120H0z"></path></clipPath><filter id="filter0_d" x="-14" y="-21.892" width="463.232" height="165.869" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feGaussianBlur stdDeviation="2"></feGaussianBlur><feComposite in2="hardAlpha" operator="out"></feComposite><feColorMatrix values="0 0 0 0 0.960784 0 0 0 0 0.964706 0 0 0 0 0.968627 0 0 0 1 0"></feColorMatrix><feBlend in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend><feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend></filter></defs></svg><button class="PLnnGY iQJLI-" disabled=""><svg viewBox="0 0 10 10" class="wE-wmI"><path stroke="none" d="m10 4.5h-4.5v-4.5h-1v4.5h-4.5v1h4.5v4.5h1v-4.5h4.5z"></path></svg>Thêm vị trí</button></div></div></div><div class="uYQOHY"><div class="Tt8CsJ">Loại địa chỉ:</div><div class="TKOOaH" role="radiogroup" aria-label="Loại địa chỉ:" aria-describedby="label-group-error-message_d1e42654-f5ff-4932-85bb-50d9405aeabc"><div class="tMgqZi" role="radio" aria-checked="false" aria-disabled="false" tabindex="0"><span class="rDR-NV">Nhà Riêng</span></div><div class="tMgqZi" role="radio" aria-checked="false" aria-disabled="false" tabindex="0"><span class="rDR-NV">Văn Phòng</span></div></div></div><div class="my9d4K"><label class="_2VPxCf"><input class="Ren9OL" type="checkbox" role="checkbox" aria-checked="false" aria-disabled="false"><div class="W+NVhE"></div>Đặt làm địa chỉ mặc đinh</label></div></div><div class="NjqqYS"><button class="NCvv2A oubYLd" fdprocessedid="uv15y">Trở Lại</button><button class="NCvv2A qouWQk btn-success" fdprocessedid="uvypnf">Hoàn thành</button></div></div></form></div>';
    newCreate.replaceChild(newDiv, changDiv);
    const nameInput = document.querySelector('input[placeholder="Họ và tên"]');
    const phoneNumberInput = document.querySelector('input[placeholder="Số điện thoại"]');
    const addressTextarea = document.querySelector('textarea[placeholder="Địa chỉ cụ thể"]');
    const btnSuccess = document.querySelector('.btn-success');
    console.log(nameInput, phoneNumberInput, addressTextarea);
    let name = '';
    let phoneNumber = '';
    let address1 = '';

    nameInput.addEventListener('input', function (e) {
      handleInputChange(e, 'name', name, phoneNumber, address1);
    });
    phoneNumberInput.addEventListener('input', function (e) {
      handleInputChange(e, 'phoneNumber', name, phoneNumber, address1);
    });
    addressTextarea.addEventListener('input', function (e) {
      handleInputChange(e, 'address', name, phoneNumber, address1);
    });
    btnSuccess.addEventListener('click', function (e) {
      handleSubmit(e, name, phoneNumber, address1);
    });
  });
}

function fetchAPI(myAddress) {
  fetch('../php/update_address.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(myAddress)
  })
    .then(response => response.json())
    .then(data => {
      // Xử lý kết quả trả về từ server
      console.log(data);
    })
    .catch(error => {
      // Xử lý lỗi nếu có
      console.error(error);
    });
}
function handleInputChange(e) {
  const inputName = e.target.name;
  const inputValue = e.target.value;

  if (inputName === 'name') {
    name = inputValue;
  } else if (inputName === 'phoneNumber') {
    phoneNumber = inputValue;
  } else if (inputName === 'address') {
    address1 = inputValue;
  }
}

function handleSubmit(e) {
  e.preventDefault();
  const nameInput = document.querySelector('input[placeholder="Họ và tên"]');
  const phoneNumberInput = document.querySelector('input[placeholder="Số điện thoại"]');
  const addressTextarea = document.querySelector('textarea[placeholder="Địa chỉ cụ thể"]');

  const name = nameInput.value;
  const phoneNumber = phoneNumberInput.value;
  const address1 = addressTextarea.value;

  const user = {
    name: name,
    phoneNumber: phoneNumber,
    address: address1
  };

  fetchAPI(user);
  window.location.reload();
};

const addressline = document.querySelector('#addressline').innerHTML;
console.log(addressline);
document.addEventListener('DOMContentLoaded', function () {
  const orderButtons = document.querySelector('.select__product-item');
  orderButtons.addEventListener('click', () => {
    const url = "../php/addOrders.php?address=" + encodeURIComponent(addressline);
    fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' }
    })
      .then(response => {
        console.log(response);

        setTimeout(function () {
          window.location.href = "../html/index.html";
          toast({
            title: "Thành công!",
            message: "Đăg ký thành công",
            type: "success",
            duration: 2500
          });

        }, 1000);

        return response;
      })
      .then(data => {
        console.log(data);

      })
      .catch(error => {
        console.error('Error sending data:', error);
      });
  });
});



function toast({ title = "", message = "", type = "info", duration = 3000 }) {
  const main = document.querySelector('#toast');
  if (main) {
    const toast = document.createElement("div");

    // Auto remove toast
    const autoRemoveId = setTimeout(function () {
      main.removeChild(toast);
    }, duration + 1000);

    // Remove toast when clicked
    toast.onclick = function (e) {
      if (e.target.closest(".toast__close")) {
        main.removeChild(toast);
        clearTimeout(autoRemoveId);
      }
    };

    const icons = {
      success: "fas fa-check-circle",
      info: "fas fa-info-circle",
      warning: "fas fa-exclamation-circle",
      error: "fas fa-exclamation-circle"
    };
    const icon = icons[type];
    const delay = (duration / 2000).toFixed(2);

    toast.classList.add("toast", `toast--${type}`);
    toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

    toast.innerHTML = `
      <div class="toast__icon">
          <i class="${icon}"></i>
      </div>
      <div class="toast__body">
          <h3 class="toast__title">${title}</h3>
          <p class="toast__msg">${message}</p>
      </div>
      <div class="toast__close">
          <i class="fas fa-times"></i>
      </div>
    `;
    main.appendChild(toast);
  }
}


