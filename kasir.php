<?php include '../config/database.php';
if(!isset($_SESSION['login'])) header("Location: login.php");

$items=mysqli_query($conn,"SELECT * FROM items");
$kategori=mysqli_query($conn,"SELECT * FROM categories");
?>

<style>
body{font-family:Arial;background:#f4f6f9;margin:0}
.container{display:flex}
.produk{width:70%;padding:10px}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(120px,1fr));gap:10px}
.item{background:#fff;padding:10px;border-radius:8px;text-align:center;cursor:pointer}
.item img{width:100%;height:80px;object-fit:cover}
.cart{width:30%;background:#fff;padding:10px}
</style>

<input type="text" id="search" placeholder="Cari..." onkeyup="searchItem()" style="width:100%;padding:10px">

<?php while($k=mysqli_fetch_array($kategori)){ ?>
<button onclick="filter('<?= $k['id']?>')"><?= $k['name']?></button>
<?php } ?>
<button onclick="filter('all')">Semua</button>

<div class="container">
<div class="produk">
<div class="grid">

<?php while($i=mysqli_fetch_array($items)){ ?>
<div class="item" data-nama="<?= strtolower($i['name'])?>" data-kategori="<?= $i['category_id']?>"
onclick="addCart(<?= $i['id']?>,'<?= $i['name']?>',<?= $i['price']?>)">
<img src="<?= $i['image']?>">
<?= $i['name']?><br><?= $i['price']?>
</div>
<?php } ?>

</div>
</div>

<div class="cart">
<h3>Cart</h3>
<div id="list"></div>
Total: <span id="total">0</span>

<form method="POST" action="../proses/checkout.php">
<input type="hidden" name="cart_data" id="cart_data">
<button onclick="prepare()">Checkout</button>
</form>
</div>
</div>

<script>
let cart=[];

function addCart(id,name,price){
let f=cart.find(i=>i.id==id);
if(f){f.qty++;f.subtotal=f.qty*price;}
else{cart.push({id,name,price,qty:1,subtotal:price});}
render();
}

function render(){
let html="";let t=0;
cart.forEach(i=>{
html+=i.name+" x"+i.qty+"<br>";
t+=i.subtotal;
});
document.getElementById('list').innerHTML=html;
document.getElementById('total').innerText=t;
}

function prepare(){
document.getElementById('cart_data').value=JSON.stringify(cart);
}

function searchItem(){
let val=document.getElementById('search').value.toLowerCase();
document.querySelectorAll('.item').forEach(i=>{
i.style.display=i.dataset.nama.includes(val)?'block':'none';
});
}

function filter(k){
document.querySelectorAll('.item').forEach(i=>{
if(k=='all'){i.style.display='block'}
else{i.style.display=(i.dataset.kategori==k)?'block':'none'}
});
}
</script>
