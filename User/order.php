<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ('../connection.php');

$name = $_SESSION['name'];
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}
// Generate a unique order_id for the entire order
$order_id = uniqid();


$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$address = isset($_POST['new_address']) ? $_POST['new_address'] : (isset($_POST['address']) ? $_POST['address'] : '');
$payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
$total = isset($_POST['total_price']) ? $_POST['total_price'] : 0;
$status = isset($_POST['status']) ? $_POST['status'] : 'not verified';


// Fetch cart items from the database
$sql = "SELECT * FROM cart WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
if (!$stmt->execute()) {
    die("Failed to insert order item: " . $stmt->error);
}
$result = $stmt->get_result();

// Create a new record in the orders table
$sql = "INSERT INTO orders (username, phone, address, payment, total, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt1 = $mysqli->prepare($sql);

if ($stmt1 === false) {
    die('prepare() failed: ' . htmlspecialchars($mysqli->error));
}


$bind_result = $stmt1->bind_param("ssssis", $username, $phone, $address, $payment_method, $total, $status);

if ($bind_result === false) {
    die('bind_param() failed: ' . htmlspecialchars($stmt1->error));
}

$execute_result = $stmt1->execute();

if ($execute_result === false) {
    die('execute() failed: ' . htmlspecialchars($stmt1->error));
}
// Get the last inserted id (the order id)
$order_id = $mysqli->insert_id;

// For each item in the cart, create a new record in the order_items table
while ($row = $result->fetch_assoc()) {
    $sql1 = "INSERT INTO order_items (order_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt2 = $mysqli->prepare($sql1);
    $stmt2->bind_param("iii", $order_id, $row['product_id'], $row['quantity']);
    if (!$stmt2->execute()) {
        die("Failed to insert order item: " . $stmt2->error);
    }
}


// Clear the user's cart
$sql = "DELETE FROM cart WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();


// Fetch cart items from the database again
$sql = "SELECT * FROM cart WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<p>Product ID: {$row['product_id']}, Quantity: {$row['quantity']}</p>";
}

// Prepare the SQL statement
$stmt1 = $mysqli->prepare("SELECT DISTINCT *,  taikhoan.name AS taikhoan_name, orders.status AS order_status, sanpham.name AS sanpham_name
FROM orders 
JOIN order_items ON orders.id = order_items.order_id
JOIN sanpham ON order_items.product_id = sanpham.product_id
JOIN taikhoan ON taikhoan.username = orders.username 
WHERE orders.username = ?
GROUP BY order_items.order_id");

if ($stmt1 === false) {
    die("Failed to prepare statement: " . $mysqli->error);
}

// Bind the username parameter
if (!$stmt1->bind_param("s", $_SESSION['username'])) {
    die("Failed to bind parameters: " . $stmt1->error);
}

// Execute the statement
if (!$stmt1->execute()) {
    die("Failed to execute statement: " . $stmt1->error);
}

// Get the result
$ketqua = $stmt1->get_result();

// Fetch all results as an associative array
$orders = $ketqua->fetch_all(MYSQLI_ASSOC);

$orderStatusTerms = [
    'not verified' => 'Chưa xử lý',
    'verified' => 'Đã xác nhận',
    'delivered' => 'Đã giao',
    'cancelled' => 'Đã hủy',

];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="admin.php">
    <link rel="stylesheet" href="usercss.php">
    <link rel="stylesheet" href="ordercss.php">
    <!-- <script src="main.js"></script> -->
</head>

<body>
    <div class="app">
        <div class="app">
            <header class="header">
                <div class="grid">
                    <nav class="header__navbar">
                        <ul class="header__navbar-list">

                        </ul>

                        <ul class="header__navbar-list">
                            <li class="header__navbar-item">
                                <i class="fa-solid fa-bell"></i>
                                <a href="" class="header__navbar-item-link">Thông báo</a>
                            </li>

                            <li class="header__navbar-item">
                                <a href="./user-info.php" class="user-header__profile-img-name"
                                    style="text-decoration: none;">
                                    <img src="./Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png"
                                        alt="" class="user-header__profile-img">
                                    <span class="user-header__profile-name"><?php echo $name ?></span>
                                </a>
                            </li>
                            <li class="header__navbar-item">
                                <a href="./index.php" class="header__navbar-item-link">Đăng xuất</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Header with search -->
                    <div class="header-with-search">
                        <a href="user.php" class="header__logo">
                            <img src="./Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                        </a>

                        <form name="search" action="user.php" method="GET" class="header__search">
                        <input class="header__search-input" type="text" id="inputField" name="product_name"
                            placeholder="Nhập để tìm kiếm sản phẩm"
                            value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
                        <div class="header__search-btn">
                            <button type="submit" class="header__search-btn-icon fa-solid fa-magnifying-glass"></button>
                        </div>
                    </form>

                        <div class="header__cart">
                            <a href="./cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="app__container">
                <div class="grid">
                    <div class="grid__row app__content">
                        <div class="grid__column-2">
                            <nav class="category">
                                <h3 class="category__heading">
                                    <i class="category__heading-icon fas fa-list"></i>
                                    Danh mục
                                </h3>

                                <ul class="category-list">
                                    <li class="category-item">
                                        <a href="./user-info.php" class="category-item__link">Tài khoản của tôi</a>
                                    </li>
                                    <li class="category-item">
                                        <a href="./cart.php" class="category-item__link">Giỏ hàng</a>
                                    </li>
                                    <li class="category-item category-item__active">
                                        <a href="./order.php" class="category-item__link">Lịch sử đơn hàng</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div class="grid__column-102">
                            <div class="order-grid__row">
                                <div class="ordered-order">
                                    <?php foreach ($orders as $order): ?>
                                        <div class="ordered-order__transfer-info">
                                            <span
                                                class="order__confirm"><?php echo $orderStatusTerms[$order['order_status']] ?></span>
                                        </div>
                                        <div class="ordered-order__detailed-info">
                                            <a href="orderdetail.php?order_id=<?php echo $order['order_id'] ?>"
                                                class="ordered-order__img">
                                                <img src="cart.jpeg" alt="" class="order__img-css">
                                            </a>
                                            <div class="ordered-order__info">
                                                <div class="info-title"><?php echo $order['sanpham_name'] ?></div>

                                            </div>
                                            <div class="product-price">

                                            </div>
                                        </div>
                                        <div class="ordered-order__price">

                                        </div>
                                    <?php endforeach; ?>
                                </div>

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