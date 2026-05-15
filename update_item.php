<?php include '../config/database.php';
mysqli_query($conn,"UPDATE items SET name='$_POST[name]', price='$_POST[price]', stock='$_POST[stock]', category_id='$_POST[category_id]' WHERE id='$_POST[id]'");
header('Location: ../pages/items.php');
