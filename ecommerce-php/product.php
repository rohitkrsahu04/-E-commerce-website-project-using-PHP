<?php 
include 'db.php';
session_start();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);

if (isset($_POST['add_to_cart'])) {
    $_SESSION['cart'][$id] = $product;
    header("Location: cart.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?></title>
</head>
<body>

<h2><?php echo $product['name']; ?></h2>
<img src="uploads/<?php echo $product['image']; ?>" width="200">
<p>Price: ₹<?php echo $product['price']; ?></p>
<p><?php echo $product['description']; ?></p>

<form method="POST">
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>

</body>
</html>
