<?php
require_once "../components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <section id="breadcrumb">
   <a href="/bike_store">首頁</a>><a><?=htmlentities(strip_tags(trim( $_GET['item'])))  ;?></a>
   </section>
   
  <div id="products-layout">
   <img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt="">
   <section id="text">
      <h1>商品名稱</h1>
      <p>NT$ 115</p>
      <label for="" id="amount">數量：<input type="number" name="" id="" min="1"></label>
      <section id="buttons">
         <button id="purchase-directly">立即購買</button>
         <button id="add-cart">加入購物車</button>
      </section>
   </section>
  </div>
   <p id="introduction">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolor, illum atque perferendis excepturi ratione blanditiis!
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
   <?php require_once '../components/side-menu.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>


<script src="index.js"></script>
<?php require_once '../components/foot.php'; ?>