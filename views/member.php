<?php
if(session_status()!==PHP_SESSION_ACTIVE){
  session_start();
}
require_once "../components/head.php";
require_once "../controllers/auth.php";
require_once "../controllers/order.php";
if(!$_SESSION['user_id']){
  header('Location:/bike_store/index.php');
}
$auth = new Auth($conn);
$response = $auth->getUser();
$name = $response['name'];
$email = $response['email'];
$tel = $response['phone'];
$address = $response['address'];
$auth = null;
$order = new Order($conn);
$response = $order->getOrders();
$data = $response['data'];
$order = null;
?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <main>
    <section class="center-layout">
    <h1>會員資料</h1>
    <section id="info">
      <button id="start-edit">編輯</button>
      <label for=""
        >姓名：<input type="text" value="<?=htmlspecialchars($name)?>" name="" id="" disabled
      /></label>
      <label for=""
        >信箱：<input type="email" value="<?=htmlspecialchars($email)?>" name="" id="" disabled
      /></label>
      <label for=""
        >電話：<input type="tel" value="<?=htmlspecialchars($tel)?>" class="changable" id="" disabled
      /></label>
      <label for=""
        >地址：<input type="text" value="<?=htmlspecialchars($address)?>" class="changable" id="" disabled
      /></label>
      <section id="confirm-or-cancel">
        <button id="confirm-edit">確認</button>
      </section>
    
     
    </section>
    <h1>訂單資料</h1>
    <section id="orders">     
    <section class="cards-container">
   <?php foreach ($data as $key => $item) :;?>
   <div class="card order" id="">
    <span>訂單編號：<?=htmlspecialchars($item['id']);?></span>
    <span>付款方式：<?=htmlspecialchars($item['payment']);?></span>
    <span>付款狀態：<?=htmlspecialchars($item['payment_status']);?></span>
    <span>總金額：<?=htmlspecialchars($item['total_price']);?></span>
    <span>發票：<?=htmlspecialchars($item['invoice']);?></span>
    <span>收件人姓名：<?=htmlspecialchars($item['receiver_name']);?></span>
    <span>收件人電話：<?=htmlspecialchars($item['receiver_tel']);?></span>
    <span>收件人地址：<?=htmlspecialchars($item['receiver_address']);?></span>
    <span>取貨方式：<?=htmlspecialchars($item['pickup']);?></span>
    <span>出貨狀態：<?=htmlspecialchars($item['pickup_status']);?></span>
    <a href="/bike_store/views/order-detail.php?orderID=<?=htmlspecialchars($item['id'])?>">訂單明細：→</a>
   </div>
  <?php endforeach; ?>
   </section>
      </section>
    </section>
   
   
   </main>
  
   <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>
<script src="../member.js"></script>

<?php require_once '../components/foot.php'; ?>


