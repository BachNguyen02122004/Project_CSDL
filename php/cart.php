<?php

$servername = "localhost";
$username = "root";
$password = "Duc[992299]V";
$dbname = "project";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $mysqli->connect_error);
}

// Chuẩn bị câu truy vấn để lấy dữ liệu từ bảng "car"
?>;


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                              <img src="https://cf.shopee.vn/file/be5db69ffdcfad7d1680e8d9702efbd6_tn"
                                                  alt="" class="header__notify-img">
                                              <div class="header__notify-info">
                                                  <span class="header__notify-name">🎁 Tặng Admin 01 Mã
                                                      Freeship!</span>
                                                  <span class="header__notify-desc">👉 Cho đơn từ 0đ - Mã có sẵn trong ví!
                                                      🤑 Siêu giảm giá, sale linh đình ️🛒 Dùng ngay thôi!</span>
                                                  <img src="https://cf.shopee.vn/file/db9bdbafe0213c8524822a5f6956cc04"
                                                      alt="" class="header__notify-img-more">
                                              </div>
                                          </a>
                                      </li>
  
                                      <li class="header__notify-item header__notify-item--viewed">
                                          <a href="" class="header__notify-link">
                                              <img src="https://cf.shopee.vn/file/e563dbc2e6a1686585e262c20d0faef0_tn"
                                                  alt="" class="header__notify-img">
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
                                              <img src="https://cf.shopee.vn/file/ff1cf06d837ce15b4cad1a3bc25aab44_tn"
                                                  alt="" class="header__notify-img">
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
                              <img src="https://scontent.fhan5-2.fna.fbcdn.net/v/t39.30808-6/334087802_3382305192083244_2123568042910148607_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=a2f6c7&_nc_ohc=vZoTiEhQ_20AX-s2s6D&_nc_ht=scontent.fhan5-2.fna&oh=00_AfAT59ibTdTpBy6wOv0-FoXAqZ-m0Lhw9vOkgw01QVXOHg&oe=6509F395" alt="avt" class="navbar__user-avt">
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
                              
                             <svg viewBox="0 0 192 65" class="header__logo-image"><g  fill ="#ee4d2d" fill-rule="evenodd"><path d="M35.6717403 44.953764c-.3333497 2.7510509-2.0003116 4.9543414-4.5823845 6.0575984-1.4379707.6145919-3.36871.9463856-4.896954.8421628-2.3840266-.0911143-4.6237865-.6708937-6.6883352-1.7307424-.7375522-.3788551-1.8370513-1.1352759-2.6813095-1.8437757-.213839-.1790053-.239235-.2937577-.0977428-.4944671.0764015-.1151823.2172535-.3229831.5286218-.7791994.45158-.6616533.5079208-.7446018.5587128-.8221779.14448-.2217688.3792333-.2411091.6107855-.0588804.0243289.0189105.0243289.0189105.0426824.0333083.0379873.0294402.0379873.0294402.1276204.0990653.0907002.0706996.14448.1123887.166248.1287205 2.2265285 1.7438508 4.8196989 2.7495466 7.4376251 2.8501162 3.6423042-.0496401 6.2615109-1.6873341 6.7308041-4.2020035.5160305-2.7675977-1.6565047-5.1582742-5.9070334-6.4908212-1.329344-.4166762-4.6895175-1.7616869-5.3090528-2.1250697-2.9094471-1.7071043-4.2697358-3.9430584-4.0763845-6.7048539.296216-3.8283059 3.8501677-6.6835796 8.340785-6.702705 2.0082079-.004083 4.0121475.4132378 5.937338 1.2244562.6816382.2873109 1.8987274.9496089 2.3189359 1.2633517.2420093.1777159.2898136.384872.1510957.60836-.0774686.12958-.2055158.3350171-.4754821.7632974l-.0029878.0047276c-.3553311.5640922-.3664286.5817134-.447952.7136572-.140852.2144625-.3064598.2344475-.5604202.0732783-2.0600669-1.3839063-4.3437898-2.0801572-6.8554368-2.130442-3.126914.061889-5.4706057 1.9228561-5.6246892 4.4579402-.0409751 2.2896772 1.676352 3.9613243 5.3858811 5.2358503 7.529819 2.4196871 10.4113092 5.25648 9.869029 9.7292478M26.3725216 5.42669372c4.9022893 0 8.8982174 4.65220288 9.0851664 10.47578358H17.2875686c.186949-5.8235807 4.1828771-10.47578358 9.084953-10.47578358m25.370857 11.57065968c0-.6047069-.4870064-1.0948761-1.0875481-1.0948761h-11.77736c-.28896-7.68927544-5.7774923-13.82058185-12.5059489-13.82058185-6.7282432 0-12.2167755 6.13130641-12.5057355 13.82058185l-11.79421958.0002149c-.59136492.0107446-1.06748731.4968309-1.06748731 1.0946612 0 .0285807.00106706.0569465.00320118.0848825H.99995732l1.6812605 37.0613963c.00021341.1031483.00405483.2071562.01173767.3118087.00170729.0236381.003628.0470614.00554871.0704847l.00362801.0782207.00405483.004083c.25545428 2.5789222 2.12707837 4.6560709 4.67201764 4.7519129l.00576212.0055872h37.4122078c.0177132.0002149.0354264.0004298.0531396.0004298.0177132 0 .0354264-.0002149.0531396-.0004298h.0796027l.0017073-.0015043c2.589329-.0706995 4.6867431-2.1768587 4.9082648-4.787585l.0012805-.0012893.0017073-.0350275c.0021341-.0275062.0040548-.0547975.0057621-.0823037.0040548-.065757.0068292-.1312992.0078963-.1964115l1.8344904-37.207738h-.0012805c.001067-.0186956.0014939-.0376062.0014939-.0565167M176.465457 41.1518926c.720839-2.3512494 2.900423-3.9186779 5.443734-3.9186779 2.427686 0 4.739107 1.6486899 5.537598 3.9141989l.054826.1556978h-11.082664l.046506-.1512188zm13.50267 3.4063683c.014933.0006399.014933.0006399.036906.0008531.021973-.0002132.021973-.0002132.044372-.0008531.53055-.0243144.950595-.4766911.950595-1.0271786 0-.0266606-.000853-.0496953-.00256-.0865936.000427-.0068251.000427-.020262.000427-.0635588 0-5.1926268-4.070748-9.4007319-9.09145-9.4007319-5.020488 0-9.091235 4.2081051-9.091235 9.4007319 0 .3871116.022399.7731567.067838 1.1568557l.00256.0204753.01408.1013102c.250022 1.8683731 1.047233 3.5831812 2.306302 4.9708108-.00064-.0006399.00064.0006399.007253.0078915 1.396026 1.536289 3.291455 2.5833031 5.393601 2.9748936l.02752.0053321v-.0027727l.13653.0228215c.070186.0119439.144211.0236746.243409.039031 2.766879.332724 5.221231-.0661182 7.299484-1.1127057.511777-.2578611.971928-.5423827 1.37064-.8429007.128211-.0968312.243622-.1904632.34346-.2781231.051412-.0452164.092372-.083181.114131-.1051493.468898-.4830897.498124-.6543572.215249-1.0954297-.31146-.4956734-.586228-.9179769-.821744-1.2675504-.082345-.1224254-.154023-.2267215-.214396-.3133151-.033279-.0475624-.033279-.0475624-.054399-.0776356-.008319-.0117306-.008319-.0117306-.013866-.0191956l-.00256-.0038391c-.256208-.3188605-.431565-.3480805-.715933-.0970445-.030292.0268739-.131624.1051493-.14997.1245582-1.999321 1.775381-4.729508 2.3465571-7.455854 1.7760208-.507724-.1362888-.982595-.3094759-1.419919-.5184948-1.708127-.8565509-2.918343-2.3826022-3.267563-4.1490253l-.02752-.1394881h13.754612zM154.831964 41.1518926c.720831-2.3512494 2.900389-3.9186779 5.44367-3.9186779 2.427657 0 4.739052 1.6486899 5.537747 3.9141989l.054612.1556978h-11.082534l.046505-.1512188zm13.502512 3.4063683c.015146.0006399.015146.0006399.037118.0008531.02176-.0002132.02176-.0002132.044159-.0008531.530543-.0243144.950584-.4766911.950584-1.0271786 0-.0266606-.000854-.0496953-.00256-.0865936.000426-.0068251.000426-.020262.000426-.0635588 0-5.1926268-4.070699-9.4007319-9.091342-9.4007319-5.020217 0-9.091343 4.2081051-9.091343 9.4007319 0 .3871116.022826.7731567.068051 1.1568557l.00256.0204753.01408.1013102c.250019 1.8683731 1.04722 3.5831812 2.306274 4.9708108-.00064-.0006399.00064.0006399.007254.0078915 1.396009 1.536289 3.291417 2.5833031 5.393538 2.9748936l.027519.0053321v-.0027727l.136529.0228215c.070184.0119439.144209.0236746.243619.039031 2.766847.332724 5.22117-.0661182 7.299185-1.1127057.511771-.2578611.971917-.5423827 1.370624-.8429007.128209-.0968312.243619-.1904632.343456-.2781231.051412-.0452164.09237-.083181.11413-.1051493.468892-.4830897.498118-.6543572.215246-1.0954297-.311457-.4956734-.586221-.9179769-.821734-1.2675504-.082344-.1224254-.154022-.2267215-.21418-.3133151-.033492-.0475624-.033492-.0475624-.054612-.0776356-.008319-.0117306-.008319-.0117306-.013866-.0191956l-.002346-.0038391c-.256419-.3188605-.431774-.3480805-.716138-.0970445-.030292.0268739-.131623.1051493-.149969.1245582-1.999084 1.775381-4.729452 2.3465571-7.455767 1.7760208-.507717-.1362888-.982582-.3094759-1.419902-.5184948-1.708107-.8565509-2.918095-2.3826022-3.267311-4.1490253l-.027733-.1394881h13.754451zM138.32144123 49.7357905c-3.38129629 0-6.14681004-2.6808521-6.23169343-6.04042014v-.31621743c.08401943-3.35418649 2.85039714-6.03546919 6.23169343-6.03546919 3.44242097 0 6.23320537 2.7740599 6.23320537 6.1960534 0 3.42199346-2.7907844 6.19605336-6.23320537 6.19605336m.00172791-15.67913203c-2.21776751 0-4.33682838.7553485-6.03989586 2.140764l-.19352548.1573553V34.6208558c0-.4623792-.0993546-.56419733-.56740117-.56419733h-2.17651376c-.47409424 0-.56761716.09428403-.56761716.56419733v27.6400724c0 .4539841.10583425.5641973.56761716.5641973h2.17651376c.46351081 0 .56740117-.1078454.56740117-.5641973V50.734168l.19352548.1573553c1.70328347 1.3856307 3.82234434 2.1409792 6.03989586 2.1409792 5.27140956 0 9.54473746-4.2479474 9.54473746-9.48802964 0-5.239867-4.2733279-9.48781439-9.54473746-9.48781439M115.907646 49.5240292c-3.449458 0-6.245805-2.7496948-6.245805-6.1425854 0-3.3928907 2.79656-6.1427988 6.245805-6.1427988 3.448821 0 6.24538 2.7499081 6.24538 6.1427988 0 3.3926772-2.796346 6.1425854-6.24538 6.1425854m.001914-15.5438312c-5.28187 0-9.563025 4.2112903-9.563025 9.4059406 0 5.1944369 4.281155 9.4059406 9.563025 9.4059406 5.281657 0 9.562387-4.2115037 9.562387-9.4059406 0-5.1946503-4.280517-9.4059406-9.562387-9.4059406M94.5919049 34.1890939c-1.9281307 0-3.7938902.6198995-5.3417715 1.7656047l-.188189.1393105V23.2574169c0-.4254677-.1395825-.5643476-.5649971-.5643476h-2.2782698c-.4600414 0-.5652122.1100273-.5652122.5643476v29.2834155c0 .443339.1135587.5647782.5652122.5647782h2.2782698c.4226187 0 .5649971-.1457701.5649971-.5647782v-9.5648406c.023658-3.011002 2.4931278-5.4412923 5.5299605-5.4412923 3.0445753 0 5.516841 2.4421328 5.5297454 5.4630394v9.5430935c0 .4844647.0806524.5645628.5652122.5645628h2.2726775c.481764 0 .565212-.0824666.565212-.5645628v-9.5710848c-.018066-4.8280677-4.0440197-8.7806537-8.9328471-8.7806537M62.8459442 47.7938061l-.0053397.0081519c-.3248668.4921188-.4609221.6991347-.5369593.8179812-.2560916.3812097-.224267.551113.1668119.8816949.91266.7358184 2.0858968 1.508535 2.8774525 1.8955369 2.2023021 1.076912 4.5810275 1.646045 7.1017886 1.6975309 1.6283921.0821628 3.6734936-.3050536 5.1963734-.9842376 2.7569891-1.2298679 4.5131066-3.6269626 4.8208863-6.5794607.4985136-4.7841067-2.6143125-7.7747902-10.6321784-10.1849709l-.0021359-.0006435c-3.7356476-1.2047686-5.4904836-2.8064071-5.4911243-5.0426086.1099976-2.4715346 2.4015793-4.3179454 5.4932602-4.4331449 2.4904317.0062212 4.6923065.6675996 6.8557356 2.0598624.4562232.2767364.666607.2256796.9733188-.172263.035242-.0587797.1332787-.2012238.543367-.790093l.0012815-.0019308c.3829626-.5500403.5089793-.7336731.5403767-.7879478.258441-.4863266.2214903-.6738208-.244985-1.0046173-.459427-.3290803-1.7535544-1.0024722-2.4936356-1.2978721-2.0583439-.8211991-4.1863175-1.2199998-6.3042524-1.1788111-4.8198184.1046878-8.578747 3.2393171-8.8265087 7.3515337-.1572005 2.9703036 1.350301 5.3588174 4.5000778 7.124567.8829712.4661613 4.1115618 1.6865902 5.6184225 2.1278667 4.2847814 1.2547527 6.5186944 3.5630343 6.0571315 6.2864205-.4192725 2.4743234-3.0117991 4.1199394-6.6498372 4.2325647-2.6382344-.0549182-5.2963324-1.0217793-7.6043603-2.7562084-.0115337-.0083664-.0700567-.0519149-.1779185-.1323615-.1516472-.1130543-.1516472-.1130543-.1742875-.1300017-.4705335-.3247898-.7473431-.2977598-1.0346184.1302162-.0346012.0529875-.3919333.5963776-.5681431.8632459"></path></g></svg>
                            <div class="cart-text"> Giỏ hàng </div>
                          </div>
                          
                      </div>
                      <div></div>
  
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
                          
  
                          
                          <button class="header__search-btn">
                              <i class="header__search-btn-icon fas fa-search"></i>
                          </button>
                      </div>
                      
                      <!-- Cart layout -->
                    </div>
                  </div>
                  <!-- End: Search -->
              </div>
                </div>
  
        </header>

    
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
                        <div class="product-info-3">Số Lướng</div>
                        <div class="product-info-4">Số Tiền</div>
                        <div class="product-info-5">Thao tác</div>
                    
                </div>
                
                <?php
                $query = "SELECT * FROM cart ";

