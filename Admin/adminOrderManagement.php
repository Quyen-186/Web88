<?php
session_start();
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: ../User/Sign-in.php");
    exit();
}
include_once ('../User/layout/head.php');
include_once ('../connection.php');

$sql = "SELECT * FROM orders JOIN order_items ON orders.id = order_items.order_id GROUP BY order_items.order_id ";
// Execute the query
$result = $mysqli->query($sql);

// Check if the query was successful
if ($result)
    // Fetch all rows as an associative array
    $orders = $result->fetch_all(MYSQLI_ASSOC);
else
    // Handle error - the query failed
    echo "Error: " . $mysqli->error;

$status = $_POST['status'];
$order_id = $_POST['order_id']; // Add this line

if ($order_id !== null && $status !== null) {
    // Prepare the SQL statement
    $stmt = $mysqli->prepare("UPDATE orders SET status = ? WHERE id = ?");

    // Bind the parameters
    $stmt->bind_param('si', $status, $order_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Handle success - the status was updated
    } else {
        echo "Error updating status: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - QUẢN LÝ ĐƠN HÀNG
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="adminUserManagementcss.php">
    <link rel="stylesheet" href="adminOrderManagementcss.php">
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
                                <li class="category-item">
                                    <a href="./adminUserManagement.php" class="category-item__link">QUẢN LÝ <br> NGƯỜI
                                        DÙNG</a>
                                </li>
                                <li class="category-item">
                                    <a href="./adminProductManagement.php" class="category-item__link">QUẢN LÝ <br> SẢN
                                        PHẨM</a>
                                </li>
                                <li class="category-item category-item__active">
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
                        <div class="om-header__search">
                            <input type="text" id="inputField" class="om-header__search-input"
                                placeholder="Nhập để tìm kiếm đơn hàng">
                            <div class="om-header__search-btn">
                                <i class="om-header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>

                        <div class="om-header__search-date">
                            <form action="">
                                <label for="" class="search-date__from">Từ:</label>
                                <input type="date" id="" name="">
                                <span> - </span>
                                <label for="">Đến</label>
                                <input type="date" id="" name="">
                                <input type="button" onclick="" value="Xuất">
                            </form>
                        </div>
                        <div class="user-management">
                            <table>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Thông tin</th>
                                </tr>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?php echo $order['order_id'] ?></td>
                                        <td>04/03/2023</td>
                                        <td>
                                            <form method="post" action="adminOrderManagement.php">
                                                <select name="status">
                                                    <option value="not verified" <?php if ($order['status'] == 'not verified')
                                                        echo 'selected'; ?>>Chưa xử lý</option>
                                                    <option value="verified" <?php if ($order['status'] == 'verified')
                                                        echo 'selected'; ?>>Đã xác nhận</option>
                                                    <option value="delivered" <?php if ($order['status'] == 'delivered')
                                                        echo 'selected'; ?>>Đã giao</option>
                                                    <option value="cancelled" <?php if ($order['status'] == 'cancelled')
                                                        echo 'selected'; ?>>Đã hủy</option>
                                                </select>
                                                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                                                <input type="submit" value="Update">
                                            </form>
                                        </td>
                                        <td>
                                            <a href="adminDetailedOrder.php?order_id=<?php echo $order['order_id'] ?>">Xem
                                                chi tiết</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="main.js"></script> -->
</body>

</html>