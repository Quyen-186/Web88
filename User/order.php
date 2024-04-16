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

                    <div class="grid__column-10">
                        <div class="order-grid__row">
                            <div class="ordered-order">
                                <div class="ordered-order__transfer-info">
                                    <span class="order__transfer-info">
                                        Đơn hàng đã được giao thành công
                                        <i class="fa-regular fa-circle-question"></i>
                                    </span>
                                    <span class="order__confirm">HOÀN THÀNH</span>
                                </div>
                                <div class="ordered-order__detailed-info">
                                    <div class="ordered-order__img">
                                        <img src="./Ảnh sản phẩm sữa tăng cân bán chạy/upl_mass_tech_2000_22lbs_10kg_1677569000_image_1677569000.jpg" alt="" class="order__img-css">
                                    </div>
                                    <div class="ordered-order__info">
                                        <div class="info-title">Mass Tech 2000 22lbs 10kg</div>    
                                        <div class="info-numbers">x2</div>                            
                                    </div>
                                    <div class="product-price">
                                        1.500.000 đ
                                    </div>
                                </div>
                                <div class="ordered-order__price">
                                    Thành tiền: 1.540.000 đ
                                </div>
                            </div>

                            <div class="ordered-order">
                                <div class="ordered-order__transfer-info">
                                    <span class="order__transfer-info">
                                        Đơn hàng đã được giao thành công
                                        <i class="fa-regular fa-circle-question"></i>
                                    </span>
                                    <span class="order__confirm">HOÀN THÀNH</span>
                                </div>
                                <div class="ordered-order__detailed-info">
                                    <div class="ordered-order__img">
                                        <img src="./Ảnh sản phẩm sữa tăng cân bán chạy/upl_elitelab_mass_muscle_gainer_20lbs_1682398641_image_1682398641.jpg" alt="" class="order__img-css">
                                    </div>
                                    <div class="ordered-order__info">
                                        <div class="info-title">Mass Tech 2000 22lbs 10kg</div>    
                                        <div class="info-numbers">x2</div>                            
                                    </div>
                                    <div class="product-price">
                                        1.500.000 đ
                                    </div>
                                </div>
                                <div class="ordered-order__price">
                                    Thành tiền: 1.540.000 đ
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