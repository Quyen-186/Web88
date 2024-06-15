<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ('../connection.php');

$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: ../User/Sign-in.php");
    exit();
}
$id = $_GET['username'];
if (isset($id)) {
    $id = $_GET['username'];
    $sql = "SELECT * FROM taikhoan WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    // Handle the error
    echo "Error: username parameter is missing";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $name = $_POST['name']; 
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $sql1 = "UPDATE taikhoan SET password = ?, name = ?, address = ?, phone = ?, email = ?, dob = ? WHERE username = ?";
    $stmt1 = $mysqli->prepare($sql1);
    $stmt1->bind_param('sssssss', $password, $name, $address, $phone, $email, $dob, $id);
    $success = $stmt1->execute();

    if ($success) {
        // Redirect back to the previous page
        header("Location: adminUserManagement.php");
    } else {
        // Handle the error
        echo "Error: " . $stmt1->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - SỬA THÔNG TIN NGƯỜI DÙNG
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
                            <img src="./Ảnh web admin/387123461_1563644207508135_2222331430281718689_n.jpg" alt=""
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
                            <b>Sửa thông tin người dùng</b>
                        </a>
                    </div>
                </div>
                <div class="cart-title">
                    <h2>Sửa thông tin người dùng</h2>
                </div>
                <div class="row">
                    <div class="col-75">
                        <div class="container">
                            <form action="adminFixUserForm.php?username=<?php echo $id ?>" method="post">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="username" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-user"></i>Tên tài khoản</label>
                                        <input type="text" id="username" name="username" style="font-size: 1.5rem;"
                                            placeholder="Tên tài khoản" value="<?php echo $id; ?>" readonly>

                                        <p style="color: red; font-size: 1.5rem;">Không thể chỉnh sửa Tên tài khoản</p>
                                        <label for="password" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-address-card-o"></i>Mật khẩu</label>
                                        <input type="password" id="password" name="password" style="font-size: 1.5rem;"
                                            placeholder="Mật khẩu" value="<?php echo $user['password']; ?>">

                                        <label for="email" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-envelope"></i> Email</label>
                                        <input type="text" id="email" name="email" style="font-size: 1.5rem;"
                                            placeholder="Email" value="<?php echo $user['email']; ?>">

                                        <label name="name" for="fname" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-user"></i> <b>Tên</b></label>
                                        <input type="text" id="fname" name="name" style="font-size: 1.5rem;"
                                            placeholder="Họ tên" value="<?php echo $user['name']; ?>">

                                        <label for="phone" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-phone"></i> Số điện thoại</label>
                                        <input type="text" id="phone" name="phone" style="font-size: 1.5rem;"
                                            placeholder="Số điện thoại" value="<?php echo $user['phone']; ?>">

                                        <label for="adr" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-address-card-o"></i> Địa chỉ</label>
                                        <input type="text" id="adr" name="address" style="font-size: 1.5rem;"
                                            placeholder="Địa chỉ" value="<?php echo $user['address']; ?>">

                                        <label for="dob" style="font-size: 1.5rem;"><i
                                                class="icon-payment fa fa-calendar"></i> Ngày sinh</label>
                                        <input type="date" id="dob" name="dob" style="font-size: 1.5rem;"
                                            value="<?php echo $user['dob']; ?>">

                                    </div>
                                </div>
                                <button type="submit" class="btn">Sửa</button>
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