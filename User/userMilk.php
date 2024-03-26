<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        WheyStore - Dinh dưỡng, thực phẩm thể hình, Gym hàng giả.
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar"> 
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            Hotline: 091.901.3030
                        </li>
                        <li class="header__navbar-item">
                            Ghé fanpage
                            <a href="" class="header__navbar-icon-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>  
                        </li>
                    </ul>
    
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <i class="fa-solid fa-bell"></i>
                            <a href="" class="header__navbar-item-link">Thông báo</a>
                        </li>
                        <li class="header__navbar-item">
                            <i class="fa-regular fa-circle-question"></i>
                            <a href="" class="header__navbar-item-link">Trợ giúp</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="./user-info.html" class="user-header__profile-img-name" style="text-decoration: none;">
                                <img src="./Ảnh web admin/387123461_1563644207508135_2222331430281718689_n.jpg" alt="" class="user-header__profile-img">
                                <span class="user-header__profile-name">Thựn Mapdit</span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="./index.html" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search" >
                    <div class="header__logo">
                        <img src="./Ảnh logo/logo_image_1587131466.png" alt="" class="header__logo-img">
                    </div>

                    <div class="header__search">
                        <input type="text" id="inputField" class="header__search-input" placeholder="Nhập để tìm kiếm sản phẩm">
                        <div class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>

                    <div class="header__cart">
                        <a href="./cart.html"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a> 
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
                                    <a href="./user.html" class="category-item__link">Trang chủ</a>
                                </li>
                                <li class="category-item category-item__active">
                                    <a href="./userMilk.html" class="category-item__link">Sữa tăng cân</a>
                                </li>
                                <li class="category-item">
                                    <a href="./userWhey.html" class="category-item__link">Whey Protein</a>
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

                            <a href="./userMilk.html">
                                <button class="home-filter__btn btn" style="background-color: orange;">Tìm</button>
                            </a>

                            <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <span class="home-filter__page-current">1</span>/2
                                </span>

                                <div class="home-filter__page-control">
                                    <a href="./user.html" class="home-filter__page-btn home-filter__page-btn--disabled">
                                        <i class="home-filter__page-icon fa-solid fa-angle-left"></i>
                                    </a>
                                    <a href="./userPage2.html" class="home-filter__page-btn">
                                        <i class="home-filter__page-icon fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="home-product">
                            <div class="grid__row">
                                <div class="grid__column-2-4">
                                    <a class="home-product-item" href="./detailed-page__milk-1.html">
                                        <div class="home-product-item__img">
                                            <img src="./Ảnh sản phẩm hot nhất/upl_up_your_mass_xxxl_1350_12lbs_1677559574_image_1677559574.jpg" alt="" class="home-product-item__img">
                                            <h4 class="home-product-item__name">
                                                Up Your Mass XXXL 1350 12lbs    
                                            </h4>
                                            <div class="home-product-item__price">
                                                <span class="home-product-item__price-current"><b>1.500.000đ</b></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>  
                                <div class="grid__column-2-4">
                                    <a class="home-product-item" href="./detailed-page__milk-2.html">
                                        <div class="home-product-item__img">
                                            <img src="./Ảnh sản phẩm sữa tăng cân bán chạy/upl_elitelab_mass_muscle_gainer_20lbs_1682398641_image_1682398641.jpg" alt="" class="home-product-item__img">
                                            <h4 class="home-product-item__name">
                                                EliteLab Mass Muscle Gainer 20lbs    
                                            </h4>
                                            <div class="home-product-item__price">
                                                <span class="home-product-item__price-current"><b>1.500.000đ</b></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="grid__column-2-4">
                                    <a class="home-product-item" href="./detailed-page__milk-1.html">
                                        <div class="home-product-item__img">
                                            <img src="./Ảnh sản phẩm sữa tăng cân bán chạy/upl_mass_tech_2000_22lbs_10kg_1677569000_image_1677569000.jpg" alt="" class="home-product-item__img">
                                            <h4 class="home-product-item__name">
                                                Mass Tech 2000 22lbs 10kg   
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

        <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">GIỚI THIỆU CHUNG</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Giới thiệu về WheyStore</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Hướng dẫn đặt hàng
                                </a>
                            </li>                                
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    Hướng dẫn thanh toán
                                </a>
                            </li>    
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">CHÍNH SÁCH CHUNG</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Chính sách dữ liệu</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Chính sách bảo mật</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Chính sách kinh doanh</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">THÔNG TIN CẦN BIẾT</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Kiểm tra tích điểm</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Hướng dẫn tập gym</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Chế độ dinh dưỡng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">VỀ CHÚNG TÔI</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Tư vấn và đặt hàng: <br> 091.901.3030</a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link">Phục vụ tất cả các ngày trong tuần</a>
                            </li>
                            <li class="footer-item">     
                                <a href="" class="footer-item__link">Bắt đầu mở cửa bán hàng từ 8h30</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">FACEBOOK FANPAGE</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="" class="footer-item__link">
                                    <i class="fa-brands fa-facebook"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer-item">
                                    <a href="" class="footer-item__link">
                                    <i class="fa-brands fa-square-instagram"></i>
                                    Instagram
                                </a>
                            </li>
                            <li class="footer-item">
                                <a href="" class="footer-item__link"><img src="./Ảnh footer/IyxQtiu.png" alt="" class="footer-img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="copyright-information">
                <div class="grid">
                    <p class="footer-text">
                        Tất cả các sản phẩm mà Wheystore bán không phải là thuốc, không thể thay thế thuốc chữa bệnh.
                    </p>
                    <p class="footer-text">
                        Hiệu quả khi dùng sản phẩm còn tùy thuộc vào cơ địa và chế độ ăn uống, sinh hoạt, tập luyện của mỗi người.
                    </p>
                    <p class="footer-text">
                        Vận hành website bởi Công ty TNHH WheyStore Việt Nam - MST: 0110419361 - Đại diện pháp luật: Trần Xuân Phong. Email: info@wheystore.vn
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- <script src="main.js"></script> -->
</body>
</html>