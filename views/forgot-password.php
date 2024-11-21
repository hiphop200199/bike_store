<?php
 require_once "../components/head.php";
/*  if($_GET) {
      header('Location:not-found.php');
} */
?>
<div id="layout">
<?php require_once '../components/header.php'; ?>
<form class="auth-related">
      <input type="email" placeholder="請輸入email..."  required maxlength="255" />
      <p class="message" ></p>
        <button type="submit">送出</button>
    </form>
    <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/side-menu.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>
<script src="register.js"></script>
<?php require_once '../components/foot.php';?>