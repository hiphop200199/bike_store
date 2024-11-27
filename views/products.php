<?php
require_once "../components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
require_once "../controllers/product.php";
$product = new Product($conn);
$response =  $product->getProduct();
$data = $response['data'];
$collection = $response['collection'];

?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <section id="breadcrumb">
      <a href="/bike_store">首頁</a>><a href="/bike_store/views/collection.php?<?= $collection==='QIANT'||$collection==='VMX'?'company='.$collection:'type='.$collection;?>&order=date-desc&page=1"><?= htmlentities(strip_tags(trim($_GET['collection']))); ?></a>><a><?= htmlentities(strip_tags(trim($data['name']))); ?></a>
   </section>

   <div id="products-layout">
      <img src="<?= htmlentities($data['image_source']);?>" id="product-img" alt="">
      <section id="text">
         <h1><?= htmlentities($data['name']);?></h1>
         <p>NT$ <strong><?= htmlentities($data['price']);?></strong></p>
         <label for="" id="amount">數量：<input type="number" value="1" min="1"></label>
         <section id="buttons">
            <button id="purchase-directly">立即購買</button>
            <button id="add-cart">加入購物車</button>
         </section>
      </section>
   </div>
   <p id="introduction">
   <?= htmlentities($data['introduction']);?>
   </p>
   <h2 class="title">猜你喜歡</h2>
   <section class="cards-container">

      <div class="card">
         <a href=""><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
         <a href="">
            <p class="name">Lorem, ipsum.</p>
            <p class="price">NT$ 115</p>
         </a>
      </div>
      <div class="card">
         <a href=""><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
         <a href="">
            <p class="name">Lorem, ipsum.</p>
            <p class="price">NT$ 115</p>
         </a>
      </div>
      <div class="card">
         <a href=""><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
         <a href="">
            <p class="name">Lorem, ipsum.</p>
            <p class="price">NT$ 115</p>
         </a>
      </div>
      <div class="card">
         <a href=""><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
         <a href="">
            <p class="name">Lorem, ipsum.</p>
            <p class="price">NT$ 115</p>
         </a>
      </div>


   </section>


   <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>


<?php require_once '../components/foot.php'; ?>