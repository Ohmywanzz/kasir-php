<?php
include '../config/database.php';
$cart=json_decode($_POST['cart_data'],true);

$total=0;
foreach($cart as $c){$total+=$c['subtotal'];}

mysqli_query($conn,"INSERT INTO transactions(total) VALUES('$total')");
echo "Sukses";
