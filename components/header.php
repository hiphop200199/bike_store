<?php 
if(session_status()!==PHP_SESSION_ACTIVE){
  session_start();
}
?>
<header>
  <a href="/bike_store"><img src="/bike_store/assets/bicycle-rider.png" alt="logo" /></a>
  <section id="filter-link">
  <a href="/bike_store/views/collection.php?type=New Arrivals&order=date-desc&page=1">New Arrivals</a>
    <a href="/bike_store/views/collection.php?type=熱門商品&order=date-desc&page=1">熱門商品</a>
    <a href="/bike_store/views/collection.php?company=QIANT&order=date-desc&page=1">QIANT</a>
    <a href="/bike_store/views/collection.php?company=VMX&order=date-desc&page=1">VMX</a>
    <a href="/bike_store/views/collection.php?type=城市車&order=date-desc&page=1">城市車</a>
    <a href="/bike_store/views/collection.php?type=摺疊車&order=date-desc&page=1">摺疊車</a>
    <a href="/bike_store/views/collection.php?type=越野車&order=date-desc&page=1">越野車</a>
    <a href="/bike_store/views/collection.php?type=公路車&order=date-desc&page=1">公路車</a>
  </section>
  <section id="function-link">
    <a href="/bike_store/views/<?= isset($_SESSION['user_id'])?'member.php?page=1':'login.php';?>" title="會員資料"><img src="/bike_store/assets/user.png" alt="" id="user" /></a>
    <?php if(isset($_SESSION['user_id']) ) :;?>
    <button id="logout">
    <img src="/bike_store/assets/log-out.png" alt=""  title="登出" />
  </button>
  <?php endif;?>
    <button title="購物車" id="cart">
      <img src="/bike_store/assets/shopping-cart.png" alt="cart"  />
    </button>
    <button id="aside-menu-btn">
      <img
        src="/bike_store/assets/menu.png"
        alt="aside-menu-pic"
        id="aside-menu-pic" />
    </button>
  </section>
</header>
