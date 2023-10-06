<?php

$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);


// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$query1 = "SELECT COUNT(productId) as total FROM cart";
$results1 = mysqli_query($conn, $query1);

if ($results1->num_rows > 0) {
    $row = mysqli_fetch_assoc($results1);
    $totalProducts = $row['total'];
}

$query2 = "SELECT * FROM (cart INNER JOIN product ON cart.productId = product.ID) WHERE cart.id BETWEEN 1 AND 3";
$saveImage = array();
$saveName = array();
$number = 1;
$results2 = mysqli_query($conn, $query2);

if ($results2->num_rows > 0) {
    // Lấy thông tin sản phẩm từ kết quả truy vấn
    while ($row = $results2->fetch_assoc()) {
        $saveImage[$number] = $row['productImage'];
        $saveName[$number] = $row['productName'];
        $number++;
    }
}



$header = '                        <div class="header__cart-wrap">';
$header .= '                           <i class="header__cart-icon fas fa-shopping-cart"></i> ';
$header .= '                          <span class="header__cart-notice">' . $totalProducts . '</span>';
$header .= '                            <!-- No cart: header__cart-list--no-cart -->';
$header .= '                            <div class="header__cart-list">';
$header .= '                                <img src=".../img/nocard.png" alt="No card" class="header__cart-no-cart-img">';
$header .= '                               <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>';
$header .= '                                <ul class="header__cart-group">';
$header .= '                                   <!-- Cart items -->';

for ($i = 0; $i < $number - 1; $i++) {
    $header .= '                                  <li class="header__cart-item">';
    $header .= '                                     <img src="' . $saveImage[$i] . '" alt="' . $saveName[$i] . '" class="header__cart-img">';
    $header .= '                                    <div class="header__cart-item-info">';
    $header .= '                                        <div class="header__cart-item-head">';
    $header .= '                                             <h5 class="header__cart-item-name">Giá đỡ màn hình máy tính</h5>';
    $header .= '                                             <div class="header__cart-price-wrap">';
    $header .= '                                                 <span class="header__cart-item-price">699.000đ</span>';
    $header .= '                                                 <span class="header__cart-item-delect">x</span>';
    $header .= '                                                  <span class="header__cart-item-qnt">1</span>';
    $header .= '                                             </div>';
    $header .= '                                         </div>';
    $header .= '                                         <div class="header__cart-item-body">';
    $header .= '                                             <span class="header__cart-item-desc">Phân loại hàng: Red Switch</span>';
    $header .= '                                              <span class="header__cart-item-remove">Xóa</span>';
    $header .= '                                           </div>';
    $header .= '                                       </div>';
    $header .= '                                  </li>';
}

$header .= '                             </ul>';
$header .= '                            <a style="display: flex;font-size: 1.2rem;" class="header__cart-view btn btn--primary">Xem giỏ hàng</a>';
$header .= '                         </div>';
$header .= '                      </div>';

echo $header;
