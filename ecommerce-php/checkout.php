<?php
include 'db.php';
session_start();

if (isset($_POST['place_order'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $total = $_POST['total'];

    mysqli_query($conn, "INSERT INTO orders (name, email, address, total_price)
                         VALUES ('$name', '$email', '$address', '$total')");

    unset($_SESSION['cart']);

    echo "<h2>Order Placed Successfully!</h2>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>

<h2>Checkout</h2>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Address: <textarea name="address" required></textarea><br><br>
    Total Amount: 
    <input type="text" name="total" readonly value="<?php 
        $sum = 0; 
        foreach ($_SESSION['cart'] as $item) {
            $sum += $item['price'];
        }
        echo $sum;
    ?>">
    <br><br>

    <button type="submit" name="place_order">Place Order</button>
</form>

</body>
</html>
