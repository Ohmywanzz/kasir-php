<?php
include '../config/database.php';
$u=$_POST['username'];
$p=$_POST['password'];

$q=mysqli_query($conn,"SELECT * FROM users WHERE username='$u' AND password='$p'");
if(mysqli_num_rows($q)>0){
$_SESSION['login']=true;
header("Location: ../pages/kasir.php");
}else{
echo "Login gagal";
}
