<?php
session_start();
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}

    include_once ('layout/head.php');
    include_once ('../connection.php');
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
                                <span class="user-header__profile-name">Adu Ăng Minh</span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="index.php" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <img src="Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </div>

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
                <div class="grid__row1 app__content">
                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class = "main-content__item" href="user.php"><b>Sản phẩm hot</b></a>
                            <a class = "main-content__item" href="user-info.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Thông tin người dùng</b>
                            </a>
                            <a class = "main-content__item" href="cart.php">
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
                                    <div class="cart__product-info">
                                        <a class="cart__product-img">
                                            <img src="Ảnh sản phẩm hot nhất/upl_mass_fusion_12lbs_5_4kg_1685693088_image_1685693088.jpg" alt="" class="cart__img-css">
                                        </a>
                                        <span class="cart__product-text">Up your mass xxxl 1350 220pl</span>
                                    </div>
                                    <div class="cart__product-price">
                                        1.600.000 đ
                                    </div>
                                    <div class="cart__product-numbers">
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
                                    <div class="cart__product-subtotal">
                                        1.600.000 đ
                                    </div>
                                    <div class="cart__product-remove">
                                        <i class="fa-solid fa-trash cart__remove-icon"></i>
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
                                        <div class= "text__price-currency">Tạm tính</div>
                                        <div class="subtotal__price-currency">
                                            <b>3.200.000 đ</b>
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
        </div>

        <?php include_once ('layout/footer.php'); ?>
    </div>
    <!-- <script src="main.js"></script> -->
</body>
</html>