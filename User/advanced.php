<?php
include("../connection.php");
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // Construct SQL query based on search parameters
        $sql = "SELECT * FROM sanpham LEFT JOIN phanloai ON sanpham.category_id = phanloai.category_id WHERE 1;     ";

        // Add conditions based on selected category, product name, and price range
        if (!empty($_GET['name'])) {
            $product_name = $_GET['product_name'];
            $sql .= " AND product_name LIKE '%$product_name%'";
        }

        if (!empty($_GET['category'])) {
            $category = $_GET['category'];
            $sql .= " AND category_name = '$category'";
        }

        if (!empty($_GET['min_price'])) {
            $min_price = $_GET['min_price'];
            $sql .= " AND price >= $min_price";
        }

        if (!empty($_GET['max_price'])) {
            $max_price = $_GET['max_price'];
            $sql .= " AND price <= $max_price";
        }

        // Execute the query and display search results
        $result = mysqli_query($mysqli, $sql);

    }
    ?>