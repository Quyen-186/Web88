<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="./main_detailed_page.php">
    <link rel="stylesheet" href="admin.php">
    <link rel="stylesheet" href="usercss.php">
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
                <div class="grid__row app__content">
                    <div class="grid__column-2">
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-list"></i>
                                Danh mục
                            </h3>
    
                            <ul class="category-list">
                                <li class="category-item category-item__active">
                                    <a href="./user.php" class="category-item__link">Trang chủ</a>
                                </li>
                                <li class="category-item">
                                    <a href="./userMilk.php" class="category-item__link">Sữa tăng cân</a>
                                </li>
                                <li class="category-item">
                                    <a href="./userWhey.php" class="category-item__link">Whey Protein</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <div class="home-filter">
                            <span class="home-filter__label">Tìm kiếm nâng cao</span>
                            <select class = "home-filter__btn btn">
                                <option value="Sữa tăng cân">Sữa tăng cân</option>
                                <option value="Whey Protein">Whey Protein</option>
                                <option value="Sữa tăng cân"></option>
                            </select>

                            <select class = "home-filter__btn btn">
                                <option value="">Giá: thấp đến cao</option>
                                <option value="">Giá: cao đến thấp</option>
                            </select>

                            <a href="./userWhey.php">
                                <button class="home-filter__btn btn" style="background-color: orange;">Tìm</button>
                            </a>

                            <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <span class="home-filter__page-current">2</span>/2
                                </span>

                                <div class="home-filter__page-control">
                                    <a href="./user.php" class="home-filter__page-btn">
                                        <i class="home-filter__page-icon fa-solid fa-angle-left"></i>
                                    </a>
                                    <a href="./userPage2.php" class="home-filter__page-btn home-filter__page-btn--disabled">
                                        <i class="home-filter__page-icon fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="home-product">
                            <div class="grid__row">
                                <div class="grid__column-2-4">
                                    <a class="home-product-item" href="./detailed_page.php">
                                        <div class="home-product-item__img">
                                            <img src="./Ảnh sản phẩm whey protein bán chạy/upl_mutant_iso_surge_5lbs_2_27kg_1677568496_image_1677568496.jpg" alt="" class="home-product-item__img">
                                            <h4 class="home-product-item__name">
                                                Mutant Iso Surge 5lbs 2.27kg   
                                            </h4>
                                            <div class="home-product-item__price">
                                                <span class="home-product-item__price-current"><b>1.500.000đ</b></span>
                                            </div>
                                        </div>
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

</body>
</html>