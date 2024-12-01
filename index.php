<?php
require_once "./components/head.php";
require_once __DIR__.'/controllers/product.php';
$product = new Product($conn);
$response = $product->getEightNewProducts();
$data = $response['data'];
$product = null;
?>
<div id="layout">
   <?php require_once './components/header.php'; ?>
   <section id="image-slider">
      <img  src="/bike_store/assets/mountain-biking-95032_1280.jpg"  alt="" >
      <img  src="/bike_store/assets/man-3704749_1280.jpg"  alt="" >
      <img   src="/bike_store/assets/france-1049333_1280.jpg"  alt="" >
      <img  src="/bike_store/assets/autumn-7547050_1280.jpg"  alt="" >
      <img   src="/bike_store/assets/bicycle-1839005_1280.jpg"  alt="" >
   </section>
   <h1 class="title">New Arrivals</h1>
   <section class="cards-container">
      <?php foreach ($data as $key => $item):;?>
   <div class="card">
      <a href="/bike_store/views/products.php?collection=New Arrivals&productID=<?=htmlentities($item['id']) ;?>"><img src="<?=htmlspecialchars($item['image_source']);?>" alt=""></a>
      <a href="/bike_store/views/products.php?collection=New Arrivals&productID=<?=htmlentities($item['id']) ;?>">
         <p class="name"><?=htmlspecialchars($item['name']);?></p>
         <p class="price">NT$ <?=htmlspecialchars($item['price']);?></p>
      </a>
   </div>
   <?php endforeach;?>
   </section>
   <h1 class="title">熱門商品</h1>
   <div id="popular-items-slider">
      <button id="slide-left">
         <img src="/bike_store/assets/left-arrow.png" alt="" />
      </button>
      <div id="slider">
         <div id="cards">
         <?php foreach ($data as $key => $item):;?>
            <div
               class="card">
               <a href="/bike_store/views/products.php?collection=New Arrivals&productID=<?=htmlentities($item['id']) ;?>"><img class="cover" src="<?=htmlspecialchars($item['image_source']);?>"/>
                
               </a>
               <p class="name"><?=htmlspecialchars($item['name']);?></p>
               <p class="price">NT$ <?=htmlspecialchars($item['price']);?></p>
            </div>
            <?php endforeach;?>
         </div>
      </div>
      <button id="slide-right">
         <img src="/bike_store/assets/right-arrow.png" alt="" />
      </button>
   </div>


   <?php require_once './components/footer.php'; ?>
  
   <?php require_once './components/to-top.php'; ?>
</div>
<?php require_once './components/side-menu.php'; ?>
<?php require_once './components/side-cart.php'; ?>
<script src="slider.js"></script>
<script src="layout.js"></script>
<script src="cart.js"></script>
</body>
</html>