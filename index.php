<?php
require_once "./components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
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
   <div class="card">
      <a href="/bike_store/views/products.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="/bike_store/views/products.php?item=25段變速車">
         <p class="name">Lorem, ipsum.</p>
         <p class="price">NT$ 115</p>
      </a>
   </div>
   <div class="card">
      <a href="/bike_store/views/products.php?item=25段變速車"><img src="/bike_store/assets/bicycle-1834265_1280.jpg" alt=""></a>
      <a href="/bike_store/views/products.php?item=25段變速車">
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
   <h1 class="title">熱門商品</h1>
   <div id="popular-items-slider">
      <button id="slide-left">
         <img src="/bike_store/assets/left-arrow.png" alt="" />
      </button>
      <div id="slider">
         <div id="cards">
            <div
               class="card">
               <a href="/bike_store/views/products.php?item=25段變速車">
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a href="/bike_store/views/products.php?item=25段變速車">
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a href="/bike_store/views/products.php?item=25段變速車">
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a href="/bike_store/views/products.php?item=25段變速車">
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a>
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a>
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a>
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
            <div
               class="card">
               <a>
                  <img class="cover" alt="" src="/bike_store/assets/bicycle-1834265_1280.jpg" />
               </a>
               <p class="title">Lorem, ipsum.</p>
               <p class="price">$115</p>
            </div>
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
<script src="index.js"></script>
<?php require_once './components/foot.php'; ?>