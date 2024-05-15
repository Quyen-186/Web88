<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Include the database connection file
include_once ("../connection.php");
include_once ("../User/layout/head.php");

// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: ../User/Sign-in.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];


    // Prepare SQL statement to update product information
    $sql = "INSERT INTO sanpham (name, price, description, category_id, stock_quantity) 
            VALUES ('$product_name', '$price', '$description', '$category', '$quantity')";

    if (mysqli_query($mysqli, $sql)) {
        echo "New product created successfully.";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}

$mysqli->close();
?>


</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - SỬA SẢN PHẨM
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="main_detailed_pagecss.php">
    <link rel="stylesheet" href="paymentFormcss.php">
    <style>
        .admin-fixpro__img {
            width: 150px;
            height: 150px;
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
                            <img src="Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png" alt=""
                                class="admin-header__img">
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="progress-bar">
                    <div class="progress-bar__main-content">
                        <a class="main-content__item" href="./admin.php"><b>Sản phẩm hot</b></a>
                        <a class="main-content__item" href="./adminUserManagement.php">
                            <i class="fa-solid fa-arrow-right"></i>
                            <b>Quản lý người dùng</b>
                        </a>
                        <a class="main-content__item" href="./adminAddUserForm.php">
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
                            <form action="addproduct.php" method="post">
                                <div class="row">
                                    <div class="col-50">
                                        <img src="<?php echo $productInfo['image'] ?>" alt="" class="admin-fixpro__img"
                                            id="imageElement" alt="Image 1">

                                        <br><br>
                                        <input type="file" name="uploadfile" id="img" style="display: none;">
                                        <label class="img" for="img">
                                            <i style="font-size: 1.5rem;" class="fa-solid fa-image"></i>
                                            <span style="font-size: 1.5rem;">Thêm ảnh sản phẩm</span>
                                        </label>

                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Tên sản
                                                phẩm</b></label>
                                        <input type="text" id="fname" name="name" style="font-size: 1.5rem;">

                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Số lượng</b></label>
                                        <input type="text" id="fname" name="quantity" style="font-size: 1.5rem;">

                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Phân loại</b></label>
                                        <select name="category" style="font-size: 1.5rem;">
                                            <option value="">Chọn phân loại</option>
                                            <option value="1">Weights</option>
                                            <option value="2">Machines</option>
                                            <option value="3">Drugs</option>
                                        </select>

                                        <label for="price" style="font-size: 1.5rem;"><i></i> Giá</label>
                                        <input type="text" id="price" name="price" style="font-size: 1.5rem;">

                                        <label for="desc" style="font-size: 1.5rem;"><i></i> Mô tả</label>
                                        <textarea id="desc" name="description" style="font-size: 1.5rem;"></textarea>
                                    </div>
                                </div>
                                <button name="submit" type="submit" class="btn">Thêm sản phẩm</button>
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