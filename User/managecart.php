<?php
include '../connection.php'; // Kết nối đến cơ sở dữ liệu
// Validate session on each page
if (!isset($_SESSION['username'])) {
    // Redirect to login page or other appropriate action
    header("Location: Sign-in.php");
    exit();
}


// Thêm giỏ hàng mới cho người dùng hiện tại
function addNewCart($username)
{
    global $mysqli;
    $insert_cart_query = "INSERT INTO cart (username) VALUES (?)";
    $stmt = mysqli_prepare($mysqli, $insert_cart_query);
    mysqli_stmt_bind_param($stmt, "i", $username);
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

// Lấy ID giỏ hàng của người dùng
function getCartIdByUserId($username)
{
    global $mysqli;
    $cart_id = null;
    $select_cart_query = "SELECT cart_id FROM cart WHERE username = ?";
    $stmt = mysqli_prepare($mysqli, $select_cart_query);
    mysqli_stmt_bind_param($stmt, "i", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $cart_id = $row['cart_id'];
    }
    return $cart_id;
}

// Thêm một mục vào giỏ hàng
function addItemToCart($username, $product_id, $quantity)
{
    global $mysqli;

    // Kiểm tra xem đã có giỏ hàng cho người dùng chưa
    $cart_id = getCartIdByUserId($username);

    // Nếu không có giỏ hàng, thêm một giỏ hàng mới
    if ($cart_id === null) {
        // Thêm giỏ hàng mới
        if (!addNewCart($username)) {
            // Nếu thêm giỏ hàng mới không thành công, return false
            return false;
        }
        $cart_id = getCartIdByUserId($username);
    }

    // Thêm một mục vào giỏ hàng
    $insert_item_query = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($mysqli, $insert_item_query);
    mysqli_stmt_bind_param($stmt, "iii", $cart_id, $product_id, $quantity);
    if (mysqli_stmt_execute($stmt)) {
        return true;
    } else {
        return false;
    }
}

// Lấy tất cả các mục trong giỏ hàng của một người dùng
function getAllCartItems($username)
{
    global $mysqli;
    $select_items_query = "SELECT cart_items.*, products.name AS product_name, products.price, products.image AS product_img FROM cart_items INNER JOIN products ON cart_items.product_id = products.product_id INNER JOIN cart ON cart_items.cart_id = cart.cart_id WHERE cart.username = ?";
    $stmt = mysqli_prepare($mysqli, $select_items_query);
    mysqli_stmt_bind_param($stmt, "i", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $cart_items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
    }
    return $cart_items;
}

// Lấy tổng số lượng sản phẩm trong giỏ hàng của một người dùng
function getTotalCartQuantity($username)
{
    global $mysqli;
    $total_quantity = 0;

    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (isset($username)) {
        $select_quantity_query = "SELECT SUM(quantity) AS total_quantity FROM cart_items INNER JOIN cart ON cart_items.cart_id = cart.cart_id WHERE cart.username = ?";
        $stmt = mysqli_prepare($mysqli, $select_quantity_query);
        mysqli_stmt_bind_param($stmt, "i", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $total_quantity = $row['total_quantity'];
        }
    }

    return $total_quantity;
}
$total_quantity = getTotalCartQuantity($username);

function getTotalCartPrice($username)
{
    $cart_items = getAllCartItems($username);
    $total_price = 0;
    foreach ($cart_items as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
    return $total_price;
}

// Xử lý các hành động thêm giỏ hàng và thêm mục vào giỏ hàng từ form hoặc các sự kiện khác ở đây
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Ví dụ: Thêm giỏ hàng mới nếu người dùng chưa có
    $existing_cart_query = "SELECT * FROM cart WHERE username = ?";
    $stmt = mysqli_prepare($mysqli, $existing_cart_query);
    mysqli_stmt_bind_param($stmt, "i", $username);
    mysqli_stmt_execute($stmt);
    $existing_cart_result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($existing_cart_result) == 0) {
        addNewCart($username);
    }

    // Ví dụ: Thêm một mục vào giỏ hàng
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $username = $_SESSION['username'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        if (addItemToCart($username, $product_id, $quantity)) {
            // Nếu thêm vào giỏ hàng thành công, reload trang để đồng bộ cơ sở dữ liệu
            echo '<script>window.location.reload();</script>';
            exit; // Dừng việc thực thi mã PHP tiếp theo
        } else {
            echo "failed"; // Trả về 'failed' nếu có lỗi xảy ra
        }
    }

    // Lấy tất cả các mục trong giỏ hàng của người dùng
    $cart_items = getAllCartItems($username);

    // Tính tổng giá trị của giỏ hàng
    $total_cart_price = getTotalCartPrice($username);

    // Hiển thị các mục trong giỏ hàng ở đây
    if (!empty($cart_items)) {
        foreach ($cart_items as $item) {
            // Hiển thị các mục trong giỏ hàng
        }
    } else {
    }

    // Hiển thị tổng giá trị của giỏ hàng

} else {
    $total_quantity = getTotalCartQuantity(null);

}

// Đóng kết nối
?>