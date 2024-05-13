<?php
session_start();
include_once ('../connection.php');

$username = $_SESSION['username'];

// Fetch the user's cart items
$sql = "SELECT * FROM cart INNER JOIN sanpham ON cart.product_id = sanpham.product_id WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$total_price = 0;

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total_price += $row['price'] * $row['quantity'];
}

// At this point, $cart_items contains the items in the user's cart, and $total_price contains the total price

// You would then display a form for the user to enter their shipping and payment details, and when that form is submitted, you would process the payment and update the database

// For example, here's a very basic form:
?>
<form action="process_payment.php" method="post">
    <h2>Checkout</h2>
    <p>Total price: <?php echo $total_price; ?></p>
    <label for="address">Shipping address:</label>
    <input type="text" id="address" name="address">
    <label for="card_number">Card number:</label>
    <input type="text" id="card_number" name="card_number">
    <input type="submit" value="Submit">
</form>