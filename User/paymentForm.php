<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="./main_detailed_page.php">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="cart.css"> 
    <link rel="stylesheet" href="paymentForm.css">   
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
                                <span class="user-header__profile-name">Adu Ăng Minh</span>
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
                        <a class = "main-content__item" href="./index.php"><b>Trang chủ</b></a>
                        <a class = "main-content__item" href="./user-info.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Thông tin người dùng</b>
                        </a>
                        <a class = "main-content__item" href="./cart.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Giỏ hàng</b>
                        </a>
                        <a class = "main-content__item" href="./paymentForm.php">
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
                            <form action="">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="fname" style="font-size: 1.5rem;"><i class="icon-payment fa fa-user"></i> <b>Họ tên</b></label>
                                        <input type="text" id="fname" name="firstname" style="font-size: 1.5rem;" placeholder="John M. Doe">
                                        <label for="email" style="font-size: 1.5rem;"><i class="icon-payment fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" name="email" style="font-size: 1.5rem;" placeholder="john@example.com">
                                        <label for="adr" style="font-size: 1.5rem;"><i class="icon-payment fa fa-address-card-o"></i> Địa chỉ</label>
                                        <input type="text" id="adr" name="address" style="font-size: 1.5rem;" placeholder="542 W. 15th Street">
                                        <label for="city" style="font-size: 1.5rem;"><i class="icon-payment fa fa-institution"></i> Thành phố</label>
                                        <input type="text" id="city" name="city" style="font-size: 1.5rem;" placeholder="New York">
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
                                    <div class="payment__list-product">
                                        <div class="cart__product-info">
                                            <a class="cart__product-img">
                                                <img src="./Ảnh sản phẩm hot nhất/upl_mass_fusion_12lbs_5_4kg_1685693088_image_1685693088.jpg" alt="" class="cart__img-css">
                                            </a>
                                            <span class="cart__product-text">Up your mass xxxl 1350 220pl</span>
                                        </div>
                                        <div class="cart__product-price">
                                            1.600.000 đ
                                        </div>
                                        <div class="cart__product-numbers" style="text-align: center;">
                                            1
                                        </div>
                                        <div class="cart__product-subtotal">
                                            1.600.000 đ
                                        </div>
                                    </div>

                                    <div class="payment-subtotal">
                                        <table>
                                            <tr>
                                                <td class="title-info">
                                                    Tổng tiền hàng
                                                </td>
                                                <td class="detailed-info">3.750.000 đ</td>
                                            </tr>
                                            <tr>
                                                <td class="title-info">
                                                    Phí vận chuyển	
                                                </td>
                                                <td class="detailed-info">20.700 đ</td>
                                            </tr>
                                            <tr>
                                                <td class="title-info">
                                                    Tổng thanh toán
                                                </td>
                                                <td class="detailed-info"><b>3.770.700 đ</b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            <button onclick="paymentButton()" class="btn">Đặt hàng</button>
                            </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>

        <?php include_once('layout/footer.php'); ?>
    </div>
    <!-- <script src="main.js"></script> -->
</body>
</html>