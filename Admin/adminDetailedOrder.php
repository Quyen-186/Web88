<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - XEM CHI TIẾT ĐƠN HÀNG
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="main_detailed_pagecss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="cartcss.php">
    <link rel="stylesheet" href="adminUserManagementcss.php">
    <link rel="stylesheet" href="adminOrderManagementcss.php">
    <style>
        .order__info-user {
            margin: 30px 0 0 35px;
        }

        .order__table-info {
            padding: 0;
            border: 0;
            margin: 0;
        }

        td {
            border: 0;
        }
    </style>
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
                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class = "main-content__item" href="./admin.php"><b>Trang chủ</b></a>
                            <a class = "main-content__item" href="./adminOrderManagement.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Quản lý đơn hàng</b>
                            </a>
                            <a class = "main-content__item" href="./adminDetailedOrder.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Xem chi tiết đơn hàng</b>
                            </a>
                        </div>
                    </div>
                    <div class="cart-title">
                        <h2>Đơn hàng</h2>
                    </div>
                    <div class="order__info-user">
                        <table class="order__table-info">
                            <tr>
                                <td class="title-info">
                                    Tên	
                                </td>
                                <td class="detailed-info">Đào Quốc Thuận</td>
                            </tr>
                            <tr>
                                <td class="title-info">
                                    Mã đơn hàng
                                </td>
                                <td class="detailed-info">01</td>
                            </tr>
                            <tr>
                                <td class="title-info">
                                    Địa chỉ	giao hàng
                                </td>
                                <td class="detailed-info">582 Phạm Văn Chí, Phường 8, Quận 6, TP.HCM</td>
                            </tr>
                            <tr>
                                <td class="title-info">
                                    Email
                                </td>
                                <td class="detailed-info">cr7depdzai1903@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="title-info">
                                    Số điện thoại
                                </td>
                                <td class="detailed-info">0703574404</td>
                            </tr>
                            <tr>
                                <td class="title-info">
                                    Ngày giao hàng dự kiến	
                                </td>
                                <td class="detailed-info">04-03-2024</td>
                            </tr>
                        </table>
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
                                    <div class="cart__product-numbers" style="text-align: center;">
                                        2
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
                                    <h2>Tổng đơn hàng</h2>
                                </div>
                                <div class="cart__totals-details">
                                    <div class="totals-details">
                                        <div class= "text__price-currency">Tổng (Đã tính ship)</div>
                                        <div class="subtotal__price-currency">
                                            <b>3.200.000 đ</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- <script src="main.js"></script> -->
</body>
</html>