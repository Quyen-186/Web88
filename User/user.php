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
                                <span class="user-header__profile-name">Adu Ăng Minh</span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="Sign-out.php" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <img src="Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </div>

                    <div class="header__search">
                        <input type="text" id="inputField" class="header__search-input"
                            placeholder="Nhập để tìm kiếm sản phẩm">
                        <div class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>

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
                        <div class="home-filter">
                            <span class="home-filter__label">Tìm kiếm nâng cao</span>
                            <select class="home-filter__btn btn">
                                <option value="Sữa tăng cân">Sữa tăng cân</option>
                                <option value="Tăng cơ bắp">Tăng cơ bắp</option>

                            </select>

                            <select class="home-filter__btn btn">
                                <option value="">Giá: thấp đến cao</option>
                                <option value="">Giá: cao đến thấp</option>
                            </select>

                            <a href="user.php?page=1">
                                <button class="home-filter__btn btn" style="background-color: orange;">Tìm</button>
                            </a>

                            <div class="home-filter__page">
                                <span class="home-filter__page-num">
                                    <span
                                        class="home-filter__page-current"><?php echo $page; ?></span>/<?php echo $totalPages; ?>
                                </span>

                                <div class="home-filter__page-control">
                                    <?php if ($page > 1): ?>
                                        <a href="user.php?page=<?php echo ($page - 1); ?>" class="home-filter__page-btn">
                                            <i class="home-filter__page-icon fa-solid fa-angle-left"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($page < $totalPages): ?>
                                        <a href="user.php?page=<?php echo ($page + 1); ?>" class="home-filter__page-btn">
                                            <i class="home-filter__page-icon fa-solid fa-angle-right"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

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
        <?php include_once ('layout/footer.php'); ?>
    </div>
</body>

</html>