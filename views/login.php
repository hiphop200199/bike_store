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
      <input
        type="password"
        placeholder="請輸入密碼..."
        pattern="[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}"
        title="須結合大小寫英文字母及數字以及特殊符號至少一個"
        required
        minlength="8"
      />
      <p class="message" ></p>
      <div id="buttons">
      <button type="submit">登入</button>
        <a href="/bike_store/views/register.php">註冊</a>
      </div>
      <a href="/bike_store/views/forgot-password.php">忘記密碼?</a>
    </form>
    <?php require_once '../components/footer.php'; ?>
   <?php require_once '../components/side-menu.php'; ?>
   <?php require_once '../components/to-top.php'; ?>
</div>
<script src="register.js"></script>
<?php require_once '../components/foot.php';?>