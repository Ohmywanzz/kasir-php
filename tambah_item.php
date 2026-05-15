<?php
include '../config/database.php';

$name=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$cat=$_POST['category_id'];

$barcode="BRG".rand(10000,99999);
$image="https://source.unsplash.com/300x300/?".urlencode($name);

mysqli_query($conn,"INSERT INTO items VALUES(NULL,'$name','$price','$stock','$barcode','$cat','$image')");

header("Location: ../pages/kasir.php");
