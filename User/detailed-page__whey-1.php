<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once ('layout/head.php'); ?>
    <link rel="stylesheet" href="main_detailed_page.php">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <!-- <li class="header__navbar-item">
                            Hotline: 091.901.3030
                        </li>
                        <li class="header__navbar-item">
                            Ghé fanpage
                            <a href="" class="header__navbar-icon-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>  
                        </li> -->
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
                                <span class="user-header__profile-name">Adu Ăng Minh</span>
                            </a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="./index.php" class="header__navbar-item-link">Đăng xuất</a>
                        </li>
                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header__logo">
                        <img src="./Ảnh logo/logo 1_1615870157.png" alt="" class="header__logo-img">
                    </div>

                    <div class="header__search">
                        <input type="text" id="inputField" class="header__search-input"
                            placeholder="Nhập để tìm kiếm sản phẩm">
                        <div class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>

                    <div class="header__cart">
                        <a href="./cart.php"><i class="header__cart-icon fa-solid fa-cart-shopping"></i></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="app__container-order">
            <div class="grid">
                <div class="grid__row app__content">
                    <div class="progress-bar">
                        <div class="progress-bar__main-content">
                            <a class = "main-content__item" href="./user.php"><b>Trang chủ</b></a>
                            <a class = "main-content__item" href="./userWhey.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>Whey Protein</b>
                            </a>
                            <a class = "main-content__item" href="./detailed-page__whey-1.php">
                                <i class="fa-solid fa-arrow-right"></i>
                                <b>BiotechUSA Hydro Whey Zero 4LBS (1,816Kg)</b>
                            </a>
                        </div>
                    </div>
                    <div class="grid__column-5">
                        <img src="./Ảnh sản phẩm chi tiết/Whey - Ảnh sp chi tiết/upl_hydro_whey_zero_1661334844_image_1661334844.jpg" alt="" class="item-image">
                    </div>
                    <div class="grid__column-7">
                        <div class="order">
                            <div class="order__item-name">
                                BiotechUSA Hydro Whey Zero 4LBS (1,816Kg)
                            </div>
                            <div class="order__item-price">
                                <b>1.450.000đ</b>
                            </div>
                            <div class="order__transfer">
                                <div class="order__transfer-block">Vận chuyển</div>
                                <div class="order__transfer-detail-info">
                                    <div class="detail-info__freeship">
                                        <div class="freeship-icon">
                                            <img src="./Ảnh sản phẩm chi tiết/d9e992985b18d96aab90969636ebfd0e.png" alt="" class="freeship-icon__css">
                                        </div>
                                        <div class="freeship-info">Miễn phí vận chuyển</div>
                                    </div>
                                    <div class="detail-info__transfer-method">
                                        <div class="transfer-icon">
                                            <i class="fa-solid fa-truck transfer-icon__css"></i>
                                        </div>
                                        <div class="transfer-info">
                                            <div class="transfer-info__where">
                                                <div class="transfer-info__where-text">Vận chuyển tới</div>
                                                <div class="transfer-info__where-button"></div>
                                            </div>
                                            <div class="transfer-info__transfer-fee">
                                                <div class="transfer-info__transfer-fee-text">Phí vận chuyển</div>
                                                <div class="transfer-info__transfer-fee-button"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="order__product-classification">
                                <div class="product-classification__text">Hương vị</div>
                                <div class="product-classification__aroma">
                                    <button class="btn__choose product-classification__aroma-kind">Milk Chocolate</button>
                                    <button class="btn__choose product-classification__aroma-kind">Cookies & Cream</button>
                                </div>
                            </div> -->
                            <div class="order__number-products">
                                <div class="number-products__text">Số lượng</div>
                                <div class="number-products__btn">
                                    <button onclick="totalClick(-1)" class="btn__choose minus">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <button id="totalClicks" class="btn__choose num">1</button>
                                    <button onclick="totalClick(1)" class="btn__choose plus">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="order__order-buy">
                                <a href="./cart.php">
                                    <button class="btn__choose order-buy__btn-addToCast">
                                        <i class="fa-solid fa-cart-shopping cart-shopping__css"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                </a>
                                <a href="./paymentForm.php">
                                    <button class="btn__choose order-buy__btn-buy">Mua hàng</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="app__container-info-describtion">
                        <div class="info-product">
                            <div class="info-product__title">
                                <h2>Thông tin sản phẩm</h2>
                            </div>
                            <div class="info-product__main-content">
                                <div class="main-content__product">
                                    <div class="main-content__title title__add-css-1">
                                        <b>Serving Size</b>
                                    </div>
                                    <div class="main-content__detail">6 scoops</div>
                                </div>
                                <div class="main-content__product">
                                    <div class="main-content__title">
                                        <b>Servings Per Container</b>
                                    </div>
                                    <div class="main-content__detail">khoảng 16</div>
                                </div>
                                <div class="main-content__product">
                                    <div class="main-content__title title__add-css-2">
                                        <b>Xuất xứ</b>
                                    </div>
                                    <div class="main-content__detail">USA</div>
                                </div> 
                            </div>
                        </div>
                        <div class="describtion-product">
                            <h2>Hàm lượng dinh dưỡng tuyệt vời</h2>
                            <p>
                                - Cung cấp nguồn calo khổng lồ 1.350 Kcal/ 1serving 
                                <br>
                                - 50g protein - Ma trận cao cấp bao gồm cả dạng hấp thụ nhanh và chậm
                                <br>
                                - 11g BCAA + 250g carb phức + Bổ sung CLA
                                <br>
                                - Nổi bật 23g EAAs – axit amin thiết yếu mà cơ thể không tự sản sinh
                            </p>
                            <h2>Ưu thế vượt trội của Up Your Mass XXXL 1350</h2>
                            <p>
                                - 1350 calo khi không pha cùng sữa thực sự là một thách thức không nhỏ đối với các sản phẩm cạnh tranh. Và với hàm lượng cao như vậy, tăng cân là chuyện tất yếu.
                                <br>
                                - Bên cạnh đó, sự kết hợp giữa Protein và BCAA hàm lượng cao có trong Up Your Mass XXXL 1350 giúp phục hồi cơ bắp nhanh chóng, đồng thời tăng tổng hợp protein . Khi tốc độ tổng hợp > tốc độ phân hủy, dĩ nhiên, bạn sẽ có được sự phát triển cơ bắp.
                                <br>
                                - Up Your Mass XXXL 1350 chứa 11g axit amin chuỗi nhánh (đây là các axit amin thiết yếu gồm Valine, Isoleucine và Leucine) =>> kích thích tổng hợp protein cơ bắp hơn loại protein bình thường.
                                <br>
                                - Đặc biệt, khi sự bổ sung EAAs đang tạo nên một cơn sốt thực thụ trong làng gym thì khá khen cho MHP đã rất thức thời trong cuộc đua dinh dưỡng này.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once ('layout/footer.php'); ?>
    </div>
</body>

</html>