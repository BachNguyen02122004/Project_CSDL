<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <script src="../js/app.js"></script>
    <script src="../js/onload.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/link.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <script>
        var userID = 1;
        updateCartItems();
    </script>
    
    <div id="main">

        <?php include 'header.php'; ?>

        <div class="contain">
            <div class="contain-text">
                <div class="free-ship">
                    <img width="24" height="20" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/d9e992985b18d96aab90969636ebfd0e.png" alt="fs-icon">
                    <div class="free-ship-item">Nhấn vào mục Mã giảm giá ở cuối trang để hưởng miễn phí vận chuyển bạn nhé!</div>
                </div>


                <div class="product-info-check">
                    <label class="check-box">
                        <input class="" type="checkbox" aria-checked="true" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                        <div class="check-before"></div>
                    </label>
                    <div class="product-info-1">Sản phẩm</div>
                    <div class="product-info-2">Đơn giá </div>
                    <div class="product-info-3">Số Lượng</div>
                    <div class="product-info-4">Thành Tiền</div>
                    <div class="product-info-5">Thao tác</div>

                </div>

                <div class="product-info">
                    <label class="check-box">
                        <input class="" type="checkbox" aria-checked="true" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                        <div class="check-before"></div>
                    </label>

                    <div class="box-info-item">
                        <div class="box-info-item-1">
                            <a href="#" class="item-image-box">
                                <img class="item-image" src="../image/image-cart.jpg" alt="">
                            </a>
                            <div class="product-item-info">
                                <div style="margin-bottom: 2px;">
                                    <a href="#">Điện thoại Apple iPhone 14 Pro Max x 128GB</a>
                                </div>
                                <img class="anh_sale" src="../img/anh-sale.png" alt="ảnh sale">
                                <div class="box-sale">
                                    <img class="anh-sale-2" src="../img/anh-sale-2.png" alt="">
                                    <div>7 Ngày Miễn Phí Trả Hàng</div>
                                </div>
                            </div>
                        </div>
                        <div class="flash-sale-1">
                            <svg viewBox="0 0 108 21" height="21" width="108" class="shopee-svg-icon">
                                <g fill="currentColor" fill-rule="evenodd">
                                    <path d="M0 16.195h3.402v-5.233h4.237V8H3.402V5.037h5.112V2.075H0zm29.784 0l-.855-2.962h-4.335l-.836 2.962H20.26l4.723-14.12h3.576l4.724 14.12zM26.791 5.294h-.04s-.31 1.54-.563 2.43l-.797 2.744h2.74l-.777-2.745c-.252-.889-.563-2.43-.563-2.43zm7.017 9.124s1.807 2.014 5.073 2.014c3.13 0 4.898-2.034 4.898-4.384 0-4.463-6.259-4.147-6.259-5.925 0-.79.778-1.106 1.477-1.106 1.672 0 3.071 1.245 3.071 1.245l1.439-2.824s-1.477-1.6-4.47-1.6c-2.76 0-4.918 1.718-4.918 4.325 0 4.345 6.258 4.285 6.258 5.964 0 .85-.758 1.126-1.457 1.126-1.75 0-3.324-1.462-3.324-1.462zm12.303 1.777h3.402v-5.53h5.054v5.53h3.401V2.075h-3.401v5.648h-5.054V2.075h-3.402zm18.64-1.678s1.692 1.915 4.763 1.915c2.877 0 4.548-1.876 4.548-4.107 0-4.483-6.492-3.871-6.492-6.36 0-.987.914-1.678 2.08-1.678 1.73 0 3.052 1.224 3.052 1.224l1.088-2.073s-1.4-1.501-4.12-1.501c-2.644 0-4.627 1.738-4.627 4.068 0 4.305 6.512 3.87 6.512 6.379 0 1.145-.952 1.698-2.002 1.698-1.944 0-3.44-1.48-3.44-1.48zm19.846 1.678l-1.166-3.594h-4.84l-1.166 3.594H74.84L79.7 2.174h2.623l4.86 14.021zM81.04 4.603h-.039s-.31 1.382-.583 2.172l-1.224 3.752h3.615l-1.224-3.752c-.253-.79-.545-2.172-.545-2.172zm7.911 11.592h8.475v-2.192H91.46V2.173H88.95zm10.477 0H108v-2.192h-6.064v-3.772h4.645V8.04h-4.645V4.366h5.753V2.174h-8.26zM14.255.808l6.142.163-3.391 5.698 3.87 1.086-8.028 12.437.642-8.42-3.613-1.025z"></path>
                                </g>
                            </svg>
                            bắt đầu lúc 00:00 1 Oct
                        </div>

                    </div>

                    <!-- Phân loại mặt hàng -->
                    <div class="item-classification">
                        <button class="select-item">
                            <div id="select-item">Phân loại hàng
                                <div class="before-select-item"></div>
                            </div>
                            <div>Gold</div>
                        </button>
                    </div>
                    <div class="coins">
                        <span class="coin-item-cart coin-item-1">₫33.990.000</span>
                        <span class="coin-item-cart">₫26.790.000</span>
                    </div>
                    <div class="number-select">

                        <div class="select-number">
                            <button aria-label="Decrease" class="item-down-up" fdprocessedid="ow0la"><svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon-1">
                                    <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon>
                                </svg></button>
                            <input class="text-number" type="text" value="1" aria-valuenow="1">
                            <button class="item-down-up"><svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon-1">
                                    <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon>
                                </svg></button>
                        </div>

                    </div>
                    <div class="number-coin">
                        <span>₫26.790.000</span>
                        <span></span>
                    </div>

                    <div class="operations">
                        <button class="erase-product">Xóa</button>
                        <div></div>
                    </div>

                </div>

                <!-- advertisement -->
                <div class="free-ship free-ship-2">
                    <img width="24" height="20" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/d9e992985b18d96aab90969636ebfd0e.png" alt="fs-icon">
                    <div class="free-ship-item free-ship-item-2">Giảm ₫25.000 phí vận chuyển đơn tối thiểu ₫99.000</div>
                    <a href="#">Tìm hiểu thêm</a>
                </div>

                <div class="buy-item-1">
                    <div class="box-buy-item">
                        <svg fill="none" viewBox="0 -2 23 22" class="icon-voucher">
                            <g filter="url(#voucher-filter0_d)">
                                <mask id="a" fill="#fff">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 2h18v2.32a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75V16H1v-2.12a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75V2z"></path>
                                </mask>
                                <path d="M19 2h1V1h-1v1zM1 2V1H0v1h1zm18 2.32l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zM19 16v1h1v-1h-1zM1 16H0v1h1v-1zm0-2.12l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zM19 1H1v2h18V1zm1 3.32V2h-2v2.32h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zM20 16v-2.13h-2V16h2zM1 17h18v-2H1v2zm-1-3.12V16h2v-2.12H0zm1.4.91a2.5 2.5 0 001.5-2.29h-2a.5.5 0 01-.3.46l.8 1.83zm1.5-2.29a2.5 2.5 0 00-1.5-2.3l-.8 1.84c.18.08.3.26.3.46h2zM0 10.48v.65h2v-.65H0zM.9 9.1a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 9.1h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 8.65zM0 7.08v.65h2v-.65H0zM.9 5.7a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 5.7h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 5.25zM0 2v2.33h2V2H0z" mask="url(#a)"></path>
                            </g>
                            <path clip-rule="evenodd" d="M6.49 14.18h.86v-1.6h-.86v1.6zM6.49 11.18h.86v-1.6h-.86v1.6zM6.49 8.18h.86v-1.6h-.86v1.6zM6.49 5.18h.86v-1.6h-.86v1.6z"></path>
                            <defs>
                                <filter id="voucher-filter0_d" x="0" y="1" width="20" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                    <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                                    <feOffset></feOffset>
                                    <feGaussianBlur stdDeviation=".5"></feGaussianBlur>
                                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"></feColorMatrix>
                                    <feBlend in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                                    <feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
                                </filter>
                            </defs>
                        </svg>
                        <div class="text-buy-item">Shopee Voucher</div>
                        <div class="fake-buy-item"></div>
                        <button class="add-item">Chọn hoặc nhập mã</button>
                    </div>
                    <div class="dashed-item"></div>
                    <div class="box-buy-btn">
                        <label class="check-box">
                            <input class="" type="checkbox" aria-checked="true" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
                            <div class="check-before"></div>
                        </label>
                        <button class="select-buy-item">Chọn tất cả(2)</button>
                        <button class="erase-item">Xóa</button>
                        <button class="save-love-item">Lưu vào mục đã thích</button>
                        <div class="fake-buy-item"></div>

                        <div class="item-coins">
                            <div class="box-item-coins">
                                <div class="content-item-coins">Tổng thanh toán(0 sản phẩm):</div>
                                <div class="real-coin">₫0</div>
                            </div>
                        </div>
                        <button class="buy-product-cart">
                            Mua hàng
                        </button>
                    </div>
                </div>
            </div>

        </div>



        <footer id="footer">
            <div class="grid">
                <!-- Footer shop -->
                <div class="footer-shop grid__row">
                    <div class="column-1">
                        <h3 class="footer-shop__heading">CHĂM SÓC KHÁCH HÀNG</h3>
                        <ul class="footer-shop__list">
                            <li class="footer-shop__item">
                                <a href="" class="footer-shop__link">Trung Tâm Trợ Giúp</a>
                                <a href="" class="footer-shop__link">Shopee Blog</a>
                                <a href="" class="footer-shop__link">Shopee Mall</a>
                                <a href="" class="footer-shop__link">Hướng Dẫn Mua Hàng</a>
                                <a href="" class="footer-shop__link">Hướng Dẫn Bán Hàng</a>
                                <a href="" class="footer-shop__link">Thanh Toán</a>
                                <a href="" class="footer-shop__link">Shopee Xu</a>
                                <a href="" class="footer-shop__link">Vận Chuyển</a>
                                <a href="" class="footer-shop__link">Trả Hàng & Hoàn Tiền</a>
                                <a href="" class="footer-shop__link">Chăm Sóc Khách Hàng</a>
                                <a href="" class="footer-shop__link">Chính Sách Bảo Hành</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column-1">
                        <h3 class="footer-shop__heading">VỀ SHOPEE</h3>
                        <ul class="footer-shop__list">
                            <li class="footer-shop__item">
                                <a href="" class="footer-shop__link">Giới Thiệu Về Shopee Việt Nam</a>
                                <a href="" class="footer-shop__link">Tuyển Dụng</a>
                                <a href="" class="footer-shop__link">Điều Khoản Shopee</a>
                                <a href="" class="footer-shop__link">Chính Sách Bảo Mật</a>
                                <a href="" class="footer-shop__link">Chính Hãng</a>
                                <a href="" class="footer-shop__link">Kênh Người Bán</a>
                                <a href="" class="footer-shop__link">Flash Sales</a>
                                <a href="" class="footer-shop__link">Chương Trình Tiếp Thị Liên Kết Shopee</a>
                                <a href="" class="footer-shop__link">Liên Hệ Với Truyền Thông</a>
                            </li>
                        </ul>
                    </div>
                    <div class="column-1 footer-shop__pay-ship">
                        <div>
                            <h3 class="footer-shop__heading">THANH TOÁN</h3>
                            <img src="../img/thanhtoan.png" alt="" class="footer-shop__heading-img">
                        </div>
                        <div>
                            <h3 class="footer-shop__heading">ĐƠN VỊ VẬN CHUYỂN</h3>
                            <img src="../img/đơn vị vận chuyển.png" alt="" class="footer-shop__heading-img">
                        </div>
                    </div>
                    <div class="column-1">
                        <h3 class="footer-shop__heading">THEO DÕI CHÚNG TÔI TRÊN</h3>
                        <ul class="footer-shop__list">
                            <li class="footer-shop__item">
                                <a href="" class="footer-shop__social footer-shop__link">
                                    <i class="footer-shop__social-icon fab fa-facebook"></i>
                                    Facebook
                                </a>
                                <a href="" class="footer-shop__social footer-shop__link">
                                    <i class="footer-shop__social-icon fab fa-instagram-square"></i>
                                    Instagram
                                </a>
                                <a href="" class="footer-shop__social footer-shop__link">
                                    <i class="footer-shop__social-icon fab fa-linkedin"></i>
                                    Linkedin
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="column-1">
                        <h3 class="footer-shop__heading">TẢI ỨNG DỤNG SHOPEE NGAY THÔI</h3>
                        <div class="footer-shop__qr">
                            <a class="footer-shop__qr-link">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/d91264e165ed6facc6178994d5afae79.png" alt="QR code" class="footer-shop__qr-img">
                            </a>
                            <div class="footer-shop__apps">
                                <a href="" class="footer-shop__app-link">
                                    <img src="../img/googleplay.png" alt="Google Play" class="footer-shop__app-icon">
                                </a>
                                <a href="" class="footer-shop__app-link">
                                    <img src="../img/appstore.png" alt="App Store" class="footer-shop__app-icon">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="footer-notice grid__row">
                    <span class="footer-notice__copy-right">© 2023 LTC. Tất cả các quyền được bảo lưu.</span>
                    <div class="footer-notice__area">
                        <span class="footer-notice__heading">Quốc gia & Khu vực:</span>
                        <a class="footer-notice__country">Singapore</a>
                        <a class="footer-notice__country">Indonesia</a>
                        <a class="footer-notice__country">Đài Loan</a>
                        <a class="footer-notice__country">Thái Lan</a>
                        <a class="footer-notice__country">Malaysia</a>
                        <a class="footer-notice__country">Việt Nam</a>
                        <a class="footer-notice__country">Philippines</a>
                        <a class="footer-notice__country">Brazil</a>
                        <a class="footer-notice__country">México</a>
                        <a class="footer-notice__country">Colombia</a>
                        <a class="footer-notice__country">Chile</a>
                    </div>
                </div>
            </div>
    </div>

</body>

</html>