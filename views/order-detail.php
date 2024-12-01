<?php
if(session_status()!==PHP_SESSION_ACTIVE){
    session_start();
}
require_once "../components/head.php";
require_once "../controllers/order.php";
if(!$_SESSION['user_id']){
    header('Location:/bike_store/index.php');
}
$order = new Order($conn);
$response = $order->getOrder();
$data = $response['data'];
$order = null;
?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <main>
    <section class="center-layout">
    <h1>訂單明細</h1>
    <table>
        <thead>
            <tr>
                <th>編號</th>
                <th>商品名稱</th>
                <th>購買數量</th>
                <th>商品價格</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $item) :;?>
            <tr>
                <td><?=htmlspecialchars($item['id'])?></td>
                <td><?=htmlspecialchars($item['name'])?></td>
                <td><?=htmlspecialchars($item['amount'])?></td>
                <td><?=htmlspecialchars($item['price'])?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </section>
 
    
   </main>
  
   <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>

<?php require_once '../components/foot.php'; ?>


