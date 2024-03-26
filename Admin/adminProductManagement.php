<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - QUẢN LÝ SẢN PHẨM
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="adminProductManagement.css">
    <link rel="stylesheet" href="adminUserManagement.css">
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
                            <img src="./Ảnh web admin/387123461_1563644207508135_2222331430281718689_n.jpg" alt="" class="admin-header__img">
                        </li>
                    </ul>
                </nav>    
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
                                    <a href="./admin.php" class="category-item__link">TRANG CHỦ</a>
                                </li>
                                <li class="category-item">
                                    <a href="./adminUserManagement.php" class="category-item__link">QUẢN LÝ <br> NGƯỜI DÙNG</a>
                                </li>
                                <li class="category-item category-item__active">
                                    <a href="./adminProductManagement.php" class="category-item__link">QUẢN LÝ <br> SẢN PHẨM</a>
                                </li>
                                <li class="category-item">
                                    <a href="./adminOrderManagement.php" class="category-item__link">QUẢN LÝ ĐƠN HÀNG</a>
                                </li>
                                <li class="category-item">
                                    <a href="adminStatistics.php" class="category-item__link">THỐNG KÊ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-10">
                        <div class="home-filter">
                            <!-- <span class="home-filter__label">Sắp xếp theo</span> -->
                            <a href="">
                                <button class = "home-filter__btn btn">
                                    Sữa tăng cân
                                </button>
                            </a>
                            <a href="">
                                <button class = "home-filter__btn btn">
                                    Whey Protein
                                </button>
                            </a>
                            <a href="">
                                <button class = "home-filter__btn btn">
                                    Vitamin, khoáng chất
                                </button>
                            </a>
                            <a href="">
                                <button class = "home-filter__btn btn">
                                    Giảm mỡ
                                </button>
                            </a>

                            <div class="select-input">
                                <span class="select-input__label">Giá</span>  
                                <i class="fas fa-angle-down select-input__icon"></i> 
                                <ul class="select-input__list">
                                    <li class="select-input__item">
                                        <a href="" class="select-input__link">Giá: thấp đến cao</a>
                                        <a href="" class="select-input__link">Giá: cao đến thấp</a>
                                    </li>
                                </ul>  
                            </div>

                            <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <span class="home-filter__page-current">1</span>/2
                                </span>

                                <div class="home-filter__page-control">
                                    <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                                        <i class="home-filter__page-icon fa-solid fa-angle-left"></i>
                                    </a>
                                    <a href="" class="home-filter__page-btn">
                                        <i class="home-filter__page-icon fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="add-product">
                            <a href="./adminAddProductForm.php" class="add-product__link">
                                <div class="add-product__icon">
                                    <i class="add-product__plus fa-solid fa-plus"></i>
                                </div>
                                <span class="add-product__text">Thêm sản phẩm</span>
                            </a>
                        </div>

                        <div class="home-product">
                            <div class="grid__row">
                                <div class="grid__column-2-4">
                                    <a class="home-product-item" href="">
                                        <div class="home-product-item__img">
                                            <img src="./Ảnh sản phẩm hot nhất/upl_up_your_mass_xxxl_1350_12lbs_1677559574_image_1677559574.jpg" alt="" class="home-product-item__img">
                                            <h4 class="home-product-item__name">
                                                Up Your Mass XXXL 1350
                                            </h4>
                                            <div class="home-product-item__price pro-manage__function">
                                                <span class="home-product-item__price-current"><b>1.500.000đ</b></span>
                                                <div style="margin-left: auto;">
                                                    <a href="./adminFixProductForm.php">
                                                        <i class="pro-manage__function-icon fa-solid fa-wrench"></i>
                                                    </a>
                                                    <button onclick="alert('Bạn có muốn xóa sản phẩm này không ?')" class="admin-usermanage__btn">
                                                        <i class="pro-manage__function-icon fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>  
                                <div class="grid__column-2-4">
                                    <a class="home-product-item" href="">
                                        <div class="home-product-item__img">
                                            <img src="./Ảnh sản phẩm hot nhất/upl_labrada_muscle_mass_gainer_12lbs_5_4kg_1677833020_image_1677833020.jpg" alt="" class="home-product-item__img">
                                            <h4 class="home-product-item__name">
                                                Labrada Muscle Mass Gainer 12lbs 5.4Kg     
                                            </h4>
                                            <div class="home-product-item__price pro-manage__function">
                                                <span class="home-product-item__price-current"><b>1.500.000đ</b></span>
                                                <div style="margin-left: auto;">
                                                    <a href="./adminFixProductForm.php">
                                                        <i class="pro-manage__function-icon fa-solid fa-wrench"></i>
                                                    </a>
                                                    <button onclick="alert('Bạn có muốn xóa sản phẩm này không ?')" class="admin-usermanage__btn">
                                                        <i class="pro-manage__function-icon fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
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
    </div>
</body>
</html>