<?php
if (isset($_GET['search'])) {
    $searchKeyword = $_GET['search'] ?? '';

    if (!empty($searchKeyword)) {
        $stmt = $mysqli->prepare("SELECT * FROM sanpham WHERE name LIKE ?");
        $searchKeyword = "%$searchKeyword%";
        $stmt->bind_param("s", $searchKeyword);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $products = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Không có sản phẩm nào.";
        }

        $stmt->close();
    } else {
        echo "Từ khóa tìm kiếm không được để trống.";
    }
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