// Thực hiện truy vấn
$result = $mysqli->query($query);

// Kiểm tra kết quả truy vấn
if ($result->num_rows > 0) {
    // Lặp qua từng dòng dữ liệu và thay thế vào file HTML
    while ($row = $result->fetch_assoc()) {
        $productName = $row['productName'];
        $productImage = $row['productImage'];
        $productID = $row['productId'];

        
                
        echo '<div class="product-info">
        <div id="productId">'.$productID.'</div> 
        <label class="check-box">
            <input class="" type="checkbox" aria-checked="true" aria-disabled="false" tabindex="0" role="checkbox" aria-label="Click here to select all products">
            <div class="check-before"></div>
        </label>
        <div class="box-info-item">
            <div class="box-info-item-1">
                <a href="#" class="item-image-box">
                    <img class="item-image" src=" '. $productImage .' " alt="Ảnh sản phẩm">
                </a>
                <div class="product-item-info">
                    <div style="margin-bottom: 2px;">
                        <a href="#">'. $productName .'</a>
                    </div>
                    <img class="anh_sale" src="../img/anh-sale.png" alt="ảnh sale">
                    <div class="box-sale">
                        <img class="anh-sale-2" src="../img/anh-sale-2.png" alt="">
                        <div>7 Ngày Miễn Phí Trả Hàng</div>
                    </div>
                </div>
            </div>
            <div class="flash-sale-1">
                <svg viewBox="0 0 108 21" height="21" width="108" class="shopee-svg-icon"><g fill="currentColor" fill-rule="evenodd"><path d="M0 16.195h3.402v-5.233h4.237V8H3.402V5.037h5.112V2.075H0zm29.784 0l-.855-2.962h-4.335l-.836 2.962H20.26l4.723-14.12h3.576l4.724 14.12zM26.791 5.294h-.04s-.31 1.54-.563 2.43l-.797 2.744h2.74l-.777-2.745c-.252-.889-.563-2.43-.563-2.43zm7.017 9.124s1.807 2.014 5.073 2.014c3.13 0 4.898-2.034 4.898-4.384 0-4.463-6.259-4.147-6.259-5.925 0-.79.778-1.106 1.477-1.106 1.672 0 3.071 1.245 3.071 1.245l1.439-2.824s-1.477-1.6-4.47-1.6c-2.76 0-4.918 1.718-4.918 4.325 0 4.345 6.258 4.285 6.258 5.964 0 .85-.758 1.126-1.457 1.126-1.75 0-3.324-1.462-3.324-1.462zm12.303 1.777h3.402v-5.53h5.054v5.53h3.401V2.075h-3.401v5.648h-5.054V2.075h-3.402zm18.64-1.678s1.692 1.915 4.763 1.915c2.877 0 4.548-1.876 4.548-4.107 0-4.483-6.492-3.871-6.492-6.36 0-.987.914-1.678 2.08-1.678 1.73 0 3.052 1.224 3.052 1.224l1.088-2.073s-1.4-1.501-4.12-1.501c-2.644 0-4.627 1.738-4.627 4.068 0 4.305 6.512 3.87 6.512 6.379 0 1.145-.952 1.698-2.002 1.698-1.944 0-3.44-1.48-3.44-1.48zm19.846 1.678l-1.166-3.594h-4.84l-1.166 3.594H74.84L79.7 2.174h2.623l4.86 14.021zM81.04 4.603h-.039s-.31 1.382-.583 2.172l-1.224 3.752h3.615l-1.224-3.752c-.253-.79-.545-2.172-.545-2.172zm7.911 11.592h8.475v-2.192H91.46V2.173H88.95zm10.477 0H108v-2.192h-6.064v-3.772h4.645V8.04h-4.645V4.366h5.753V2.174h-8.26zM14.255.808l6.142.163-3.391 5.698 3.87 1.086-8.028 12.437.642-8.42-3.613-1.025z"></path></g></svg>
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
                    <button aria-label="Decrease" class="item-down-up" fdprocessedid="ow0la"><svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon-1"><polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon></svg></button>
                    <input class="text-number" type="text" value="1" aria-valuenow="1">
                    <button class="item-down-up"><svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon-1"><polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon></svg></button>
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

        </div>';
        
    }
} else {
        echo "Không tìm thấy sản phẩm.";
}
    
    // Đóng kết nối đến cơ sở dữ liệu
