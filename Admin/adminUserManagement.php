<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - QUẢN LÝ NGƯỜI DÙNG
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="adminUserManagementcss.php">
    <link rel="stylesheet" href="adminProductManagementcss.php">
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
                                <li class="category-item category-item__active">
                                    <a href="./adminUserManagement.php" class="category-item__link">QUẢN LÝ <br> NGƯỜI DÙNG</a>
                                </li>
                                <li class="category-item">
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
                        <div class="add-product">
                            <a href="./adminAddUserForm.php" class="add-product__link">
                                <div class="add-product__icon">
                                    <i class="add-product__plus fa-solid fa-plus"></i>
                                </div>
                                <span class="add-product__text">Thêm người dùng</span>
                            </a>
                        </div>

                        <div class="user-management">
                            <table>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Tình trạng</th>
                                    <th>Quản lý</th>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>Đào Quốc Thuận</td>
                                    <td>quocthuandao0403@gmail.com</td>
                                    <td>Mở khóa</td>
                                    <td>
                                        <a href="./adminFixUserForm.php" class="admin-usermanage__link">
                                            <i class="fa-solid fa-wrench"></i>
                                        </a>
                                        
                                        <button onclick="alert('Đã khóa')" class="admin-usermanage__btn"> 
                                            <i class="fa-solid fa-lock"></i>
                                        </button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Hồ Nguyên Minh</td>
                                    <td>quocthuandao0403@gmail.com</td>
                                    <td>Mở khóa</td>
                                    <td>
                                        <a href="./adminFixUserForm.php" class="admin-usermanage__link">
                                            <i class="fa-solid fa-wrench"></i>
                                        </a>
                                        
                                        <button onclick="alert('Đã khóa')" class="admin-usermanage__btn"> 
                                            <i class="fa-solid fa-lock"></i>
                                        </button>
                                    </td>
                                  </tr>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
</html>