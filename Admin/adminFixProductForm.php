</html><!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - SỬA SẢN PHẨM
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="main_detailed_page.css">
    <link rel="stylesheet" href="paymentForm.css">
    <style>
        .admin-fixpro__img {
            width: 100px;
            height: 100px;
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
                <div class="progress-bar">
                    <div class="progress-bar__main-content">
                        <a class = "main-content__item" href="./admin.html"><b>Trang chủ</b></a>
                        <a class = "main-content__item" href="./adminUserManagement.html">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Quản lý người dùng</b>
                        </a>
                        <a class = "main-content__item" href="./adminAddUserForm.html">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Sửa thông tin</b>
                        </a>
                    </div>
                </div>              
                <div class="cart-title">
                    <h2>Sửa thông tin sản phẩm</h2>
                </div>
                <div class="row">
                    <div class="col-75">
                        <div class="container">
                            <form action="">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Ảnh trước đó</b></label>
                                        <img src="./Ảnh sản phẩm hot nhất/upl_up_your_mass_xxxl_1350_12lbs_1677559574_image_1677559574.jpg" alt="" class="admin-fixpro__img" id="imageElement" alt="Image 1">
                                        <br><br>   
                                        <form action="">
                                            <button id="deleteButton" style="font-size: 1.5rem;">Bỏ ảnh</button>
                                            <input type="file" name="uploadfile" id="img" style="display: none;">
                                            <label class="img" for="img">
                                                <i style="font-size: 1.5rem;" class="fa-solid fa-image"></i>
                                                <span style="font-size: 1.5rem;">Thêm ảnh mới</span>
                                            </label>
                                        </form>

                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Tên sản phẩm</b></label>
                                        <input type="text" id="fname" name="firstname" style="font-size: 1.5rem;" placeholder="Tên sản phẩm trước đó: Up Your Mass XXXL 1350 12lbs">

                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Phân loại</b></label>
                                        <input type="text" id="fname" name="firstname" style="font-size: 1.5rem;" placeholder="Phân loại trước đó: Whey Protein">

                                        <label for="email" style="font-size: 1.5rem;"><i></i> Giá</label>
                                        <input type="text" id="email" name="email" style="font-size: 1.5rem;" placeholder="Giá trước đó 1.500.000 đ">

                                        <label for="adr" style="font-size: 1.5rem;"><i></i> Mô tả</label>
                                        <input type="text" id="adr" name="address" style="font-size: 1.5rem;" placeholder="Mô tả sản phẩm chi tiết trước đó: Thực phẩm bổ sung cơ bắp.">
                                    </div>
                                </div>
                                <button onclick="alert('Đã sửa thành công !')" class="btn">Sửa thông tin</button>
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