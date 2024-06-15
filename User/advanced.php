<?php
include ("../connection.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Construct SQL query based on search parameters
    $sql = "SELECT * FROM sanpham LEFT JOIN phanloai ON sanpham.category_id = phanloai.category_id WHERE 1";

    // Add conditions based on selected category, product name, and price range
    if (!empty($_GET['product_name'])) {
        $product_name = $_GET['product_name'];
        $sql .= " AND name LIKE '%$product_name%'";
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

    // Execute the query
    $result = mysqli_query($mysqli, $sql);

    // Check if the query executed successfully
    if ($result) {
        // Check if there are any matching products
        if ($result->num_rows > 0) {
            // Fetch all rows from the result set as an associative array
            $products = $result->fetch_all(MYSQLI_ASSOC);

            // Free the result set
            mysqli_free_result($result);


        } else {
            echo "No products found matching the search criteria.";
        }
    } else {
        // Handle the case where the query fails
        echo "Error executing query: " . mysqli_error($mysqli);
    }

    // Close the database connection
    mysqli_close($mysqli);
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