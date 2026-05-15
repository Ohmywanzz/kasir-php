<?php include '../config/database.php';
mysqli_query($conn,"DELETE FROM items WHERE id='$_GET[id]'");
header('Location: ../pages/items.php');
