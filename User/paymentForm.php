<?php
session_start();
include_once ('../connection.php');

$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}

// Fetch the user's cart items
$sql = "SELECT * FROM cart 
INNER JOIN sanpham ON cart.product_id = sanpham.product_id 
WHERE username = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$total_price = 0;

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total_price += $row['price'] * $row['quantity'];
}

// Fetch the user's existing addresses
$sql1 = "SELECT address FROM taikhoan WHERE username = ?";
$stmt1 = $mysqli->prepare($sql1);
$stmt1->bind_param("s", $_SESSION['username']);
$stmt1->execute();
$result1 = $stmt1->get_result();

$addresses = [];
while ($row = $result1->fetch_assoc()) {
    $addresses[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="./main_detailed_page.php">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="usercss.php">
    <link rel="stylesheet" href="ordercss.php">
    <link rel="stylesheet" href="cartcss.php">
    <link rel="stylesheet" href="paymentFormcss.php">
    <!-- <script src="main.js"></script> -->
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <!-- <li class="header__navbar-item">
                            Hotline: 091.901.3030
                        </li>
                        <li class="header__navbar-item">
                            Ghé fanpage
                            <a href="" class="header__navbar-icon-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>  
                        </li> -->
                    </ul>

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <i class="fa-solid fa-bell"></i>
                            <a href="" class="header__navbar-item-link">Thông báo</a>
                        </li>

                        <li class="header__navbar-item">
                            <a href="./user-info.php" class="user-header__profile-img-name"
                                style="text-decoration: none;">
                                <img src="./Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png" alt=""
                                    class="user-header__profile-img">
                                <span class="user-header__profile-name"><?php echo $_SESSION['name'] ?></span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="./index.php" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <img src="./Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </div>

                    <div class="header__search">
                        <input type="text" id="inputField" class="header__search-input"
                            placeholder="Nhập để tìm kiếm sản phẩm">
                        <div class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>

                    <div class="header__cart">
                        <a href="./cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="progress-bar">
                    <div class="progress-bar__main-content">
                        <a class="main-content__item" href="./index.php"><b>Sản phẩm hot</b></a>
                        <a class="main-content__item" href="./user-info.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Thông tin người dùng</b>
                        </a>
                        <a class="main-content__item" href="./cart.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Giỏ hàng</b>
                        </a>
                        <a class="main-content__item" href="./paymentForm.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Đơn thanh toán</b>
                        </a>
                    </div>
                </div>
                <div class="cart-title">
                    <h2>Thanh toán</h2>
                </div>
                <div class="row">
                    <div class="col-75">
                        <div class="container">

                            <div class="row">
                                <div class="col-50">
                                    <form action="process_payment.php" method="post">
                                        <label for="fname" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-user"></i> <b>Họ tên</b></label>
                                        <input type="text" id="fname" name="firstname" style="font-size: 1.5rem;"
                                            placeholder="John M. Doe">
                                        <label for="adr" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-address-card-o"></i> Địa chỉ</label>
                                        <?php foreach ($addresses as $address): ?>
                                            <input type="radio" id="adr" name="address"
                                                value="<?php echo $address['address']; ?>" style="font-size: 1.5rem;">
                                            <label for="adr"><?php echo $address['address']; ?></label><br>
                                        <?php endforeach; ?>
                                        <input type="radio" id="new_adr" name="address" value="new"
                                            style="font-size: 1.5rem;">
                                        <label for="new_adr">Địa chỉ mới</label><br>
                                        <input type="text" id="new_address" name="new_address"
                                            style="font-size: 1.5rem;">
                                        <label for="new_adr" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-address-card-o"></i> Địa chỉ mới</label>
                                        <input type="text" id="new_adr" name="new_address" style="font-size: 1.5rem;">

                                        <!-- Phuong thuc thanh toan -->
                                        <label for="email" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" name="email" style="font-size: 1.5rem;"
                                            placeholder="john@example.com">

                                </div>
                            </div>

                            <div class="cart-content">
                                <div class="cart__item-head">
                                    <div class="cart__product-info">
                                        <b>Sản phẩm</b>
                                    </div>
                                    <div class="cart__product-price">
                                        <b>Đơn giá</b>
                                    </div>
                                    <div class="cart__product-numbers">
                                        <b>Số lượng</b>
                                    </div>
                                    <div class="cart__product-subtotal">
                                        <b>Thành tiền</b>
                                    </div>
                                    <div class="cart__product-remove">

                                    </div>
                                </div>
                                <?php
                                // When displaying the cart
                                $sql = "SELECT * FROM cart INNER JOIN sanpham ON cart.product_id = sanpham.product_id WHERE username = ?";
                                $stmt = $mysqli->prepare($sql);
                                $stmt->bind_param("s", $username);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($row = $result->fetch_assoc()) {
                                    // Display the product details
                                    ?>
                                    <div class="cart__list-product">
                                        <div class="cart__product-info">
                                            <a class="cart__product-img">
                                                <img src="<?php echo $row['image_url']; ?>" alt="" class="cart__img-css">
                                            </a>

                                            <span class="cart__product-text"><?php echo $row['name']; ?></span>
                                        </div>
                                        <div class="cart__product-price">
                                            <?php echo number_format($row['price'], 0, ',', '.'); ?>
                                        </div>
                                        <div class="cart__product-numbers">
                                            <span <?php echo $row['product_id']; ?>><?php echo $row['quantity']; ?>
                                            </span>
                                        </div>


                                        <div class="cart__product-subtotal">
                                            <?php echo number_format($row['price'] * $row['quantity'], 0, ',', '.'); ?>
                                            đ
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="payment-subtotal">
                                <table>
                                    <tr>
                                        <td class="title-info">
                                            <p>Tổng thành tiền: :
                                                <?php echo number_format(($total_price), 0, ',', '.'); ?> đ
                                            </p>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                        </div>

                        <button type="submit" onclick="paymentButton()" value="Submit" class="btn">Đặt hàng</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once ('layout/footer.php'); ?>
    </div>
    <!-- <script src="main.js"></script> -->
</body>

</html>