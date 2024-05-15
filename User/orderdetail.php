<?php
session_start();
$username = $_SESSION['username'];
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}

include_once ('layout/head.php');
include_once ('../connection.php');

// Check if order_id is set
if (!isset($_GET['order_id'])) {
    die("Order ID not provided");
}

$order_id = $_GET['order_id'];

// Prepare the SQL statement
$stmt = $mysqli->prepare("SELECT *
FROM orders 
JOIN order_items ON orders.id = order_items.order_id 
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

// Check if the query returned any results
if ($result->num_rows === 0) {
    die("No orders found with the provided ID");
}

// Fetch all results as an associative array
$orders = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="main_detailed_page.php">
    <link rel="stylesheet" href="admin.php">
    <link rel="stylesheet" href="usercss.php">
    <link rel="stylesheet" href="ordercss.php">
    <link rel="stylesheet" href="cartcss.php">
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
                            <a href="user-info.php" class="user-header__profile-img-name"
                                style="text-decoration: none;">
                                <img src="Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png" alt=""
                                    class="user-header__profile-img">
                                <span class="user-header__profile-name"><?php echo $_SESSION['name'] ?></span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="Sign-out.php" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <a href="user.php" class="header__logo">
                        <img src="Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </a>

                    <div class="header__search">
                        <input type="text" id="inputField" class="header__search-input"
                            placeholder="Nhập để tìm kiếm sản phẩm">
                        <div class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>

                    <div class="header__cart">
                        <a href="cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class="main-content__item" href="user.php"><b>Trang chủ</b></a>
                            <a class="main-content__item" href="order.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Các hóa đơn</b>
                            </a>
                            <a class="main-content__item" href="orderdetail.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Hóa đơn</b>
                            </a>
                        </div>
                    </div>
                    <div class="cart-title">
                        <h2>Hóa đơn</h2>
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
                                    <?php
                                    $total_price = 0; // Initialize total price
                                    foreach ($orders as $order):
                                        $subtotal = $order['price'] * $order['quantity'];
                                        $total_price += $subtotal; // Add subtotal to total price
                                        ?>
                                        <div class="cart__product-info1">
                                            <a class="cart__product-img">
                                                <img src="<?php echo $order['image_url']; ?>" alt="" class="cart__img-css">
                                            </a>
                                            <span class="cart__product-text"><?php echo $order['name']; ?></span>
                                        </div>
                                        <div class="cart__product-price">
                                            <?php echo number_format($order['price'], 0, ',', '.'); ?> đ
                                        </div>
                                        <div class="cart__product-numbers">
                                            <div class="number-products__btn">
                                                <span id="totalClicks_<?php echo $order['product_id']; ?>"
                                                    class=""><?php echo $order['quantity']; ?></span>
                                            </div>
                                        </div>
                                        <div class="cart__product-subtotal">
                                            <?php echo number_format($order['price'] * $order['quantity'], 0, ',', '.'); ?>
                                            đ
                                        </div>
                                        <div class="cart__product-remove">

                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="cart-grid__column-4" style="background-color: #F5F5F5;">
                        <div class="cart__totals">
                            <div class="cart__totals-title">
                                <h2>Cộng hóa đơn</h2>
                            </div>
                            <div class="cart__totals-details">
                                <div class="totals-details">
                                    <div class="text__price-currency">Tổng tiền</div>
                                    <div class="subtotal__price-currency">
                                        <b><?php echo number_format(($total_price), 0, ',', '.'); ?>
                                            đ</b>
                                    </div>
                                </div>
                            </div>
                            <div class="cart__btn-payment">
                                <a href="paymentForm.php">

                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <?php include_once ('layout/footer.php'); ?>
    </div>
</body>

</html>