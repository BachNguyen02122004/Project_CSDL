
<?php
// check - pass
$servername = "localhost";
$username = "root";
$password = getenv('mySQLPass');
$dbname = "test_project";

$conn = new mysqli($servername, $username, $password, $dbname);


// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = null;
}
$Username = $_SESSION['username'];

if (!isset($_SESSION['id'])) {
    $_SESSION['id'] = null;
}
$id = $_SESSION['id'];

if (!isset($_SESSION['cart_id'])) {
    $_SESSION['cart_id'] = null;
}
$cart_id = $_SESSION['cart_id'];

//initialize
$totalProducts = 0;
$saveImage = array();
$saveName = array();
$GIA_SP = array();
$Name = array();
$quantity = array();
$productline = array();

$query1 = "SELECT COUNT(product_id) as total FROM cart_detail WHERE cart_id = '$cart_id'";
$results1 = mysqli_query($conn, $query1);

if ($results1->num_rows > 0) {
    $row = mysqli_fetch_assoc($results1);
    $totalProducts = $row['total'];
}

$query2 = "SELECT cart_detail.id as cID, image, name, price, productline_name, quantity FROM cart_detail INNER JOIN product ON cart_detail.product_id = product.id INNER JOIN productline ON product.productline_id = productline.id inner join product_image on product.id = product_image.id WHERE cart_id = '$cart_id' and product_image.is_default = 1 ORDER BY cart_detail.id LIMIT 3";
$number = 0;
$results2 = mysqli_query($conn, $query2);

if ($results2->num_rows > 0) {
    while ($row = $results2->fetch_assoc()) {
        $saveImage[$number] = $row['image'];
        $name[$number] = $row['name'];
        $GIA_SP[$number] = number_format($row['price']*0.94, 0, ',', '.');
        $quantity[$number] = $row['quantity'];
        $productline[$number] = $row['productline_name'];
        $number++;
    }
}



$header = '                        <div class="header__cart-wrap">';
$header .= '                           <i class="header__cart-icon fas fa-shopping-cart"></i> ';
$header .= '                          <span class="header__cart-notice">' . $totalProducts . '</span>';
$header .= '                            <!-- No cart: header__cart-list--no-cart -->';
$header .= '                            <div class="header__cart-list">';

$header .= '                               <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>';
$header .= '                                <ul class="header__cart-group">';
$header .= '                                   <!-- Cart items -->';

for ($i = 0; $i < $number; $i++) {
    $header .= '                                  <li class="header__cart-item">';
    $header .= '                                     <img src="' . $saveImage[$i] . '" alt="' . $name[$i] . '" class="header__cart-img">';
    $header .= '                                    <div class="header__cart-item-info">';
    $header .= '                                        <div class="header__cart-item-head">';
    $header .= '                                             <h5 class="header__cart-item-name">'.$name[$i].'</h5>';
    $header .= '                                             <div class="header__cart-price-wrap">';
    $header .= '                                                 <span class="header__cart-item-price">' . $GIA_SP[$i].'đ</span>';
    $header .= '                                                 <span class="header__cart-item-delect">x</span>';
    $header .= '                                                  <span class="header__cart-item-qnt">' .$quantity[$i] .'</span>';
    $header .= '                                             </div>';
    $header .= '                                         </div>';
    $header .= '                                         <div class="header__cart-item-body">';
    $header .= '                                             <span class="header__cart-item-desc">Phân loại hàng: ' .$productline[$i] .'</span>';
    $header .= '                                              <span class="header__cart-item-remove">Xóa</span>';
    $header .= '                                           </div>';
    $header .= '                                       </div>';
    $header .= '                                  </li>';
}

if ($number == 0) {
    $header .= '<img src="../img/nocard.png" alt="No card" class="header__cart-no-cart-img">';
    // $header.= ' <p style="text-align:center; font-size:18px"> chưa chọn sản phẩm nào. </p>';
}

$header .= '                             </ul>';
$header .= '                            <a style="display: flex;font-size: 1.2rem;" class="header__cart-view btn btn--primary" href="../php/cart.php">Xem giỏ hàng</a>';
$header .= '                         </div>';
$header .= '                      </div>';

echo $header;