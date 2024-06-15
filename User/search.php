<?php
if (isset($_GET['search'])) {
   
} else {
    $sql = "SELECT * FROM sanpham
        LEFT JOIN phanloai ON sanpham.category_id = phanloai.category_id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $products = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Không có sản phẩm nào.";
    }
}

?>