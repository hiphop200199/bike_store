<aside id="side-menu">
<button id="close-menu">✖</button>
<a href="/bike_store/views/collection.php?type=New Arrivals&order=date-desc&page=1">New Arrivals</a>
    <a href="/bike_store/views/collection.php?type=熱門商品&order=date-desc&page=1">熱門商品</a>
    <a href="/bike_store/views/collection.php?company=QIANT&order=date-desc&page=1">QIANT</a>
    <a href="/bike_store/views/collection.php?company=VMX&order=date-desc&page=1">VMX</a>
    <a href="/bike_store/views/collection.php?type=城市車&order=date-desc&page=1">城市車</a>
    <a href="/bike_store/views/collection.php?type=摺疊車&order=date-desc&page=1">摺疊車</a>
    <a href="/bike_store/views/collection.php?type=越野車&order=date-desc&page=1">越野車</a>
    <a href="/bike_store/views/collection.php?type=公路車&order=date-desc&page=1">公路車</a>
    <?php if(isset($_SESSION['user_id'])) :;?>
    <button id="side-logout">
   登出
  </button>
  <?php endif;?>
</aside>