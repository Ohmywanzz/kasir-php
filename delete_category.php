<?php include '../config/database.php';
mysqli_query($conn,"DELETE FROM categories WHERE id='$_GET[id]'");
header('Location: ../pages/categories.php');
