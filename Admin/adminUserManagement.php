<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once ('../connection.php');

$name = $_SESSION['name'];
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: ../User/Sign-in.php");
    exit();
}


$sql = "SELECT * FROM taikhoan WHERE isadmin = 0";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['username'];
    $status = $_POST['status'];

    $sql = "UPDATE taikhoan SET status = ? WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('is', $status, $id);
    $stmt->execute();

    // Redirect back to the user management page
    header('Location: adminUserManagement.php');
}

?>
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
                            <img src="./Ảnh web admin/387123461_1563644207508135_2222331430281718689_n.jpg" alt=""
                                class="admin-header__img">
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
                                    <a href="./admin.php" class="category-item__link">THÔNG TIN ADMIN</a>
                                </li>
                                <li class="category-item category-item__active">
                                    <a href="./adminUserManagement.php" class="category-item__link">QUẢN LÝ <br> NGƯỜI
                                        DÙNG</a>
                                </li>
                                <li class="category-item">
                                    <a href="./adminProductManagement.php" class="category-item__link">QUẢN LÝ <br> SẢN
                                        PHẨM</a>
                                </li>
                                <li class="category-item">
                                    <a href="./adminOrderManagement.php" class="category-item__link">QUẢN LÝ ĐƠN
                                        HÀNG</a>
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

                                <?php
                                // Initialize a counter variable
                                $counter = 1;

                                // Loop through the users and generate the table rows
                                while ($user = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $counter . "</td>";  // Display the counter as the position number
                                    echo "<td>" . $user['username'] . "</td>";
                                    echo "<td>" . $user['email'] . "</td>";
                                    echo "<td>" . ($user['status'] == 0 ? 'Khóa' : 'Mở khóa') . "</td>";
                                    echo "<td>";
                                    echo "<a href='./adminFixUserForm.php?username=" . $user['username'] . "' class='admin-usermanage__link'>";
                                    echo "<i class='fa-solid fa-wrench'></i>";
                                    echo "</a>";

                                    // Generate the 'Lock' or 'Unlock' button based on the user's status
                                    if ($user['status'] == 0) {
                                        echo "<form method='POST' action='adminUserManagement.php'>";
                                        echo "<input type='hidden' name='username' value='" . $user['username'] . "'>";
                                        echo "<input type='hidden' name='status' value='1'>"; // Change status to 1
                                        echo "<button type='submit' class='admin-usermanage__btn'>";
                                        echo "<i class='fa-solid fa-unlock'></i>";
                                        echo "</button>";
                                        echo "</form>";
                                    } else {
                                        echo "<form method='POST' action='adminUserManagement.php'>";
                                        echo "<input type='hidden' name='username' value='" . $user['username'] . "'>";
                                        echo "<input type='hidden' name='status' value='0'>"; // Change status to 0
                                        echo "<button type='submit' class='admin-usermanage__btn'>";
                                        echo "<i class='fa-solid fa-lock'></i>";
                                        echo "</button>";
                                        echo "</form>";
                                    }

                                    echo "</td>";
                                    echo "</tr>";

                                    // Increment the counter
                                    $counter++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>