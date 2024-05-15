<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: ../UserSign-in.php");
    exit();
}
include_once ('../User/layout/head.php');
include_once ('../connection.php');

include_once ('../User/search.php');

// Determine which page to display
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$productsPerPage = 5;
$totalPages = ceil(count($products) / $productsPerPage);



// Calculate the index of the first product to display on the current page
$startIndex = ($page - 1) * $productsPerPage;
// Calculate the index of the last product to display on the current page
$endIndex = min($startIndex + $productsPerPage - 1, count($products) - 1);

// SQL query to fetch only the category_name column
$haha = "SELECT DISTINCT category_name FROM phanloai";

// Execute the query
$ketqua = mysqli_query($mysqli, $haha);

// Check if the query executed successfully
if ($ketqua) {
    // Initialize an array to store category names
    $category_names = array();

    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($ketqua)) {
        // Access the category_name column from the fetched row
        $category_names[] = $row['category_name'];
    }


    // Free the result set
    mysqli_free_result($ketqua);
} else {
    // Handle the case where the query fails
    echo "Error executing query: " . mysqli_error($mysqli);
}

include_once ('../User/advanced.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./Ảnh logo/372986215_692178822950132_2957802616111635882_n (1).jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ADMIN - QUẢN LÝ SẢN PHẨM
    </title>
    <link rel="stylesheet" href="./Fonts/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="resetcss.php">
    <link rel="stylesheet" href="maincss.php">
    <link rel="stylesheet" href="basecss.php">
    <link rel="stylesheet" href="fontscss.php">
    <link rel="stylesheet" href="admincss.php">
    <link rel="stylesheet" href="adminProductManagementcss.php">
    <link rel="stylesheet" href="adminUserManagementcss.php">
</head>

<body>
    <div class="app">
        <header class="admin-header">
            <div class="grid">
                <nav class="admin-header__navbar">
                    <div class="admin-header__navbar-list-left">
                        <div class="admin-header__navbar-item">
                            <img src="Ảnh logo/logo_image_1587131466.png" alt="" class="admin-header__logo-img">
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
                            <img src="Ảnh web admin/" alt="" class="user-header__profile-img">
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
                                <li class="category-item category-item__active">
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
                        <form action="adminProductManagement.php" method="get">
                            <div class="home-filter">
                                <span class="home-filter__label"></span>
                                <label class="home-filter__label" for="product_name">Tìm nâng cao </label>
                                <input type="text" class="home-filter__btn1" id="product_name"
                                    placeholder="Tên sản phẩm" name="product_name"
                                    value="<?php echo isset($_GET['product_name']) ? $_GET['product_name'] : ''; ?>">
                                <select name="category" class="home-filter__btn btn">
                                    <option value="">Chọn phân loại</option>
                                    <?php
                                    foreach ($category_names as $category_name) {
                                        $selected = ($_GET['category'] == $category_name) ? "selected" : "";
                                        echo "<option value='" . $category_name . "'>" . $category_name . "</option>";
                                    }
                                    ?>
                                </select>


                                <a href="adminProductManagement.php?page=1">
                                    <input type="submit" value="Tim" class="home-filter__btn btn"
                                        style="background-color: orange;" :>
                                </a>

                                <div class="home-filter__page">
                                    <a href="addproduct.php" class="button">Thêm sản phẩm</a>
                                    <style>
                                        .button {
                                            display: inline-block;
                                            padding: 10px 20px;
                                            background-color: orange;
                                            color: black;
                                            text-decoration: none;
                                            border-radius: 5px;
                                            text-align: center;
                                            font-size: 16px;
                                            transition: color 0.3s ease;
                                        }

                                        .button:hover {
                                            color: red;
                                        }
                                    </style>

                                </div>


                                <span class="home-filter__page-num">
                                    <span
                                        class="home-filter__page-current"><?php echo $page; ?></span>/<?php echo $totalPages; ?>
                                </span>

                                <div class="home-filter__page-control">
                                    <?php if ($page > 1): ?>
                                        <a href="?page=<?php echo ($page - 1);
                                        if (!empty($product_name)) {
                                            echo "&product_name=" . $_GET['product_name'];
                                        }
                                        if (isset($_GET['category'])) {
                                            echo "&category=" . $_GET['category'];
                                        }
                                        if (isset($_GET['min_price'])) {
                                            echo "&min_price=" . $_GET['min_price'];
                                        }
                                        if (isset($_GET['max_price'])) {
                                            echo "&max_price=" . $_GET['max_price'];
                                        }
                                        ?>" class="home-filter__page-btn">
                                            <i class="home-filter__page-icon fa-solid fa-angle-left"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($page < $totalPages): ?>
                                        <a href="adminProductManagement.php?page=<?php echo ($page + 1);
                                        if (!empty($product_name)) {
                                            echo "&product_name=" . $_GET['product_name'];
                                        }
                                        if (isset($_GET['category'])) {
                                            echo "&category=" . $_GET['category'];
                                        }
                                        if (isset($_GET['min_price'])) {
                                            echo "&min_price=" . $_GET['min_price'];
                                        }
                                        if (isset($_GET['max_price'])) {
                                            echo "&max_price=" . $_GET['max_price'];
                                        }
                                        ?>" class="home-filter__page-btn">
                                            <i class="home-filter__page-icon fa-solid fa-angle-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>


                        <div class="home-product">
                            <?php for ($i = $startIndex; $i <= $endIndex; $i++): ?>
                                <?php if (!empty($products[$i]['name'])): ?>
                                    <a style="text-decoration: none;"
                                        href="adminFixProductForm.php?product_id=<?php echo $products[$i]['product_id']; ?>&status=<?php echo $products[$i]['status']; ?>">
                                        <div class="home-product-item">
                                            <img src="<?php echo $products[$i]['image_url']; ?>" alt=""
                                                class="home-product-item__img">
                                            <h4 class="home-product-item__name"><?php echo $products[$i]['name']; ?></h4>
                                            <?php if ($products[$i]['status'] == 1): ?>
                                                <div class="home-product-item__price">
                                                    <span
                                                        class="home-product-item__price-current"><b><?php echo number_format($products[$i]['price'], 0, ',', '.') . "đ"; ?></b></span>
                                                </div>
                                            <?php else: ?>
                                                <span style="color: red; font-size: 15px"><b>ĐÃ ẨN</b></span>
                                            <?php endif; ?>

                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>