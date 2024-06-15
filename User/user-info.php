<?php
session_start();
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}

include_once ('layout/head.php');
include_once ('../connection.php');

$username = $_SESSION['username'];

$stmt = $mysqli->prepare("SELECT username, name, address, phone, email, dob FROM taikhoan WHERE username = ?");

// Bind parameters
$stmt->bind_param("s", $username);

// Execute the statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($username, $name, $address, $phone, $email, $dob);

// Fetch the result
$stmt->fetch();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="admin.php">
    <link rel="stylesheet" href="usercss.php">
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">

                    </ul>

                    <ul class="header__navbar-list">
                        <li class="header__navbar-item">
                            <i class="fa-solid fa-bell"></i>
                            <a href="" class="header__navbar-item-link">Thông báo</a>
                        </li>

                        <li class="header__navbar-item">
                            <a href="./user-info.php" class="user-header__profile-img-name"
                                style="text-decoration: none;">
                                <img src="./Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png" alt=""
                                    class="user-header__profile-img">
                                <span class="user-header__profile-name"><?php echo $_SESSION['name'] ?></span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="Sign-out.php" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <a href="user.php" class="header__logo">
                        <img src="./Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </a>

                    <form name="search" action="user.php" method="GET" class="header__search">
                        <input class="header__search-input" type="text" id="inputField" name="product_name"
                            placeholder="Nhập để tìm kiếm sản phẩm"
                            value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
                        <div class="header__search-btn">
                            <button type="submit" class="header__search-btn-icon fa-solid fa-magnifying-glass"></button>
                        </div>
                    </form>

                    <div class="header__cart">
                        <a href="./cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row1 app__content">
                    <div class="grid__column-21">
                        <nav class="category">
                            <h3 class="category__heading">
                                <i class="category__heading-icon fas fa-list"></i>
                                Danh mục
                            </h3>

                            <ul class="category-list">
                                <li class="category-item category-item__active">
                                    <a href="./user-info.php" class="category-item__link">Tài khoản của tôi</a>
                                </li>
                                <li class="category-item">
                                    <a href="./cart.php" class="category-item__link">Giỏ hàng</a>
                                </li>
                                <li class="category-item">
                                    <a href="./order.php" class="category-item__link">Lịch sử đơn hàng</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="grid__column-101">
                        <div class="home-product">
                            <div class="admin-grid__row">
                                <div class="profile-title">
                                    <b>Hồ sơ của tôi</b>
                                </div>
                                <div class="admin__profile-info">
                                    <div class="admin-grid__column-7">
                                        <table class="table-info">
                                            <tr>
                                                <td class="title-info">
                                                    Username:
                                                </td>
                                                <td class="detailed-info"><?php echo $username ?></td>

                                            </tr>
                                            <tr>
                                                <td class="title-info">
                                                    Họ và Tên:
                                                </td>
                                                <td class="detailed-info"><?php echo $name ?></td>
                                            </tr>
                                            <tr>
                                                <td class="title-info ">
                                                    Địa chỉ: </td>
                                                <td class="detailed-info"><?php echo $address ?></td>

                                            <tr>
                                                <td class="title-info">
                                                    Email:
                                                </td>
                                                <td class="detailed-info"><?php echo $email ?></td>
                                            </tr>
                                            <tr>
                                                <td class="title-info">
                                                    Số điện thoại:
                                                </td>
                                                <td class="detailed-info"><?php echo $phone ?></td>
                                            </tr>
                                            <tr>
                                                <td class="title-info">
                                                    Ngày sinh:
                                                </td>
                                                <td class="detailed-info"><?php echo $dob ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="admin-grid__column-3-1">
                                        <div class="admin__profile-img">
                                            <img src="./Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png"
                                                alt="" class="profile-img__miniface">
                                            <div class="admin__upload-img-btn btn">Chọn ảnh</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once ('layout/footer.php'); ?>
    </div>

</body>

</html>