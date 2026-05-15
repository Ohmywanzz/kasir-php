<?php include '../config/database.php';
$id=$_GET['id'];
$item=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM items WHERE id='$id'"));
$cat=mysqli_query($conn,"SELECT * FROM categories");
?>
<form method="POST" action="../proses/update_item.php">
<input type="hidden" name="id" value="<?= $item['id']?>">
<input name="name" value="<?= $item['name']?>" placeholder="Nama"><br><br>
<input name="price" value="<?= $item['price']?>" placeholder="Harga"><br><br>
<input name="stock" value="<?= $item['stock']?>" placeholder="Stok"><br><br>
<select name="category_id">
<?php while($c=mysqli_fetch_array($cat)){ ?>
<option value="<?= $c['id']?>" <?= $c['id']==$item['category_id']?'selected':'' ?>><?= $c['name']?></option>
<?php } ?>
</select><br><br>
<button>Update</button>
</form>
