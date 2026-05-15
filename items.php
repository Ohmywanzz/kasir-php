<?php include '../config/database.php';
if(!isset($_SESSION['login'])) header('Location: login.php');
$items=mysqli_query($conn,"SELECT items.*, categories.name as category FROM items LEFT JOIN categories ON categories.id=items.category_id ORDER BY items.id DESC");
?>
<!DOCTYPE html><html><head><title>CRUD Produk</title>
<style>
body{font-family:Arial;background:#f4f6f9;padding:20px}table{width:100%;background:#fff;border-collapse:collapse}th,td{padding:10px;border:1px solid #ddd}.btn{padding:8px 12px;background:#2563eb;color:#fff;text-decoration:none;border-radius:6px}.danger{background:#dc2626}.top{display:flex;gap:10px;margin-bottom:15px}
</style></head><body>
<h2>CRUD Produk</h2>
<div class='top'>
<a class='btn' href='tambah_item.php'>Tambah Produk</a>
<a class='btn' href='categories.php'>Kategori</a>
<a class='btn' href='kasir.php'>Kasir</a>
</div>
<table>
<tr><th>No</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Kategori</th><th>Aksi</th></tr>
<?php $n=1; while($i=mysqli_fetch_array($items)){ ?>
<tr>
<td><?= $n++ ?></td>
<td><?= $i['name'] ?></td>
<td>Rp <?= number_format($i['price']) ?></td>
<td><?= $i['stock'] ?></td>
<td><?= $i['category'] ?></td>
<td>
<a class='btn' href='edit_item.php?id=<?= $i['id']?>'>Edit</a>
<a class='btn danger' onclick="return confirm('Hapus data?')" href='../proses/delete_item.php?id=<?= $i['id']?>'>Hapus</a>
</td>
</tr>
<?php } ?>
</table></body></html>
