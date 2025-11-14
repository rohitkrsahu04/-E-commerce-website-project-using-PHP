<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
</head>
<body>

<h1>Cart Items</h1>

<?php
$total = 0;

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        echo "
        <div>
            <h3>".$item['name']."</h3>
            <p>₹".$item['price']."</p>
        </div>";
        $total += $item['price'];
    }

    echo "<h2>Total: ₹$total</h2>";
    echo "<a href='checkout.php'>Proceed to Checkout</a>";

} else {
    echo "<p>No items in cart</p>";
}
?>

</body>
</html>
