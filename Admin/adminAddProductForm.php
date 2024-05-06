<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - THÊM SẢN PHẨM
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="main_detailed_pagecss.php">
    <link rel="stylesheet" href="paymentFormcss.php">
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
                <div class="progress-bar">
                    <div class="progress-bar__main-content">
                        <a class = "main-content__item" href="./admincss.php"><b>Sản phẩm hot</b></a>
                        <a class = "main-content__item" href="./adminProductManagementcss.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Quản lý sản phẩm</b>
                        </a>
                        <a class = "main-content__item" href="./adminAddProductFormcss.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Thêm sản phẩm</b>
                        </a>
                    </div>
                </div>              
                <div class="cart-title">
                    <h2>Thêm sản phẩm</h2>
                </div>
                <div class="row">
                    <div class="col-75">
                        <div class="container">
                            <form action="">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="fname" style="font-size: 1.5rem;"> <b>Tên sản phẩm</b></label>
                                        <input type="text" id="fname" name="firstname" style="font-size: 1.5rem;" placeholder="Tên sản phẩm">

                                        <label for="fname" style="font-size: 1.5rem;"> <b>Phân loại</b></label>
                                        <input type="text" id="fname" name="firstname" style="font-size: 1.5rem;" placeholder="Phân loại">

                                        <label for="email" style="font-size: 1.5rem;"> Giá</label>
                                        <input type="text" id="email" name="email" style="font-size: 1.5rem;" placeholder="Giá">

                                        <label for="adr" style="font-size: 1.5rem;"> Mô tả</label>
                                        <input type="text" id="adr" name="address" style="font-size: 1.5rem;" placeholder="Mô tả sản phẩm chi tiết">

                                        <form action="">
                                            <input type="file" name="uploadfile" id="img" style="display: none;">
                                            <label class="img" for="img">
                                                <i style="font-size: 1.5rem;" class="fa-solid fa-image"></i>
                                                <span style="font-size: 1.5rem;">Thêm hình ảnh</span>
                                            </label>
                                        </form>
                                    </div>
                                </div>
                                <button onclick="alert('Đã thêm sản phẩm thành công.')" class="btn">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    <!-- <script src="main.js"></script> -->
</body>
</html>