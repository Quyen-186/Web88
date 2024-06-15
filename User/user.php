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
                            <a href="user-info.php" class="user-header__profile-img-name"
                                style="text-decoration: none;">
                                <img src="Ảnh web admin/237774783_1607417492938803_7455495955635193349_n.png" alt=""
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
                        <img src="Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
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
                        <a href="cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container">
            <div class="grid">
                <div class="grid__row app__content">
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
                                <?php if (!empty($products[$i]['name']) && $products[$i]['status'] == 1): ?>
                                    <a style="text-decoration: none;"
                                        href="detailed-page__milk-1.php?product_id=<?php echo $products[$i]['product_id']; ?>">
                                        <div class="home-product-item">
                                            <img src="<?php echo $products[$i]['image_url']; ?>" alt=""
                                                class="home-product-item__img">
                                            <h4 class="home-product-item__name"><?php echo $products[$i]['name']; ?></h4>
                                            <div class="home-product-item__price">
                                                <span
                                                    class="home-product-item__price-current"><b><?php echo number_format($products[$i]['price'], 0, ',', '.') . "đ"; ?></b></span>
                                            </div>
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
    <?php include_once ('layout/footer.php'); ?>
</body>

</html>