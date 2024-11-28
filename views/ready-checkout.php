<?php
require_once "../components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
?>
<div id="layout">
    <?php require_once '../components/header.php'; ?>

    <main>
        <section class="center-layout">
            <h1>結帳</h1>
            <section id="cart-items">
            </section>
            <label for=""><input type="checkbox" name="" id="">同收件人</label>
            <input type="text" name="" id="" placeholder="請輸入收件人姓名">
            <input type="text" name="" id="" placeholder="請輸入收件人電話">
            <input type="text" name="" id="" placeholder="請輸入收件人地址">
            <button>立即下單</button>
        </section>
    </main>








    <?php require_once '../components/footer.php'; ?>
    <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>


<?php require_once '../components/foot.php'; ?>