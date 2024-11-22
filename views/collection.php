<?php
require_once "../components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <section id="breadcrumb">
   <a href="/bike_store">首頁</a>><a><?=htmlentities(strip_tags(trim( $_GET['type'])))  ;?></a>
   </section>
   
    <div id="collection-layout">
    <section id="order-and-type">
    <h2>排列方式</h2>
    <select name="order-mode" id="">
        <option value="date-desc">日期,從新到舊</option>
        <option value="date-asc">日期,從舊到新</option>
        <option value="price-desc">價錢,從高到低</option>
        <option value="price-asc">價錢,從低到高</option>
    </select>
    <h2 class="type">類別</h2>
    <a href="/bike_store/views/collection.php?type=New Arrivals">New Arrivals</a>
    <a href="/bike_store/views/collection.php?type=熱門商品">熱門商品</a>
    <a href="/bike_store/views/collection.php?type=QIANT">QIANT</a>
    <a href="/bike_store/views/collection.php?type=VMX">VMX</a>
    <a href="/bike_store/views/collection.php?type=城市車">城市車</a>
    <a href="/bike_store/views/collection.php?type=摺疊車">摺疊車</a>
    <a href="/bike_store/views/collection.php?type=越野車">越野車</a>
    <a href="/bike_store/views/collection.php?type=公路車">公路車</a>
    </section>
   <section id="cards-render"> <h1 class="title"><?=htmlentities(strip_tags(trim( $_GET['type'])))  ;?></h1>
   <section class="cards-container">
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/product.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/collection/products.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   
   </section></section>
  
    </div>
   
  
  


   <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/side-menu.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>


<script src="index.js"></script>
<?php require_once '../components/foot.php'; ?>