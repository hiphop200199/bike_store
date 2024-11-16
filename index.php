<?php
 require_once "./components/head.php";
 /*if($_GET) {
  header('Location:not-found.php');
 } */
?>
<div id="layout">
   <?php require_once './components/header.php'; ?>
  
      <img id="img-auto-slide" src="../assets/man-1690965_640.jpg" alt="" />
      
      //輪播圖
   //新到貨
   <h1>New Arrivals</h1>
   //熱門商品
   <h1>熱門商品</h1>
      <div id="new-items-slider">
         <button id="slide-left" @click="slide('left')" v-if="slideDistance > -1500">
            <img src="../assets/left-arrow.png" alt="" />
         </button>
         <div id="slider">
            <div id="cards" ref="cards">
               <div
                  class="product-card"
                  v-for="(card, index) in productStore.popularProducts"
                  :key="index">
                  <router-link :to="'detail/' + card.id">
                     <img class="product-cover" :src="card.image_source" alt="" />
                  </router-link>
                  <p class="product-title">{{ card.name }}</p>
                  <p class="product-price">${{ card.price }}元</p>
               </div>
            </div>
         </div>
         <button id="slide-right" @click="slide('right')" v-if="slideDistance < 0">
            <img src="../assets/right-arrow.png" alt="" />
         </button>
      </div>
   
  
   <?php require_once './components/footer.php'; ?>
   <?php require_once './components/side-menu.php'; ?>
   <?php require_once './components/to-top.php'; ?>
</div>


<script src="index.js"></script>
<?php require_once './components/foot.php'; ?>