$mysqli->close();
?>
                    
                    
                <div class="free-ship free-ship-2">
                    <img width="24" height="20" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/d9e992985b18d96aab90969636ebfd0e.png" alt="fs-icon">
                    <div class="free-ship-item free-ship-item-2">Giảm ₫25.000 phí vận chuyển đơn tối thiểu ₫99.000</div>
                    <a href="#">Tìm hiểu thêm</a>
                </div>


            <div class="buy-item-1">
                <div class="box-buy-item">
                    <svg fill="none" viewBox="0 -2 23 22" class="icon-voucher"><g filter="url(#voucher-filter0_d)"><mask id="a" fill="#fff"><path fill-rule="evenodd" clip-rule="evenodd" d="M1 2h18v2.32a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75V16H1v-2.12a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75V2z"></path></mask><path d="M19 2h1V1h-1v1zM1 2V1H0v1h1zm18 2.32l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zM19 16v1h1v-1h-1zM1 16H0v1h1v-1zm0-2.12l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zM19 1H1v2h18V1zm1 3.32V2h-2v2.32h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zM20 16v-2.13h-2V16h2zM1 17h18v-2H1v2zm-1-3.12V16h2v-2.12H0zm1.4.91a2.5 2.5 0 001.5-2.29h-2a.5.5 0 01-.3.46l.8 1.83zm1.5-2.29a2.5 2.5 0 00-1.5-2.3l-.8 1.84c.18.08.3.26.3.46h2zM0 10.48v.65h2v-.65H0zM.9 9.1a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 9.1h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 8.65zM0 7.08v.65h2v-.65H0zM.9 5.7a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 5.7h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 5.25zM0 2v2.33h2V2H0z" mask="url(#a)"></path></g><path clip-rule="evenodd" d="M6.49 14.18h.86v-1.6h-.86v1.6zM6.49 11.18h.86v-1.6h-.86v1.6zM6.49 8.18h.86v-1.6h-.86v1.6zM6.49 5.18h.86v-1.6h-.86v1.6z"></path><defs><filter id="voucher-filter0_d" x="0" y="1" width="20" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix><feOffset></feOffset><feGaussianBlur stdDeviation=".5"></feGaussianBlur><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"></feColorMatrix><feBlend in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend><feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend></filter></defs></svg>
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
    <script src="../js/app.js"></script>
    <script src="../js/cart.js"></script>
</body>
</html>
