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
    <link rel="stylesheet" href="./main_detailed_page.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="cart.css">
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
                        <i class="header__cart-icon fa-solid fa-cart-shopping"></i> 
                    </div>   
                </div>            
            </div>
        </header>
        
        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class = "main-content__item" href="./user.html"><b>Trang chủ</b></a>
                            <a class = "main-content__item" href="./user-info.html">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Thông tin người dùng</b>
                            </a>
                            <a class = "main-content__item" href="./cart.html">
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
                                            <img src="./Ảnh sản phẩm hot nhất/upl_mass_fusion_12lbs_5_4kg_1685693088_image_1685693088.jpg" alt="" class="cart__img-css">
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
                                    <a href="./paymentForm.html">
                                        <button class="btn">
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