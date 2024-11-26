<?php
require_once "../components/head.php";
/* require_once "../controllers/product.php";
$product = new Product($conn);
$response =  $product->getProducts();
$data = $response['data'];
$page_now = $response['page_now'];
$pages = $response['pages'];
$order = $response['order'];
$keyword = $response['keyword']??null;
$type = $response['type']??null;
$company = $response['company']??null; */

?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <main>
    <section class="center-layout">
    <h1>會員資料</h1>
    <section id="info">
      <button id="start-edit">編輯</button>
      <label for=""
        >姓名：<input type="text" value="name" name="" id="" disabled
      /></label>
      <label for=""
        >信箱：<input type="email" value="email" name="" id="" disabled
      /></label>
      <label for=""
        >電話：<input type="tel" value="phone" class="changable" id="" disabled
      /></label>
      <label for=""
        >地址：<input type="text" value="address" class="changable" id="" disabled
      /></label>
      <section>
        <button id="cancel-edit">取消</button>
        <button id="edit-user">確認</button>
      </section>
    
     
    </section>
    <h1>訂單資料</h1>
    <section id="orders">     
    <section class="cards-container">
   
   <div class="card order" id="">
    <span>訂單編號：5</span>
    <span>付款方式：5</span>
    <span>付款狀態：5</span>
    <span>總金額：5</span>
    <span>發票：5</span>
    <span>收件人姓名：5</span>
    <span>收件人電話：5</span>
    <span>收件人地址：5</span>
    <span>取貨方式：5</span>
    <span>出貨狀態：5</span>
    <a href="">訂單明細：5</a>
   </div>
  
   </section>
      </section>
    </section>
   
   
   </main>
  
   <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>
<script src="../layout.js"></script>
<script src="../cart.js"></script>
<?php require_once '../components/foot.php'; ?>


