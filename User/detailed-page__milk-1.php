<?php
session_start();
// Include the database connection file
include_once ("../connection.php");
include_once ("layout/head.php");

// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}

// Initialize productInfo array to avoid potential undefined variable errors
$productInfo = [];

// Check if product_id is set in the URL
if (isset($_GET['product_id'])) {
    // Get the product_id from the URL

    $productId = $_GET['product_id'];

    // Check if product_id is not empty and is a valid integer
    if (!empty($productId) && is_numeric($productId)) {

        // Sanitize input to prevent SQL injection
        $productId = intval($productId);

        // Prepare SQL statement to select product information based on product_id
        $stmt = $mysqli->prepare("SELECT * FROM sanpham WHERE product_id = ?");
        // Bind product_id parameter
        $stmt->bind_param("i", $productId);

        // Execute the prepared statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        // Check if there are rows in the result set
        if ($result->num_rows > 0) {
            // Fetch product information as an associative array
            $row = $result->fetch_assoc();

            // Store product information in an associative array
            $productInfo = [
                'id' => $row['product_id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => $row['stock_quantity'],
                'image' => $row['image_url'],
                'description' => $row['description']

            ];

        } else {
            // Product not found, you might want to handle this case
            echo ("Product not found!"); // Redirect to an error page or handle it accordingly
            exit(); // Stop further execution
        }
    } else {
        // Invalid product ID provided in the URL, handle this case as needed
        echo ("Invalid product ID!"); // Redirect to an error page or handle it accordingly
        exit(); // Stop further execution
    }
} else {
    // No product ID provided in the URL, handle this case as needed
    echo ("No product ID provided!"); // Redirect to an error page or handle it accordingly
    exit(); // Stop further execution
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="main_detailed_page.php">
    <link rel="stylesheet" href="admin.php">
    <link rel="stylesheet" href="usercss.php">
</head>

<body>
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
                                <img src="./Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png" alt=""
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
                        <img src="./Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
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

        <div class="app__container-order">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class="main-content__item" href="user.php"><b>Trang chủ</b></a>
                            <a class="main-content__item" href="detailed-page__milk-1.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b><?php echo $productInfo['name'] ?></b>
                            </a>
                        </div>
                    </div>
                    <div class="grid__column-5">
                        <img src="<?php echo $productInfo['image'] ?>" class="item-image">
                    </div>
                    <div class="grid__column-7">
                        <div class="order">
                            <div class="order__item-name">
                                <h1> <?php echo $productInfo['name']; ?></h1>
                            </div>

                            <div class="order__item-price">
                                <label>Giá: </label><b><?php echo number_format($productInfo['price'], 0, ',', '.') . "đ"?></b>
                            </div>

                            <div class="order__number-products">
                                <div class="number-products__text">Số lượng: <?php echo $productInfo['quantity'] ?>
                                </div>
                                <div class="number-products__btn">
                                    <button onclick="totalClick(-1)" class="btn__choose minus">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <button id="totalClicks" class="btn__choose num">1</button>
                                    <button onclick="totalClick(1)" class="btn__choose plus">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <form method="POST" action="cart.php">
                                <div class="order__order-buy">
                                    <input type="hidden" name="product_id" value="<?php echo $productId ?>">
                                    <button name="addtocart" class="btn__choose order-buy__btn-addToCast">
                                        <i class="fa-solid fa-cart-shopping cart-shopping__css"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                    <button name="purchase" class="btn__choose order-buy__btn-buy">Mua hàng</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="app__container-info-describtion">
                        <div class="info-product">
                            <div class="info-product__title">
                                <h2>Thông tin sản phẩm</h2>
                                <?php echo $productInfo['description'] ?>
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