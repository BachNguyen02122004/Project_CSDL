<?php
//check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

session_start();
$Username = $_SESSION['username'];
$id = $_SESSION['id'];
$cart_id = $_SESSION['cart_id'];

$queryPrice = "SELECT SUM(price*quantity*0.94) AS prices FROM (cart_detail INNER JOIN product ON cart_detail.product_id = product.id) WHERE cart_detail.cart_id = '$cart_id' and cart_detail.is_selected = 1";
$resultPrice = mysqli_query($mysqli, $queryPrice);
$row = $resultPrice->fetch_assoc();
$price = number_format($row['prices'], 0, ',', '.');
?>;

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
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
    <div id="main">
        <header id="header">

            <div class="nav">
                <!-- Navbar -->

                <div class="navbar">
                    <ul class="navbar-list">
                        <li class="navbar__item navbar__item--separate">
                            Welcome to My Shop
                        </li>
                        <li class="navbar__item">
                            <span class="navbar__item--no-pointer">Kết nối</span>
                            <a href="" class="navbar__item-link-icon">
                                <i class="navbar__icon fab fa-facebook"></i>
                            </a>
                            <a href="" class="navbar__item-link-icon">
                                <i class="navbar__icon fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar__list">
                        <li class="navbar__item navbar__item-has-notify">
                            <a href="" class="navbar__item-link">
                                <i class="navbar__icon far fa-bell"></i>
                                Thông báo
                            </a>

                            <!-- Header Notify -->
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông Báo Mới Nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="https://cf.shopee.vn/file/be5db69ffdcfad7d1680e8d9702efbd6_tn" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">🎁 Tặng Admin 01 Mã
                                                    Freeship!</span>
                                                <span class="header__notify-desc">👉 Cho đơn từ 0đ - Mã có sẵn trong ví!
                                                    🤑 Siêu giảm giá, sale linh đình ️🛒 Dùng ngay thôi!</span>
                                                <img src="https://cf.shopee.vn/file/db9bdbafe0213c8524822a5f6956cc04" alt="" class="header__notify-img-more">
                                            </div>
                                        </a>
                                    </li>

                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="https://cf.shopee.vn/file/e563dbc2e6a1686585e262c20d0faef0_tn" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Chấn động! Deal 1K nhưng được bao
                                                    ship</span>
                                                <span class="header__notify-desc">⭐ Thứ 6 gì cũng rẻ chỉ từ 1K🏠 Decor
                                                    nhà cửa, làm đẹp, phụ kiện 💝 Ngàn deal đồng giá 1K, 9K 🛒 Freeship
                                                    đơn từ 0Đ - Mua ngay!</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="https://cf.shopee.vn/file/ff1cf06d837ce15b4cad1a3bc25aab44_tn" alt="" class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Chỉ còn 3 tiếng chốt sale #9.9</span>
                                                <span class="header__notify-desc">🚛 Cơ hội cuối lưu mã Freeship🌟 Lượt
                                                    cuối tung mã giảm đến 99K 💥 Xả hàng đồng giá từ 9K, 99K ☄️ Chớp
                                                    liền tay - Hết là tiếc!</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                        </li>

                        <li class="navbar__item"><a href="" class="navbar__item-link">
                                <i class="navbar__icon far fa-question-circle"></i>
                                Trợ giúp
                            </a>
                        </li>

                        <li class="navbar__item">
                            <a href="" class="navbar__item-link">
                                <i class="fa-solid fa-language"></i>
                                Ngôn ngữ
                            </a>
                        </li>
                        <!-- Login -->
                        <li class="navbar__item navbar__user">
                            <img src="../img/admin.jpg" alt="avt" class="navbar__user-avt">
                            <span class="navbar__user-name">Admin</span>

                            <ul class="navbar__user-menu">
                                <li class="navbar__user-item"><a href="">Tài khoản của tôi</a></li>
                                <li class="navbar__user-item"><a href="">Địa chỉ của tôi</a></li>
                                <li class="navbar__user-item"><a href="">Đơn mua</a></li>
                                <li class="navbar__user-item navbar__user-item-separate"><a href="/index.html">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- End: Navbar -->

                <!-- Begin: Search -->
                <div class="hearder-search-box">
                    <div class="header-with-search">
                        <div class="header-page-content">
                            <div class="header__logo">
                                <div class="header__logo-link">
                                    <a href="../html/index.html" class="header-link-index">
                                        <svg viewBox="0 0 192 65" class="header__logo-image">
                                            <g fill="#ee4d2d" fill-rule="evenodd">
                                                <path d="M35.6717403 44.953764c-.3333497 2.7510509-2.0003116 4.9543414-4.5823845 6.0575984-1.4379707.6145919-3.36871.9463856-4.896954.8421628-2.3840266-.0911143-4.6237865-.6708937-6.6883352-1.7307424-.7375522-.3788551-1.8370513-1.1352759-2.6813095-1.8437757-.213839-.1790053-.239235-.2937577-.0977428-.4944671.0764015-.1151823.2172535-.3229831.5286218-.7791994.45158-.6616533.5079208-.7446018.5587128-.8221779.14448-.2217688.3792333-.2411091.6107855-.0588804.0243289.0189105.0243289.0189105.0426824.0333083.0379873.0294402.0379873.0294402.1276204.0990653.0907002.0706996.14448.1123887.166248.1287205 2.2265285 1.7438508 4.8196989 2.7495466 7.4376251 2.8501162 3.6423042-.0496401 6.2615109-1.6873341 6.7308041-4.2020035.5160305-2.7675977-1.6565047-5.1582742-5.9070334-6.4908212-1.329344-.4166762-4.6895175-1.7616869-5.3090528-2.1250697-2.9094471-1.7071043-4.2697358-3.9430584-4.0763845-6.7048539.296216-3.8283059 3.8501677-6.6835796 8.340785-6.702705 2.0082079-.004083 4.0121475.4132378 5.937338 1.2244562.6816382.2873109 1.8987274.9496089 2.3189359 1.2633517.2420093.1777159.2898136.384872.1510957.60836-.0774686.12958-.2055158.3350171-.4754821.7632974l-.0029878.0047276c-.3553311.5640922-.3664286.5817134-.447952.7136572-.140852.2144625-.3064598.2344475-.5604202.0732783-2.0600669-1.3839063-4.3437898-2.0801572-6.8554368-2.130442-3.126914.061889-5.4706057 1.9228561-5.6246892 4.4579402-.0409751 2.2896772 1.676352 3.9613243 5.3858811 5.2358503 7.529819 2.4196871 10.4113092 5.25648 9.869029 9.7292478M26.3725216 5.42669372c4.9022893 0 8.8982174 4.65220288 9.0851664 10.47578358H17.2875686c.186949-5.8235807 4.1828771-10.47578358 9.084953-10.47578358m25.370857 11.57065968c0-.6047069-.4870064-1.0948761-1.0875481-1.0948761h-11.77736c-.28896-7.68927544-5.7774923-13.82058185-12.5059489-13.82058185-6.7282432 0-12.2167755 6.13130641-12.5057355 13.82058185l-11.79421958.0002149c-.59136492.0107446-1.06748731.4968309-1.06748731 1.0946612 0 .0285807.00106706.0569465.00320118.0848825H.99995732l1.6812605 37.0613963c.00021341.1031483.00405483.2071562.01173767.3118087.00170729.0236381.003628.0470614.00554871.0704847l.00362801.0782207.00405483.004083c.25545428 2.5789222 2.12707837 4.6560709 4.67201764 4.7519129l.00576212.0055872h37.4122078c.0177132.0002149.0354264.0004298.0531396.0004298.0177132 0 .0354264-.0002149.0531396-.0004298h.0796027l.0017073-.0015043c2.589329-.0706995 4.6867431-2.1768587 4.9082648-4.787585l.0012805-.0012893.0017073-.0350275c.0021341-.0275062.0040548-.0547975.0057621-.0823037.0040548-.065757.0068292-.1312992.0078963-.1964115l1.8344904-37.207738h-.0012805c.001067-.0186956.0014939-.0376062.0014939-.0565167M176.465457 41.1518926c.720839-2.3512494 2.900423-3.9186779 5.443734-3.9186779 2.427686 0 4.739107 1.6486899 5.537598 3.9141989l.054826.1556978h-11.082664l.046506-.1512188zm13.50267 3.4063683c.014933.0006399.014933.0006399.036906.0008531.021973-.0002132.021973-.0002132.044372-.0008531.53055-.0243144.950595-.4766911.950595-1.0271786 0-.0266606-.000853-.0496953-.00256-.0865936.000427-.0068251.000427-.020262.000427-.0635588 0-5.1926268-4.070748-9.4007319-9.09145-9.4007319-5.020488 0-9.091235 4.2081051-9.091235 9.4007319 0 .3871116.022399.7731567.067838 1.1568557l.00256.0204753.01408.1013102c.250022 1.8683731 1.047233 3.5831812 2.306302 4.9708108-.00064-.0006399.00064.0006399.007253.0078915 1.396026 1.536289 3.291455 2.5833031 5.393601 2.9748936l.02752.0053321v-.0027727l.13653.0228215c.070186.0119439.144211.0236746.243409.039031 2.766879.332724 5.221231-.0661182 7.299484-1.1127057.511777-.2578611.971928-.5423827 1.37064-.8429007.128211-.0968312.243622-.1904632.34346-.2781231.051412-.0452164.092372-.083181.114131-.1051493.468898-.4830897.498124-.6543572.215249-1.0954297-.31146-.4956734-.586228-.9179769-.821744-1.2675504-.082345-.1224254-.154023-.2267215-.214396-.3133151-.033279-.0475624-.033279-.0475624-.054399-.0776356-.008319-.0117306-.008319-.0117306-.013866-.0191956l-.00256-.0038391c-.256208-.3188605-.431565-.3480805-.715933-.0970445-.030292.0268739-.131624.1051493-.14997.1245582-1.999321 1.775381-4.729508 2.3465571-7.455854 1.7760208-.507724-.1362888-.982595-.3094759-1.419919-.5184948-1.708127-.8565509-2.918343-2.3826022-3.267563-4.1490253l-.02752-.1394881h13.754612zM154.831964 41.1518926c.720831-2.3512494 2.900389-3.9186779 5.44367-3.9186779 2.427657 0 4.739052 1.6486899 5.537747 3.9141989l.054612.1556978h-11.082534l.046505-.1512188zm13.502512 3.4063683c.015146.0006399.015146.0006399.037118.0008531.02176-.0002132.02176-.0002132.044159-.0008531.530543-.0243144.950584-.4766911.950584-1.0271786 0-.0266606-.000854-.0496953-.00256-.0865936.000426-.0068251.000426-.020262.000426-.0635588 0-5.1926268-4.070699-9.4007319-9.091342-9.4007319-5.020217 0-9.091343 4.2081051-9.091343 9.4007319 0 .3871116.022826.7731567.068051 1.1568557l.00256.0204753.01408.1013102c.250019 1.8683731 1.04722 3.5831812 2.306274 4.9708108-.00064-.0006399.00064.0006399.007254.0078915 1.396009 1.536289 3.291417 2.5833031 5.393538 2.9748936l.027519.0053321v-.0027727l.136529.0228215c.070184.0119439.144209.0236746.243619.039031 2.766847.332724 5.22117-.0661182 7.299185-1.1127057.511771-.2578611.971917-.5423827 1.370624-.8429007.128209-.0968312.243619-.1904632.343456-.2781231.051412-.0452164.09237-.083181.11413-.1051493.468892-.4830897.498118-.6543572.215246-1.0954297-.311457-.4956734-.586221-.9179769-.821734-1.2675504-.082344-.1224254-.154022-.2267215-.21418-.3133151-.033492-.0475624-.033492-.0475624-.054612-.0776356-.008319-.0117306-.008319-.0117306-.013866-.0191956l-.002346-.0038391c-.256419-.3188605-.431774-.3480805-.716138-.0970445-.030292.0268739-.131623.1051493-.149969.1245582-1.999084 1.775381-4.729452 2.3465571-7.455767 1.7760208-.507717-.1362888-.982582-.3094759-1.419902-.5184948-1.708107-.8565509-2.918095-2.3826022-3.267311-4.1490253l-.027733-.1394881h13.754451zM138.32144123 49.7357905c-3.38129629 0-6.14681004-2.6808521-6.23169343-6.04042014v-.31621743c.08401943-3.35418649 2.85039714-6.03546919 6.23169343-6.03546919 3.44242097 0 6.23320537 2.7740599 6.23320537 6.1960534 0 3.42199346-2.7907844 6.19605336-6.23320537 6.19605336m.00172791-15.67913203c-2.21776751 0-4.33682838.7553485-6.03989586 2.140764l-.19352548.1573553V34.6208558c0-.4623792-.0993546-.56419733-.56740117-.56419733h-2.17651376c-.47409424 0-.56761716.09428403-.56761716.56419733v27.6400724c0 .4539841.10583425.5641973.56761716.5641973h2.17651376c.46351081 0 .56740117-.1078454.56740117-.5641973V50.734168l.19352548.1573553c1.70328347 1.3856307 3.82234434 2.1409792 6.03989586 2.1409792 5.27140956 0 9.54473746-4.2479474 9.54473746-9.48802964 0-5.239867-4.2733279-9.48781439-9.54473746-9.48781439M115.907646 49.5240292c-3.449458 0-6.245805-2.7496948-6.245805-6.1425854 0-3.3928907 2.79656-6.1427988 6.245805-6.1427988 3.448821 0 6.24538 2.7499081 6.24538 6.1427988 0 3.3926772-2.796346 6.1425854-6.24538 6.1425854m.001914-15.5438312c-5.28187 0-9.563025 4.2112903-9.563025 9.4059406 0 5.1944369 4.281155 9.4059406 9.563025 9.4059406 5.281657 0 9.562387-4.2115037 9.562387-9.4059406 0-5.1946503-4.280517-9.4059406-9.562387-9.4059406M94.5919049 34.1890939c-1.9281307 0-3.7938902.6198995-5.3417715 1.7656047l-.188189.1393105V23.2574169c0-.4254677-.1395825-.5643476-.5649971-.5643476h-2.2782698c-.4600414 0-.5652122.1100273-.5652122.5643476v29.2834155c0 .443339.1135587.5647782.5652122.5647782h2.2782698c.4226187 0 .5649971-.1457701.5649971-.5647782v-9.5648406c.023658-3.011002 2.4931278-5.4412923 5.5299605-5.4412923 3.0445753 0 5.516841 2.4421328 5.5297454 5.4630394v9.5430935c0 .4844647.0806524.5645628.5652122.5645628h2.2726775c.481764 0 .565212-.0824666.565212-.5645628v-9.5710848c-.018066-4.8280677-4.0440197-8.7806537-8.9328471-8.7806537M62.8459442 47.7938061l-.0053397.0081519c-.3248668.4921188-.4609221.6991347-.5369593.8179812-.2560916.3812097-.224267.551113.1668119.8816949.91266.7358184 2.0858968 1.508535 2.8774525 1.8955369 2.2023021 1.076912 4.5810275 1.646045 7.1017886 1.6975309 1.6283921.0821628 3.6734936-.3050536 5.1963734-.9842376 2.7569891-1.2298679 4.5131066-3.6269626 4.8208863-6.5794607.4985136-4.7841067-2.6143125-7.7747902-10.6321784-10.1849709l-.0021359-.0006435c-3.7356476-1.2047686-5.4904836-2.8064071-5.4911243-5.0426086.1099976-2.4715346 2.4015793-4.3179454 5.4932602-4.4331449 2.4904317.0062212 4.6923065.6675996 6.8557356 2.0598624.4562232.2767364.666607.2256796.9733188-.172263.035242-.0587797.1332787-.2012238.543367-.790093l.0012815-.0019308c.3829626-.5500403.5089793-.7336731.5403767-.7879478.258441-.4863266.2214903-.6738208-.244985-1.0046173-.459427-.3290803-1.7535544-1.0024722-2.4936356-1.2978721-2.0583439-.8211991-4.1863175-1.2199998-6.3042524-1.1788111-4.8198184.1046878-8.578747 3.2393171-8.8265087 7.3515337-.1572005 2.9703036 1.350301 5.3588174 4.5000778 7.124567.8829712.4661613 4.1115618 1.6865902 5.6184225 2.1278667 4.2847814 1.2547527 6.5186944 3.5630343 6.0571315 6.2864205-.4192725 2.4743234-3.0117991 4.1199394-6.6498372 4.2325647-2.6382344-.0549182-5.2963324-1.0217793-7.6043603-2.7562084-.0115337-.0083664-.0700567-.0519149-.1779185-.1323615-.1516472-.1130543-.1516472-.1130543-.1742875-.1300017-.4705335-.3247898-.7473431-.2977598-1.0346184.1302162-.0346012.0529875-.3919333.5963776-.5681431.8632459"></path>
                                            </g>
                                        </svg>
                                        <div class="cart-text"> Thanh toán </div>
                                    </a>
                                </div>

                            </div>
                            <div></div>


                            <!-- Cart layout -->
                        </div>
                    </div>
                    <!-- End: Search -->
                </div>
            </div>

        </header>

        <div id="container">
            <div class="content-checkout">
                <div id="infomation">
                    <div class="decorate-item"></div>
                    <div class="address-item">
                        <svg height="16" viewBox="0 0 12 16" width="12" class="shopee-svg-icon icon-location-marker">
                            <path d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path>
                        </svg>
                        <div class="address-text">Địa chỉ nhận hàng</div>
                    </div>

                    <?php
                    $queryAddress = "select u.username, u.phone_number, a.address_line1, a.address_line2 from (user as u inner join user_address as ua on u.id = ua.user_id inner join address as a on a.id = ua.address_id) where u.id = '$id' and ua.is_default = 1";
                    $result = mysqli_query($mysqli, $queryAddress);

                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $row['username'] != null ? $fullname = $row['username'] : $fullname = "";
                        $row['phone_number'] != null ? $sdt = $row['phone_number'] : $sdt = "";
                        $row['address_line1'] != null ? $addressLine = $row['address_line1'] : $addressLine = "";
                    } else {
                        $fullname = "";
                        $sdt = "";
                        $addressLine = "";
                    }
                    ?>

                    <div class="info-user">
                        <div class="infomation-item"> <?php echo $fullname ?> (+84)<?php echo $sdt ?> </div>
                        <div class='info-item-1' id="addressline" style="margin-right: 8px;"><?php echo $addressLine ?> </div>
                        <div class="info-default">Mặc định</div>
                        <div class="change-item">Thay đổi </div>
                    </div>
                </div>

                <div id="product-info">
                    <div class="product__info-item">
                        <div class="product__info-item1">
                            <h2>Sản phẩm</h2>
                        </div>
                        <div class="empty-item"></div>
                        <div class="product__info-coins product__info-color">Đơn giá</div>
                        <div class="product__info-quantity product__info-color">Số lượng</div>
                        <div class="product__info-total product__info-color">Thành tiền</div>
                    </div>

                    <?php
                    $query = "SELECT cd.id AS ID, p.name, p.id, pi.image, cd.quantity, p.price, vo.value
                            FROM (cart_detail AS cd 
                            INNER JOIN product AS p ON cd.product_id = p.id 
                            INNER JOIN product_image AS pi ON p.id = pi.id 
                            INNER JOIN variation_option AS vo ON cd.option_id = vo.id) 
                            WHERE pi.is_default = 1 AND cd.cart_id = '$cart_id' and cd.is_selected = 1";

                    // Thực hiện truy vấn
                    $result = $mysqli->query($query);
                    $productNum = $result->num_rows;


                    // Kiểm tra kết quả truy vấn
                    if ($result->num_rows > 0) {
                        // Lặp qua từng dòng dữ liệu và thay thế vào file HTML
                        while ($row = $result->fetch_assoc()) {
                            $ID = $row['ID'];
                            $productName = $row['name'];
                            $productImage = $row['image'];
                            $productID = $row['id'];
                            $quantity = $row['quantity'];
                            $totalPrice = number_format($row['price'] * $quantity * 0.94, 0, ',', '.');
                            $onePrice = number_format($row['price'], 0, ',', '.');
                            $onePriceUpdate = number_format($row['price'] * 0.94, 0, ',', '.');

                            //changed

                            $row['value'] == null ? $TypeProduct = "none" : $TypeProduct = $row['value'];

                            echo '<div class="fake-item">
                        <div class="mall-item">
                            <svg viewBox="0 0 24 11"><g fill="#fff" fill-rule="evenodd"><path d="M19.615 7.143V1.805a.805.805 0 0 0-1.611 0v5.377H18c0 1.438.634 2.36 1.902 2.77V9.95c.09.032.19.05.293.05.444 0 .805-.334.805-.746a.748.748 0 0 0-.498-.69v-.002c-.59-.22-.885-.694-.885-1.42h-.002zm3 0V1.805a.805.805 0 0 0-1.611 0v5.377H21c0 1.438.634 2.36 1.902 2.77V9.95c.09.032.19.05.293.05.444 0 .805-.334.805-.746a.748.748 0 0 0-.498-.69v-.002c-.59-.22-.885-.694-.885-1.42h-.002zm-7.491-2.985c.01-.366.37-.726.813-.726.45 0 .814.37.814.742v5.058c0 .37-.364.73-.813.73-.395 0-.725-.278-.798-.598a3.166 3.166 0 0 1-1.964.68c-1.77 0-3.268-1.456-3.268-3.254 0-1.797 1.497-3.328 3.268-3.328a3.1 3.1 0 0 1 1.948.696zm-.146 2.594a1.8 1.8 0 1 0-3.6 0 1.8 1.8 0 1 0 3.6 0z"></path><path d="M.078 1.563A.733.733 0 0 1 .565.89c.423-.15.832.16 1.008.52.512 1.056 1.57 1.88 2.99 1.9s2.158-.85 2.71-1.882c.19-.356.626-.74 1.13-.537.342.138.477.4.472.65a.68.68 0 0 1 .004.08v7.63a.75.75 0 0 1-1.5 0V3.67c-.763.72-1.677 1.18-2.842 1.16a4.856 4.856 0 0 1-2.965-1.096V9.25a.75.75 0 0 1-1.5 0V1.648c0-.03.002-.057.005-.085z" fill-rule="nonzero"></path></g></svg>
                        </div>
                        <div>ShopDunk Office Store</div>
                    </div>

                    <div class="product__info-content">
                        <div class="product__info-item1 product__info-divide">
                            <img src="' . $productImage . '" alt="" class="product__info-image">
                            <div>' . $productName . '</div>
                            
                        </div>
                        <div class="product__info-select empty-item">Loại : ' . $TypeProduct . '</div>
                        <div class="product__info-coins product__info-text">₫' . $onePriceUpdate . '</div>
                        <div class="product__info-quantity product__info-text">' . $quantity . '</div>
                        <div class="product__info-total product__info-text">₫' . $totalPrice . '</div>
                    </div>';
                        }
                    }
                    ?>

                    <div class="freeship-item">
                        <div class="vourcher-item">
                            <svg fill="none" viewBox="0 -2 23 22" class="shopee-svg-icon icon-voucher-line">
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
                            <div>Vourcher của shop</div>
                        </div>
                        <a href="#" class="select-vourcher">Chọn vourcher</a>
                    </div>

                    <div class="total-coin-item">
                        <div class="total-coin-text">Tổng số tiền(<?php echo $productNum ?> sản phẩm):</div>
                        <div class="total-coin">₫<?php echo $price ?></div>
                    </div>

                    <div class="payment">
                        <div class="abc text-coin-1">Tổng tiền hàng</div>
                        <div class="abc bwwaGp">₫<?php echo $price ?></div>
                        <div class="abc text-coin-1 transport">Phí vật chuyển</div>
                        <div class="abc vourcher-ship transport">₫0</div>
                        <div class="abc text-coin-1 total-coins">Tổng thanh toán</div>
                        <div class="abc payment__item-total">₫<?php echo $price ?></div>
                    </div>;

                    <div class="select-product">
                        <div style="font-size: 15px;">Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo
                            <a style="text-decoration: none;" href="#">Điều khoản Shopee</a>
                        </div>
                        <button class="select__product-item">Đặt hàng</button>
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
            </footer>
        </div>
    </div>

</body>
<script src="../js/checkout.js"></script>
<script src="../js/loadHeader.js"></script>
<script src="../js/logOut.js"></script>

</html>