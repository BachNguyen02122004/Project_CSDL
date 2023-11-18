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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/purchase_order.css">
</head>

<body>
    <div id="main">
        <header id="header">
            <div class="grid">
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
                                        <a href="#" class="header__notify-link">
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
                            <img id="user_image" class="navbar__user-avt" src='../img/admin.jpg' />Admin
                            <span class="navbar__user-name"></span>

                            <ul class="navbar__user-menu">
                                <li class="navbar__user-item"><a href="">Tài khoản của tôi</a></li>
                                <li class="navbar__user-item"><a href="">Địa chỉ của tôi</a></li>
                                <li class="navbar__user-item"><a href="">Đơn mua</a></li>
                                <li class="navbar__user-item navbar__user-item-separate" id="logout"><a href="../html/form.html"></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End: Navbar -->

                <!-- Begin: Search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <a href="#" class="header__logo-link">

                            <svg viewBox="0 0 192 65" class="header__logo-img"><a href="index.html">
                                    <g fill-rule="evenodd">
                                        <path fill="#fff" d="M35.6717403 44.953764c-.3333497 2.7510509-2.0003116 4.9543414-4.5823845 6.0575984-1.4379707.6145919-3.36871.9463856-4.896954.8421628-2.3840266-.0911143-4.6237865-.6708937-6.6883352-1.7307424-.7375522-.3788551-1.8370513-1.1352759-2.6813095-1.8437757-.213839-.1790053-.239235-.2937577-.0977428-.4944671.0764015-.1151823.2172535-.3229831.5286218-.7791994.45158-.6616533.5079208-.7446018.5587128-.8221779.14448-.2217688.3792333-.2411091.6107855-.0588804.0243289.0189105.0243289.0189105.0426824.0333083.0379873.0294402.0379873.0294402.1276204.0990653.0907002.0706996.14448.1123887.166248.1287205 2.2265285 1.7438508 4.8196989 2.7495466 7.4376251 2.8501162 3.6423042-.0496401 6.2615109-1.6873341 6.7308041-4.2020035.5160305-2.7675977-1.6565047-5.1582742-5.9070334-6.4908212-1.329344-.4166762-4.6895175-1.7616869-5.3090528-2.1250697-2.9094471-1.7071043-4.2697358-3.9430584-4.0763845-6.7048539.296216-3.8283059 3.8501677-6.6835796 8.340785-6.702705 2.0082079-.004083 4.0121475.4132378 5.937338 1.2244562.6816382.2873109 1.8987274.9496089 2.3189359 1.2633517.2420093.1777159.2898136.384872.1510957.60836-.0774686.12958-.2055158.3350171-.4754821.7632974l-.0029878.0047276c-.3553311.5640922-.3664286.5817134-.447952.7136572-.140852.2144625-.3064598.2344475-.5604202.0732783-2.0600669-1.3839063-4.3437898-2.0801572-6.8554368-2.130442-3.126914.061889-5.4706057 1.9228561-5.6246892 4.4579402-.0409751 2.2896772 1.676352 3.9613243 5.3858811 5.2358503 7.529819 2.4196871 10.4113092 5.25648 9.869029 9.7292478M26.3725216 5.42669372c4.9022893 0 8.8982174 4.65220288 9.0851664 10.47578358H17.2875686c.186949-5.8235807 4.1828771-10.47578358 9.084953-10.47578358m25.370857 11.57065968c0-.6047069-.4870064-1.0948761-1.0875481-1.0948761h-11.77736c-.28896-7.68927544-5.7774923-13.82058185-12.5059489-13.82058185-6.7282432 0-12.2167755 6.13130641-12.5057355 13.82058185l-11.79421958.0002149c-.59136492.0107446-1.06748731.4968309-1.06748731 1.0946612 0 .0285807.00106706.0569465.00320118.0848825H.99995732l1.6812605 37.0613963c.00021341.1031483.00405483.2071562.01173767.3118087.00170729.0236381.003628.0470614.00554871.0704847l.00362801.0782207.00405483.004083c.25545428 2.5789222 2.12707837 4.6560709 4.67201764 4.7519129l.00576212.0055872h37.4122078c.0177132.0002149.0354264.0004298.0531396.0004298.0177132 0 .0354264-.0002149.0531396-.0004298h.0796027l.0017073-.0015043c2.589329-.0706995 4.6867431-2.1768587 4.9082648-4.787585l.0012805-.0012893.0017073-.0350275c.0021341-.0275062.0040548-.0547975.0057621-.0823037.0040548-.065757.0068292-.1312992.0078963-.1964115l1.8344904-37.207738h-.0012805c.001067-.0186956.0014939-.0376062.0014939-.0565167M176.465457 41.1518926c.720839-2.3512494 2.900423-3.9186779 5.443734-3.9186779 2.427686 0 4.739107 1.6486899 5.537598 3.9141989l.054826.1556978h-11.082664l.046506-.1512188zm13.50267 3.4063683c.014933.0006399.014933.0006399.036906.0008531.021973-.0002132.021973-.0002132.044372-.0008531.53055-.0243144.950595-.4766911.950595-1.0271786 0-.0266606-.000853-.0496953-.00256-.0865936.000427-.0068251.000427-.020262.000427-.0635588 0-5.1926268-4.070748-9.4007319-9.09145-9.4007319-5.020488 0-9.091235 4.2081051-9.091235 9.4007319 0 .3871116.022399.7731567.067838 1.1568557l.00256.0204753.01408.1013102c.250022 1.8683731 1.047233 3.5831812 2.306302 4.9708108-.00064-.0006399.00064.0006399.007253.0078915 1.396026 1.536289 3.291455 2.5833031 5.393601 2.9748936l.02752.0053321v-.0027727l.13653.0228215c.070186.0119439.144211.0236746.243409.039031 2.766879.332724 5.221231-.0661182 7.299484-1.1127057.511777-.2578611.971928-.5423827 1.37064-.8429007.128211-.0968312.243622-.1904632.34346-.2781231.051412-.0452164.092372-.083181.114131-.1051493.468898-.4830897.498124-.6543572.215249-1.0954297-.31146-.4956734-.586228-.9179769-.821744-1.2675504-.082345-.1224254-.154023-.2267215-.214396-.3133151-.033279-.0475624-.033279-.0475624-.054399-.0776356-.008319-.0117306-.008319-.0117306-.013866-.0191956l-.00256-.0038391c-.256208-.3188605-.431565-.3480805-.715933-.0970445-.030292.0268739-.131624.1051493-.14997.1245582-1.999321 1.775381-4.729508 2.3465571-7.455854 1.7760208-.507724-.1362888-.982595-.3094759-1.419919-.5184948-1.708127-.8565509-2.918343-2.3826022-3.267563-4.1490253l-.02752-.1394881h13.754612zM154.831964 41.1518926c.720831-2.3512494 2.900389-3.9186779 5.44367-3.9186779 2.427657 0 4.739052 1.6486899 5.537747 3.9141989l.054612.1556978h-11.082534l.046505-.1512188zm13.502512 3.4063683c.015146.0006399.015146.0006399.037118.0008531.02176-.0002132.02176-.0002132.044159-.0008531.530543-.0243144.950584-.4766911.950584-1.0271786 0-.0266606-.000854-.0496953-.00256-.0865936.000426-.0068251.000426-.020262.000426-.0635588 0-5.1926268-4.070699-9.4007319-9.091342-9.4007319-5.020217 0-9.091343 4.2081051-9.091343 9.4007319 0 .3871116.022826.7731567.068051 1.1568557l.00256.0204753.01408.1013102c.250019 1.8683731 1.04722 3.5831812 2.306274 4.9708108-.00064-.0006399.00064.0006399.007254.0078915 1.396009 1.536289 3.291417 2.5833031 5.393538 2.9748936l.027519.0053321v-.0027727l.136529.0228215c.070184.0119439.144209.0236746.243619.039031 2.766847.332724 5.22117-.0661182 7.299185-1.1127057.511771-.2578611.971917-.5423827 1.370624-.8429007.128209-.0968312.243619-.1904632.343456-.2781231.051412-.0452164.09237-.083181.11413-.1051493.468892-.4830897.498118-.6543572.215246-1.0954297-.311457-.4956734-.586221-.9179769-.821734-1.2675504-.082344-.1224254-.154022-.2267215-.21418-.3133151-.033492-.0475624-.033492-.0475624-.054612-.0776356-.008319-.0117306-.008319-.0117306-.013866-.0191956l-.002346-.0038391c-.256419-.3188605-.431774-.3480805-.716138-.0970445-.030292.0268739-.131623.1051493-.149969.1245582-1.999084 1.775381-4.729452 2.3465571-7.455767 1.7760208-.507717-.1362888-.982582-.3094759-1.419902-.5184948-1.708107-.8565509-2.918095-2.3826022-3.267311-4.1490253l-.027733-.1394881h13.754451zM138.32144123 49.7357905c-3.38129629 0-6.14681004-2.6808521-6.23169343-6.04042014v-.31621743c.08401943-3.35418649 2.85039714-6.03546919 6.23169343-6.03546919 3.44242097 0 6.23320537 2.7740599 6.23320537 6.1960534 0 3.42199346-2.7907844 6.19605336-6.23320537 6.19605336m.00172791-15.67913203c-2.21776751 0-4.33682838.7553485-6.03989586 2.140764l-.19352548.1573553V34.6208558c0-.4623792-.0993546-.56419733-.56740117-.56419733h-2.17651376c-.47409424 0-.56761716.09428403-.56761716.56419733v27.6400724c0 .4539841.10583425.5641973.56761716.5641973h2.17651376c.46351081 0 .56740117-.1078454.56740117-.5641973V50.734168l.19352548.1573553c1.70328347 1.3856307 3.82234434 2.1409792 6.03989586 2.1409792 5.27140956 0 9.54473746-4.2479474 9.54473746-9.48802964 0-5.239867-4.2733279-9.48781439-9.54473746-9.48781439M115.907646 49.5240292c-3.449458 0-6.245805-2.7496948-6.245805-6.1425854 0-3.3928907 2.79656-6.1427988 6.245805-6.1427988 3.448821 0 6.24538 2.7499081 6.24538 6.1427988 0 3.3926772-2.796346 6.1425854-6.24538 6.1425854m.001914-15.5438312c-5.28187 0-9.563025 4.2112903-9.563025 9.4059406 0 5.1944369 4.281155 9.4059406 9.563025 9.4059406 5.281657 0 9.562387-4.2115037 9.562387-9.4059406 0-5.1946503-4.280517-9.4059406-9.562387-9.4059406M94.5919049 34.1890939c-1.9281307 0-3.7938902.6198995-5.3417715 1.7656047l-.188189.1393105V23.2574169c0-.4254677-.1395825-.5643476-.5649971-.5643476h-2.2782698c-.4600414 0-.5652122.1100273-.5652122.5643476v29.2834155c0 .443339.1135587.5647782.5652122.5647782h2.2782698c.4226187 0 .5649971-.1457701.5649971-.5647782v-9.5648406c.023658-3.011002 2.4931278-5.4412923 5.5299605-5.4412923 3.0445753 0 5.516841 2.4421328 5.5297454 5.4630394v9.5430935c0 .4844647.0806524.5645628.5652122.5645628h2.2726775c.481764 0 .565212-.0824666.565212-.5645628v-9.5710848c-.018066-4.8280677-4.0440197-8.7806537-8.9328471-8.7806537M62.8459442 47.7938061l-.0053397.0081519c-.3248668.4921188-.4609221.6991347-.5369593.8179812-.2560916.3812097-.224267.551113.1668119.8816949.91266.7358184 2.0858968 1.508535 2.8774525 1.8955369 2.2023021 1.076912 4.5810275 1.646045 7.1017886 1.6975309 1.6283921.0821628 3.6734936-.3050536 5.1963734-.9842376 2.7569891-1.2298679 4.5131066-3.6269626 4.8208863-6.5794607.4985136-4.7841067-2.6143125-7.7747902-10.6321784-10.1849709l-.0021359-.0006435c-3.7356476-1.2047686-5.4904836-2.8064071-5.4911243-5.0426086.1099976-2.4715346 2.4015793-4.3179454 5.4932602-4.4331449 2.4904317.0062212 4.6923065.6675996 6.8557356 2.0598624.4562232.2767364.666607.2256796.9733188-.172263.035242-.0587797.1332787-.2012238.543367-.790093l.0012815-.0019308c.3829626-.5500403.5089793-.7336731.5403767-.7879478.258441-.4863266.2214903-.6738208-.244985-1.0046173-.459427-.3290803-1.7535544-1.0024722-2.4936356-1.2978721-2.0583439-.8211991-4.1863175-1.2199998-6.3042524-1.1788111-4.8198184.1046878-8.578747 3.2393171-8.8265087 7.3515337-.1572005 2.9703036 1.350301 5.3588174 4.5000778 7.124567.8829712.4661613 4.1115618 1.6865902 5.6184225 2.1278667 4.2847814 1.2547527 6.5186944 3.5630343 6.0571315 6.2864205-.4192725 2.4743234-3.0117991 4.1199394-6.6498372 4.2325647-2.6382344-.0549182-5.2963324-1.0217793-7.6043603-2.7562084-.0115337-.0083664-.0700567-.0519149-.1779185-.1323615-.1516472-.1130543-.1516472-.1130543-.1742875-.1300017-.4705335-.3247898-.7473431-.2977598-1.0346184.1302162-.0346012.0529875-.3919333.5963776-.5681431.8632459"></path>
                                    </g>
                                </a></svg>
                        </a>
                    </div>

                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm">

                            <!-- Search history -->
                            <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-item">
                                        <a href="">Iphone</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Bàn phím Edra</a>
                                    </li>
                                    <li class="header__search-history-item">
                                        <a href="">Ghế edra</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="header__search-select">

                        </div>
                        <button class="header__search-btn">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </div>

                    <!-- Cart layout -->
                    <div class="header__cart">
                        <div class="header__cart-wrap">
                            <i class="header__cart-icon fas fa-shopping-cart"></i>
                            <span class="header__cart-notice">0</span>
                            <!-- No cart: header__cart-list--no-cart -->
                            <div class="header__cart-list">
                                <img src="./asset/img/nocard.png" alt="No card" class="header__cart-no-cart-img">

                                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header__cart-group">
                                    <!-- Cart items -->
                                    <li class="header__cart-item">
                                        <img src="https://cf.shopee.vn/file/f9864891a8ba04e463d2dd446e745c49" alt="Bàn Phím Cơ EDRA EK387" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">Bàn Phím Cơ EDRA EK387 Bàn Phím Cơ EDRA EK387Bàn Phím Cơ EDRA EK387Bàn Phím Cơ EDRA EK387Bàn Phím Cơ EDRA EK387</h5>
                                                <div class="header__cart-price-wrap">
                                                    <span class="header__cart-item-price">640.000đ</span>
                                                    <span class="header__cart-item-delect">x</span>
                                                    <span class="header__cart-item-qnt">2</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc">Phân loại hàng: Red Switch</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="https://cf.shopee.vn/file/c64ddf57f14037d07edc37f88c364641_tn" alt="Ghế Chơi Game E-DRA Jupiter" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">Ghế Chơi Game E-DRA Jupiter</h5>
                                                <div class="header__cart-price-wrap">
                                                    <span class="header__cart-item-price">2.000.000đ</span>
                                                    <span class="header__cart-item-delect">x</span>
                                                    <span class="header__cart-item-qnt">1</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc">Phân loại hàng: Red Switch</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__cart-item">
                                        <img src="https://cf.shopee.vn/file/2a4a9a695ba8e32e84d5c14da4fe785e_tn" alt="Giá đỡ màn hình máy tính" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name">Giá đỡ màn hình máy tính</h5>
                                                <div class="header__cart-price-wrap">
                                                    <span class="header__cart-item-price">699.000đ</span>
                                                    <span class="header__cart-item-delect">x</span>
                                                    <span class="header__cart-item-qnt">1</span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-desc">Phân loại hàng: Red Switch</span>
                                                <span class="header__cart-item-remove">Xóa</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <a style="display: flex;font-size: 1.2rem;" class="header__cart-view btn btn--primary">Xem giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: Search -->
            </div>



    </div>
    <!-- End: Search -->
    </div>

    </header>


    <div id="container">
        <div class="user">
            <div class="user-item">
                <div class="user-avt"></div>
                <div class="user-info">
                    <div id="user__item-name">275r90f2xo</div>
                    <div class="fix-user">
                        <div>Sửa hồ sơ</div>
                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="margin-right: 4px;">
                            <path d="M8.54 0L6.987 1.56l3.46 3.48L12 3.48M0 8.52l.073 3.428L3.46 12l6.21-6.18-3.46-3.48" fill="#9B9B9B" fill-rule="evenodd"></path>
                        </svg>

                    </div>
                </div>
            </div>

            <div class="nav">
                <ul class="info-item">
                    <li class="navbar-item">
                        <img class="image-item" src="https://down-vn.img.susercontent.com/file/sg-11134004-7rbmf-lmyeojqx4sdl3c">
                        <div>11.11 Shopee Live Thời Trang</div>
                    </li>
                    <li class="navbar-item">
                        <img class="image-item" src="https://down-vn.img.susercontent.com/file/ba61750a46794d8847c3f463c5e71cc4">
                        <div>Tài khoản của tôi</div>
                    </li>
                    <li class="navbar-item">
                        <img class="image-item selected" src="https://down-vn.img.susercontent.com/file/f0049e9df4e536bc3e7f140d071e9078">
                        <div class="selected">Đơn mua</div>
                    </li>
                    <li class="navbar-item">
                        <img class="image-item" src="https://down-vn.img.susercontent.com/file/e10a43b53ec8605f4829da5618e0717c">
                        <div>Thông báo</div>
                    </li>
                    <li class="navbar-item">
                        <img class="image-item" src="https://down-vn.img.susercontent.com/file/84feaa363ce325071c0a66d3c9a88748">
                        <div>Kho Voucher</div>
                    </li>
                    <li class="navbar-item">
                        <img class="image-item" src="https://down-vn.img.susercontent.com/file/a0ef4bd8e16e481b4253bd0eb563f784">
                        <div>Shoppee xu</div>
                    </li>
                </ul>
            </div>
        </div>

        <div id="product-info">
            <div class="product__info-item">
                <a href="#" class="link-item link-selected">
                    <span>Tất cả</span>
                </a>
                <a href="#" class="link-item">
                    <span> Chờ thanh toán</span>
                </a>
                <a href="#" class="link-item">
                    <span>Vận chuyển</span>
                </a>
                <a href="#" class="link-item">
                    <span>Chờ giao hàng</span>
                </a>
                <a href="#" class="link-item">
                    <span>Hoàn thành</span>
                </a>
                <a href="#" class="link-item">
                    <span>Đã hủy</span>
                </a>
                <a href="#" class="link-item">
                    <span>Trả hàng/Hoàn tiền</span>
                </a>
            </div>
            <div class="search-select">
                <svg style="margin: 0 15px;
                    stroke: #bbb;" width="19px" height="19px" viewBox="0 0 19 19">
                    <g id="Search-New" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="my-purchase-copy-27" transform="translate(-399.000000, -221.000000)" stroke-width="2">
                            <g id="Group-32" transform="translate(400.000000, 222.000000)">
                                <circle id="Oval-27" cx="7" cy="7" r="7"></circle>
                                <path d="M12,12 L16.9799555,16.919354" id="Path-184" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                <div>Bạn có thể tìm kiếm theo tên Shop, ID đơn hàng hoặc Tên Sản phẩm</div>
            </div>

            <?php
            $query = "SELECT name, image, quantity, product.id as pID, product.price AS Price, value, status
            FROM order_details 
            INNER JOIN product ON product.id = order_details.product_id 
            INNER JOIN `order` ON `order`.id = order_details.order_id 
            INNER JOIN product_image ON product.id = product_image.id
            INNER JOIN variation_option ON variation_option.id = order_details.option_id
            INNER JOIN order_status ON order_status.id = `order`.order_status
            WHERE `order`.user_id = '$id' AND product_image.is_default = 1";
  

            // Thực hiện truy vấn
            $result = $mysqli->query($query);
            $productNum = $result->num_rows;


            // Kiểm tra kết quả truy vấn
            if ($result->num_rows > 0) {
                // Lặp qua từng dòng dữ liệu và thay thế vào file HTML
                while ($row = $result->fetch_assoc()) {
                    $productName = $row['name'];
                    $productImage = $row['image'];
                    $productID = $row['pID'];
                    $quantity = $row['quantity'];
                    $totalPrice = number_format($row['Price'] * $quantity * 0.94, 0, ',', '.');
                    $onePrice = number_format($row['Price'], 0, ',', '.');
                    $onePriceUpdate = number_format($row['Price'] * 0.94, 0, ',', '.');
                    $status = $row['status'];

                    //changed
                    $row['value'] == null ? $TypeProduct = "none" : $TypeProduct = $row['value'];

                    echo '<div class="info__product-selected">
                                <div class="shop-user">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="62" height="16" fill="none"><title>Preferred Seller</title><path fill="#EE4D2D" fill-rule="evenodd" d="M0 2C0 .9.9 0 2 0h58a2 2 0 012 2v12a2 2 0 01-2 2H2a2 2 0 01-2-2V2z" clip-rule="evenodd"></path><g clip-path="url(#clip0)"><path fill="#fff" d="M8.7 13H7V8.7L5.6 6.3A828.9 828.9 0 004 4h2l2 3.3a1197.3 1197.3 0 002-3.3h1.6L8.7 8.7V13zm7.9-1.7h1.7c0 .3-.2.6-.5 1-.2.3-.5.5-1 .7l-.6.2h-.8c-.5 0-1 0-1.5-.2l-1-.8a4 4 0 01-.9-2.4c0-1 .3-1.9 1-2.6a3 3 0 012.4-1l.8.1a2.8 2.8 0 011.3.7l.4.6.3.8V10h-4.6l.2 1 .4.7.6.5.7.1c.4 0 .7 0 .9-.2l.2-.6v-.1zm0-2.3l-.1-1-.3-.3c0-.2-.1-.2-.2-.3l-.8-.2c-.3 0-.6.2-.9.5l-.3.5a4 4 0 00-.3.8h3zm-1.4-4.2l-.7.7h-1.4l1.5-2h1.1l1.5 2h-1.4l-.6-.7zm8.1 1.6H25V13h-1.7v-.5.1H23l-.7.5-.9.1-1-.1-.7-.4c-.3-.2-.4-.5-.6-.8l-.2-1.3V6.4h1.7v3.7c0 1 0 1.6.3 1.7.2.2.5.3.7.3h.4l.4-.2.3-.3.3-.5.2-1.4V6.4zM34.7 13a11.2 11.2 0 01-1.5.2 3.4 3.4 0 01-1.3-.2 2 2 0 01-.5-.3l-.3-.5-.2-.6V7.4h-1.2v-1h1.1V5h1.7v1.5h1.9v1h-2v3l.2 1.2.1.3.2.2h.3l.2.1c.2 0 .6 0 1.3-.3v1zm2.4 0h-1.7V3.5h1.7v3.4a3.7 3.7 0 01.2-.1 2.8 2.8 0 013.4 0l.4.4.2.7V13h-1.6V9.3 8.1l-.4-.6-.6-.2a1 1 0 00-.4.1 2 2 0 00-.4.2l-.3.3a3 3 0 00-.3.5l-.1.5-.1.9V13zm5.4-6.6H44V13h-1.6V6.4zm-.8-.9l1.8-2h1.8l-2.1 2h-1.5zm7.7 5.8H51v.5l-.4.5a2 2 0 01-.4.4l-.6.3-1.4.2c-.5 0-1 0-1.4-.2l-1-.7c-.3-.3-.5-.7-.6-1.2-.2-.4-.3-.9-.3-1.4 0-.5.1-1 .3-1.4a2.6 2.6 0 011.6-1.8c.4-.2.9-.3 1.4-.3.6 0 1 .1 1.5.3.4.1.7.4 1 .6l.2.5.1.5h-1.6c0-.3-.1-.5-.3-.6-.2-.2-.4-.3-.8-.3s-.8.2-1.2.6c-.3.4-.4 1-.4 2 0 .9.1 1.5.4 1.8.4.4.8.6 1.2.6h.5l.3-.2.2-.3v-.4zm4 1.7h-1.6V3.5h1.7v3.4a3.7 3.7 0 01.2-.1 2.8 2.8 0 013.4 0l.3.4.3.7V13h-1.6V9.3L56 8.1c-.1-.3-.2-.5-.4-.6l-.6-.2a1 1 0 00-.3.1 2 2 0 00-.4.2l-.3.3a3 3 0 00-.3.5l-.2.5V13z"></path></g><defs><clipPath id="clip0"><path fill="#fff" d="M0 0h55v16H0z" transform="translate(4)"></path></clipPath></defs></svg>
                                    <div class="name-shop">Sammi offical</div>
                                    <div class="yHlRfY"><button class="stardust-button stardust-button--primary"><svg viewBox="0 0 17 17" class="shopee-svg-icon icon-btn-chat" style="fill: white;"><g fill-rule="evenodd"><path d="M13.89 0C14.504 0 15 .512 15 1.144l-.003.088-.159 2.117.162.001c.79 0 1.46.558 1.618 1.346l.024.15.008.154v9.932a1.15 1.15 0 01-1.779.963l-.107-.08-1.882-1.567-7.962.002a1.653 1.653 0 01-1.587-1.21l-.036-.148-.021-.155-.071-.836h-.01L.91 13.868a.547.547 0 01-.26.124L.556 14a.56.56 0 01-.546-.47L0 13.429V1.144C0 .512.497 0 1.11 0h12.78zM15 4.65l-.259-.001-.461 6.197c-.045.596-.527 1.057-1.106 1.057L4.509 11.9l.058.69.01.08a.35.35 0 00.273.272l.07.007 8.434-.001 1.995 1.662.002-9.574-.003-.079a.35.35 0 00-.274-.3L15 4.65zM13.688 1.3H1.3v10.516l1.413-1.214h10.281l.694-9.302zM4.234 5.234a.8.8 0 011.042-.077l.187.164c.141.111.327.208.552.286.382.131.795.193 1.185.193s.803-.062 1.185-.193c.225-.078.41-.175.552-.286l.187-.164a.8.8 0 011.042 1.209c-.33.33-.753.579-1.26.753A5.211 5.211 0 017.2 7.4a5.211 5.211 0 01-1.706-.28c-.507-.175-.93-.424-1.26-.754a.8.8 0 010-1.132z" fill-rule="nonzero"></path></g></svg><span>chat</span></button></div>
                                </div>
                                <div class="status-ship">
                                    <div class="status__ship-item">
                                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line"><g><line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line><circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle><circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle><line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line><polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline><polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline></g></svg>
                                        <div>'.$status.'</div>
                                    </div>
                                </div>

                            </div>

                            <div class="FycaKn"></div>

                            <div class="product-info-item">
                                <div class="product-info-1">
                                    <img src="' . $productImage . '" class="product-image" alt="">
                                    <div class="product-item-info">
                                        <div class="name-product">' . $productName . '</div>
                                        <div class="type-product">Phân loại hàng : ' . $TypeProduct . '</div>
                                        <div class="quantity-produdct">x' . $quantity . '</div>
                                    </div>
                                </div>
                                
                                <div class="product-coin">
                                    <span class="coin-old">₫' . $onePrice . '</span>
                                    <span class="coin-safe">₫' . $onePriceUpdate . '</span>
                                </div>
                            </div>
                        <div class="O2KPzo"><div class="mn7INg xFSVYg"> </div>
                        <div class="mn7INg EfbgJE"> </div>
                        </div>';
                }
            }
            ?>
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
</body>