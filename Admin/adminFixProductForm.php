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


// Initialize productInfo array to avoid potential undefined variable errors
$productInfo = [];

// Check if product_id is set in the URL
if (isset($_GET['product_id'])) {
    // Get the product_id from the URL

    $productId = $_GET['product_id'];

    // Check if product_id is not empty and is a valid integer
    if (!empty($productId) && is_numeric($productId)) {

        // Sanitize input to prevent SQL injection
        $productId = intval($productId);

        // Prepare SQL statement to select product information based on product_id
        $stmt = $mysqli->prepare("SELECT * FROM sanpham WHERE product_id = ?");
        // Bind product_id parameter
        $stmt->bind_param("i", $productId);

        // Execute the prepared statement
        $stmt->execute();

        // Get result set
        $result = $stmt->get_result();

        // Check if there are rows in the result set
        if ($result->num_rows > 0) {
            // Fetch product information as an associative array
            $row = $result->fetch_assoc();

            // Store product information in an associative array
            $productInfo = [
                'id' => $row['product_id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => $row['stock_quantity'],
                'image' => $row['image_url'],
                'description' => $row['description'],
                'category_id' => $row['category_id'],
                'status' => $row['status']

            ];

        } else {
            // Product not found, you might want to handle this case
            echo ("Product not found!"); // Redirect to an error page or handle it accordingly
            exit(); // Stop further execution
        }
    } else {
        // Invalid product ID provided in the URL, handle this case as needed
        echo ("Invalid product ID!"); // Redirect to an error page or handle it accordingly
        exit(); // Stop further execution
    }
} else {
    // No product ID provided in the URL, handle this case as needed
    echo ("No product ID provided!"); // Redirect to an error page or handle it accordingly
}



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Prepare SQL statement to update product information


    $stmt1 = $mysqli->prepare("UPDATE sanpham SET name=?, price=?, description=?, category_id=?, status = ? WHERE product_id=?");

    // Bind parameters
    $stmt1->bind_param("sssiii", $product_name, $price, $description, $category, $status, $productId);

    // Execute the prepared statement
    if ($stmt1->execute() === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt1->error;
    }

    $stmt1->close();
}


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
                            <form action="adminFixProductForm.php?product_id=<?php echo $productId ?>" method="post">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Ảnh trước
                                                đó</b></label>
                                        <img src="<?php echo $productInfo['image'] ?>" alt="" class="admin-fixpro__img"
                                            id="imageElement" alt="Image 1">

                                        <br><br>

                                        <button id="deleteButton" style="font-size: 1.5rem;">Bỏ ảnh</button>
                                        <input type="file" name="uploadfile" id="img" style="display: none;">
                                        <label class="img" for="img">
                                            <i style="font-size: 1.5rem;" class="fa-solid fa-image"></i>
                                            <span style="font-size: 1.5rem;">Thêm ảnh mới</span>
                                        </label>


                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Tên sản
                                                phẩm</b></label>
                                        <input type="text" id="fname" name="name" style="font-size: 1.5rem;"
                                            value="<?php echo $productInfo['name']; ?>" required>

                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Phân loại</b></label>
                                        <select name="category"
                                            style="font-size: 1.5rem; width: 100%; max-width: 300px;" required>
                                            <option value="">Chọn phân loại</option>
                                            <option value="1" <?php if ($productInfo['category_id'] == 1)
                                                echo 'selected'; ?>>
                                                <?php echo 'Weights' ?>
                                            </option>
                                            <option value="2" <?php if ($productInfo['category_id'] == 2)
                                                echo 'selected'; ?>>
                                                <?php echo 'Machines' ?>
                                            </option>
                                            <option value="3" <?php if ($productInfo['category_id'] == 3)
                                                echo 'selected'; ?>>
                                                <?php echo 'Drugs' ?>
                                            </option>
                                        </select>

                                        <label for="price" style="font-size: 1.5rem;"><i></i> Giá</label>
                                        <input type="text" id="price" name="price" style="font-size: 1.5rem;"
                                            value="<?php echo $productInfo['price']; ?>" required>

                                        <label for="desc" style="font-size: 1.5rem;"><i></i> Mô tả</label>
                                        <textarea id="desc" name="description" style="font-size: 1.5rem;"
                                            required><?php echo $productInfo['description']; ?></textarea>
                                        <label for="fname" style="font-size: 1.5rem;"><i></i> <b>Trạng thái</b></label>
                                        <?php
                                        $result = $mysqli->query("SELECT * FROM order_items WHERE product_id = $productId");
                                        if ($result->num_rows > 0)
                                            if ($productInfo['status'] == 0) {
                                                echo '<span style="color: red; font-size: 2rem;"></span> <br> <br>
                                                <input type="checkbox" name="status" value="1" style="zoom: 1.5;"> <span style="font-size: 2rem;">Hiện</span>';
                                            } else {
                                                echo '<input type="checkbox" name="status" value="0" style="zoom: 1.5;"> <span style="font-size: 2rem;">Xóa</span>';
                                            } else if ($productInfo['status'] == 1) {
                                            echo '<span style="color: red; font-size: 2rem;">Sản phẩm này chưa được bán ra, bạn có chắc là muốn xóa nó?</span> <br> <br> 
                                            <input type="checkbox" name="status" value="0" style="zoom: 1.5;"> <span style="font-size: 2rem;">Xóa</span>';
                                        } else {
                                            echo '<input type="checkbox" name="status" value="1" style="zoom: 1.5;"> <span style="font-size: 2rem;">Hiện</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <button name="submit" type="submit" class="btn">Sửa thông tin</button>
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