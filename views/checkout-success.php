<?php
require_once "../components/head.php";
/*if($_GET) {
  header('Location:not-found.php');
 } */
?>
<div id="layout">
    <?php require_once '../components/header.php'; ?>
  
        <section class="checkout">
        <h1>結帳成功!</h1>
        <img src="../assets/man-3704749_1280.jpg" alt="" />
       <p>Thank you for your order,<?=$_SESSION['user'];?>!</p>
        </section>
    
 
    <?php require_once '../components/footer.php'; ?>
    
    <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>

<script src="../layout.js"></script>
<script src="../cart.js"></script>
<?php require_once '../components/foot.php'; ?>