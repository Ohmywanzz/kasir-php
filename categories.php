<?php include '../config/database.php';
if(isset($_POST['name'])) mysqli_query($conn,"INSERT INTO categories(name) VALUES('$_POST[name]')");
$cats=mysqli_query($conn,"SELECT * FROM categories");
?>
<h2>CRUD Kategori</h2>
<form method="POST">
<input name="name" placeholder="Nama kategori">
<button>Tambah</button>
</form><br>
<table border="1" cellpadding="10">
<tr><th>Nama</th><th>Aksi</th></tr>
<?php while($c=mysqli_fetch_array($cats)){ ?>
<tr>
<td><?= $c['name']?></td>
<td><a onclick="return confirm('Hapus kategori?')" href="../proses/delete_category.php?id=<?= $c['id']?>">Hapus</a></td>
</tr>
<?php } ?>
</table>
