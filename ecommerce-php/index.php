<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Online Store</h1>

<div class="products">

<?php
$result = mysqli_query($conn, "SELECT * FROM products");
while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <div class='product'>
        <img src='uploads/".$row['image']."' width='150'>
        <h3>".$row['name']."</h3>
        <p>₹".$row['price']."</p>
        <a href='product.php?id=".$row['id']."'>View</a>
    </div>
    ";
}
?>

</div>
</body>
</html>
