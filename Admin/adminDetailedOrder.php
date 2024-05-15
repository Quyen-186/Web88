<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: ../User/Sign-in.php");
    exit();
}
include_once ('../User/layout/head.php');
include_once ('../connection.php');

$order_id = $_GET['order_id'];

// Prepare the SQL statement
$stmt = $mysqli->prepare("SELECT *,  taikhoan.name AS taikhoan_name, sanpham.name AS sanpham_name
FROM orders 
JOIN order_items ON orders.id = order_items.order_id 
JOIN taikhoan ON taikhoan.username = orders.username 
JOIN sanpham ON order_items.product_id = sanpham.product_id
WHERE orders.id = ?");

if ($stmt === false) {
    die("Failed to prepare statement: " . $mysqli->error);
}

// Bind the order_id parameter
if (!$stmt->bind_param("i", $order_id)) {
    die("Failed to bind parameters: " . $stmt->error);
}

// Execute the statement
if (!$stmt->execute()) {
    die("Failed to execute statement: " . $stmt->error);
}

// Get the result
$result = $stmt->get_result();

// Fetch all results as an associative array
$orders = $result->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - XEM CHI TIẾT ĐƠN HÀNG
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="main_detailed_pagecss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="cartcss.php">
    <link rel="stylesheet" href="adminUserManagementcss.php">
    <link rel="stylesheet" href="adminOrderManagementcss.php">
    <style>
        .order__info-user {
            margin: 30px 0 0 35px;
        }

        .order__table-info {
            padding: 0;
            border: 0;
            margin: 0;
        }

        td {
            border: 0;
        }
    </style>
</head>

<body>
    <div class="app">
        <header class="admin-header">
            <div class="grid">
                <nav class="admin-header__navbar">
                    <div class="admin-header__navbar-list-left">
                        <div class="admin-header__navbar-item">
                            <img src="./Ảnh logo/logo_image_1587131466.png" alt="" class="admin-header__logo-img">
                        </div>
                    </div>

                    <ul class="header__navbar-list admin-header__navbar-list-right">
                        <li class="header__navbar-item">
                            <i class="fa-solid fa-bell admin-header__icon"></i>
                        </li>
                        <li class="header__navbar-item">
                            <i class="fa-brands fa-facebook-messenger admin-header__icon"></i>
                        </li>
                        <li class="header__navbar-item ">
                            <img src="./Ảnh web admin/387123461_1563644207508135_2222331430281718689_n.jpg" alt=""
                                class="admin-header__img">
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">

                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class="main-content__item" href="./admin.php"><b>Sản phẩm hot</b></a>
                            <a class="main-content__item" href="./adminOrderManagement.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Quản lý đơn hàng</b>
                            </a>
                            <a class="main-content__item" href="./adminDetailedOrder.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Xem chi tiết đơn hàng</b>
                            </a>
                        </div>
                    </div>
                    <div class="cart-title">
                        <h2>Đơn hàng</h2>
                    </div>
                    <div class="order__info-user">
                        <table class="order__table-info">
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td class="title-info">
                                        Họ Tên
                                    </td>
                                    <td class="detailed-info"><?php echo $order['taikhoan_name'] ?></td>
                                </tr>
                                <tr>
                                    <td class="title-info">
                                        Mã đơn hàng
                                    </td>
                                    <td class="detailed-info"><?php echo $order['order_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="title-info">
                                        Địa chỉ giao hàng
                                    </td>
                                    <td class="detailed-info"><?php echo $order['address'] ?></td>
                                </tr>
                                <tr>
                                    <td class="title-info">
                                        Email
                                    </td>
                                    <td class="detailed-info"><?php echo $order['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="title-info">
                                        Số điện thoại
                                    </td>
                                    <td class="detailed-info"><?php echo $order['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td class="title-info">
                                        Ngày giao hàng dự kiến
                                    </td>
                                    <td class="detailed-info">04-03-2024</td>
                                </tr>
                                <?php break; ?>
                            <?php endforeach; ?>
                        </table>
                    </div>

                    <div class="cart__main-content">

                        <div class="cart-grid__column-8">
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
                                <div class="cart__list-product">
                                    <?php foreach ($orders as $order): ?>
                                        <div class="cart__product-info">
                                            <a class="cart__product-img">
                                                <img src="<?php echo $order['image_url'] ?>" alt="" class="cart__img-css">
                                            </a>
                                            <span class="cart__product-text"><?php echo $order['sanpham_name'] ?></span>
                                        </div>
                                        <div class="cart__product-price">
                                            <?php echo number_format($order['price'], 0, ',', '.') . "đ"; ?>
                                        </div>
                                        <div class="cart__product-numbers" style="text-align: center;">
                                            <?php echo $order['quantity'] ?>
                                        </div>
                                        <div class="cart__product-subtotal">
                                            <?php echo number_format($order['price'] * $order['quantity'], 0, ',', '.') . "đ"; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>

                        <div class="cart-grid__column-4" style="background-color: #F5F5F5;">
                            <div class="cart__totals">
                                <div class="cart__totals-title">
                                    <h2>Tổng đơn hàng</h2>
                                </div>
                                <div class="cart__totals-details">
                                    <div class="totals-details">
                                        <div class="text__price-currency">Tổng tiền</div>
                                        <div class="subtotal__price-currency">
                                            <b><?php echo number_format($order['total'], 0, ',', '.') . "đ"; ?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- <script src="main.js"></script> -->
</body>

</html>