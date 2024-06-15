<?php
session_start();

include_once ('layout/head.php');
include_once ('../connection.php');
include_once ('search.php');
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

include_once ('advanced.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ('layout/head.php'); ?>
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
                            <a href="./Sign-in.php" class="header__navbar-item-link">Thông báo</a>
                        </li>
                        </li>
                        <li class="header__navbar-item ">
                            <a href="Sign-up.php" class="header__navbar-item-link">Đăng ký</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="Sign-in.php" class="header__navbar-item-link">Đăng nhập</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <img src="Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </div>
                    <div class="header__search">
                        <input type="text" id="inputField" class="header__search-input" onclick="indexClick()"
                            placeholder="Nhập để tìm kiếm sản phẩm">
                        <div onclick="indexClick()" class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <div class="header__cart">
                        <a href="Sign-in.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="grid__column-2">
                        
                    </div>
                    <div class="grid__column-10">
                    <form action="user.php" method="get">
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

                                <input class="home-filter__btn1" type="number" id="min_price" name="min_price"
                                    value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : ''; ?>" min="0"
                                    placeholder="Min">
                                <input class="home-filter__btn1" type="number" id="max_price" name="max_price"
                                    value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : ''; ?>" min="0"
                                    placeholder="Max">

                                <a href="user.php?page=1">
                                    <input type="submit" value="Tim" class="home-filter__btn btn"
                                        style="background-color: orange;" :>
                                </a>

                                <div class="home-filter__page">
                                    <span class="home-filter__page-num">
                                        <span
                                            class="home-filter__page-current"><?php echo $page; ?></span>/<?php echo $totalPages; ?>
                                    </span>

                                    <div class="home-filter__page-control">
                                        <?php if ($page > 1): ?>
                                            <a href="user.php?page=<?php echo ($page - 1);
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
                                            <a href="user.php?page=<?php echo ($page + 1);
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
                            </div>
                        </form>
                        <div class="home-product">
                            <?php for ($i = $startIndex; $i <= $endIndex; $i++): ?>
                                <a href="detailed-page__milk-1.php?product_id=<?php echo $products[$i]['product_id']; ?>">
                                    <div class="home-product-item">
                                        <img src="<?php echo $products[$i]['image_url']; ?>" alt=""
                                            class="home-product-item__img">
                                        <h4 class="home-product-item__name"><?php echo $products[$i]['name']; ?></h4>
                                        <div class="home-product-item__price">
                                            <span
                                                class="home-product-item__price-current"><b><?php echo $products[$i]['price']; ?></b></span>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column-2-4">
                    <h3 class="footer__heading">GIỚI THIỆU CHUNG</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">
                                Giới thiệu về Roid Supplement</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">
                                Hướng dẫn đặt hàng
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">
                                Hướng dẫn thanh toán
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid__column-2-4">
                    <h3 class="footer__heading">CHÍNH SÁCH CHUNG</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Chính sách dữ liệu</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Chính sách bảo mật</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Chính sách kinh doanh</a>
                        </li>
                    </ul>
                </div>
                <div class="grid__column-2-4">
                    <h3 class="footer__heading">THÔNG TIN CẦN BIẾT</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Kiểm tra tích điểm</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Hướng dẫn tập gym</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Chế độ dinh dưỡng</a>
                        </li>
                    </ul>
                </div>
                <div class="grid__column-2-4">
                    <h3 class="footer__heading">VỀ CHÚNG TÔI</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Tư vấn và đặt hàng: <br> 091.901.3030</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Phục vụ tất cả các ngày trong tuần</a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">Bắt đầu mở cửa bán hàng từ 8h30</a>
                        </li>
                    </ul>
                </div>
                <div class="grid__column-2-4">
                    <h3 class="footer__heading">FACEBOOK FANPAGE</h3>
                    <ul class="footer-list">
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">
                                <i class="fa-brands fa-facebook"></i>
                                Facebook
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link">
                                <i class="fa-brands fa-square-instagram"></i>
                                Instagram
                            </a>
                        </li>
                        <li class="footer-item">
                            <a href="./Sign-in.php" class="footer-item__link"><img src="./Ảnh footer/IyxQtiu.png" alt=""
                                    class="footer-img"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>