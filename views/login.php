<?php
 require_once "../components/head.php";


?>
<div id="layout">
<?php require_once '../components/header.php'; ?>
<main>
<form class="auth-related">
  <h1>歡迎</h1>
  <p>註冊或登入以繼續</p>
  <section id="mode-switch">
  <input type="radio" name="theme" id="register" />
<label for="register" class="register">註冊</label>
<input type="radio" name="theme" id="login" checked/>
<label for="login" class="login">登入</label>
  </section>
 
      <input type="text" name="name" class="register-related" placeholder="請輸入姓名..."  />
      <input type="email" name="email" placeholder="請輸入email..."   />
      <input
        type="password"
        placeholder="請輸入密碼..."
        name="password"
        title="須結合大小寫英文字母及數字以及特殊符號至少一個"     
      />
      <input
        type="password"
        class="register-related"
        placeholder="請確認密碼..."
        name="check-password"
        pattern="[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}"
        title="須結合大小寫英文字母及數字以及特殊符號至少一個"
      />
      <input type="tel" name="tel" class="register-related"  placeholder="請輸入電話..." />
      <input type="text" name="address" class="register-related"  placeholder="請輸入送貨地址..." />
      <p class="message" ></p>
      <div id="buttons">
      <button type="submit" class="register-related">繼續</button>
      <button type="submit" class="login-related">繼續</button>
      </div>
    </form>
</main>

    <?php require_once '../components/footer.php'; ?>
  
   <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>

<script src="../auth.js"></script>
<?php require_once '../components/foot.php';?>