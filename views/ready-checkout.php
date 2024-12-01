<?php
require_once "../components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
?>
<div id="layout">
    <?php require_once '../components/header.php'; ?>

    <main>
        <section class="center-layout ready-checkout">
            <h1>結帳</h1>
            <section id="cart-items">
            </section>
            <label for="" id="same"><input type="checkbox" name="" id="receiver-same-with-member"><span>同收件人</span></label>
            <input type="text" name="receiver-name" id="" placeholder="請輸入收件人姓名">
            <input type="text" name="receiver-tel" id="" placeholder="請輸入收件人電話">
            <input type="text" name="receiver-address" id="" placeholder="請輸入收件人地址">
            <button id="start-checkout">立即下單</button>
        </section>
    </main>








    <?php require_once '../components/footer.php'; ?>
    <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>


<?php require_once '../components/foot.php'; ?>