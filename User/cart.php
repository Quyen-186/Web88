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

if (isset($_POST['product_id'])) {
    // Get the product id from the form
    $product_id = $_POST['product_id'];


    // Check if the product is already in the cart

    $sql = "SELECT * FROM cart WHERE username = ? AND product_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $username, $product_id);

    $stmt->execute();
    $result = $stmt->get_result();



    if ($result->num_rows > 0) {
        // If the product is already in the cart, update the quantity
        $sql = "UPDATE cart SET quantity = quantity + 1 WHERE username = ? AND product_id = ?";

    } else {
        // If the product is not in the cart, add it
        $sql = "INSERT INTO cart (username, product_id, quantity) VALUES (?, ?, 1)";

    }


    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $username, $product_id);
    $stmt->execute();

    // Check which button was clicked
    if (isset($_POST['addtocart'])) {
        // Handle add to cart action
        // You've already added the product to the cart, so you might want to redirect the user back to the product page
        header("Location: detailed-page__milk-1.php?product_id=$product_id");
        exit();
    } elseif (isset($_POST['purchase'])) {
        // Handle purchase action
        // Redirect the user to the checkout page
        header("Location: paymentForm.php?product_id=$product_id");
        exit();
    }
}
if (isset($_POST['increase'])) {
    $product_id = $_POST['increase'];
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE username = ? AND product_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $username, $product_id);
    $stmt->execute();
} elseif (isset($_POST['remove'])) {
    $product_id = $_POST['remove'];
    $sql = "DELETE FROM cart WHERE username = ? AND product_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $username, $product_id);
    $stmt->execute();

} elseif (isset($_POST['decrease'])) {
    $product_id = $_POST['decrease'];
    $sql = "UPDATE cart SET quantity = GREATEST(quantity - 1, 1) WHERE username = ? AND product_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $username, $product_id);
    $stmt->execute();
}

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
                            <a class="main-content__item" href="user.php"><b>Sản phẩm hot</b></a>
                            <a class="main-content__item" href="user-info.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Thông tin người dùng</b>
                            </a>
                            <a class="main-content__item" href="cart.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Giỏ hàng</b>
                            </a>
                        </div>
                    </div>
                    <div class="cart-title">
                        <h2>Giỏ hàng</h2>
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
                                    // When displaying the cart
                                    $sql = "SELECT * FROM cart INNER JOIN sanpham ON cart.product_id = sanpham.product_id WHERE username = ?";
                                    $stmt = $mysqli->prepare($sql);
                                    $stmt->bind_param("s", $username);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    while ($row = $result->fetch_assoc()) {
                                        $total_price += $row['price'] * $row['quantity'];
                                        // Display the product details
                                        ?>
                                        <form class="cart__list-product" method="post" action="cart.php">
                                            <div class="cart__product-info">
                                                <a class="cart__product-img">
                                                    <img src="<?php echo $row['image_url']; ?>" alt=""
                                                        class="cart__img-css">
                                                </a>
                                                <span class="cart__product-text"><?php echo $row['name']; ?></span>
                                            </div>
                                            <div class="cart__product-price">
                                                <?php echo number_format($row['price'], 0, ',', '.'); ?> đ
                                            </div>
                                            <div class="cart__product-numbers">
                                                <div class="number-products__btn">
                                                    <button name="decrease" value="<?php echo $row['product_id']; ?>"
                                                        class="btn__choose minus">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    <span id="totalClicks_<?php echo $row['product_id']; ?>"
                                                        class="btn__choose num"><?php echo $row['quantity']; ?></span>
                                                    <button name="increase" value="<?php echo $row['product_id']; ?>"
                                                        class="btn__choose plus">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="cart__product-subtotal">
                                                <?php echo number_format($row['price'] * $row['quantity'], 0, ',', '.'); ?>
                                                đ
                                            </div>
                                            <div class="cart__product-remove">
                                                <button name="remove" value="<?php echo $row['product_id']; ?>"
                                                    class="btn__choose remove">
                                                    <i class="fa-solid fa-trash cart__remove-icon"></i>
                                                </button>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="cart-grid__column-4" style="background-color: #F5F5F5;">
                        <div class="cart__totals">
                            <div class="cart__totals-title">
                                <h2>Cộng giỏ hàng</h2>
                            </div>
                            <div class="cart__totals-details">
                                <div class="totals-details">
                                    <div class="text__price-currency">Tạm tính</div>
                                    <div class="subtotal__price-currency">
                                        <b><?php echo number_format(($total_price), 0, ',', '.'); ?>
                                            đ</b>
                                    </div>
                                </div>
                            </div>
                            <div class="cart__btn-payment">
                                <a href="paymentForm.php">
                                    <button class="button">
                                        Tiến hành thanh toán
                                    </button>
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