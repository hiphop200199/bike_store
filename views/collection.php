<?php
require_once "../components/head.php";
require_once "../controllers/product.php";
$product = new Product($conn);
$response =  $product->getProducts();
$data = $response['data'];
$page_now = $response['page_now'];
$pages = $response['pages'];
$order = $response['order'];
$keyword = $response['keyword']??null;
$type = $response['type']??null;
$company = $response['company']??null;

?>
<div id="layout">
   <?php require_once '../components/header.php'; ?>
   <section id="breadcrumb">
   <a href="/bike_store">首頁</a>><a><?=htmlentities(strip_tags(trim( $_GET['type'])))  ;?></a>
   </section>
   
    <div id="collection-layout">
    <section id="order-and-type">
    <h2>排列方式</h2>
    <select name="order-mode" id="order-mode">
        <option value="date-desc" selected>日期,從新到舊</option>
        <option value="date-asc">日期,從舊到新</option>
        <option value="price-desc">價錢,從高到低</option>
        <option value="price-asc">價錢,從低到高</option>
    </select>
    <h2 class="type">類別</h2>
    <a href="/bike_store/views/collection.php?type=New Arrivals&order=date-desc&page=1">New Arrivals</a>
    <a href="/bike_store/views/collection.php?type=熱門商品&order=date-desc&page=1">熱門商品</a>
    <a href="/bike_store/views/collection.php?company=QIANT&order=date-desc&page=1">QIANT</a>
    <a href="/bike_store/views/collection.php?company=VMX&order=date-desc&page=1">VMX</a>
    <a href="/bike_store/views/collection.php?type=城市車&order=date-desc&page=1">城市車</a>
    <a href="/bike_store/views/collection.php?type=摺疊車&order=date-desc&page=1">摺疊車</a>
    <a href="/bike_store/views/collection.php?type=越野車&order=date-desc&page=1">越野車</a>
    <a href="/bike_store/views/collection.php?type=公路車&order=date-desc&page=1">公路車</a>
    </section>
   <section id="cards-render"> <h1 class="title"><?=htmlentities(strip_tags(trim( $_GET['type'])))  ;?></h1>
   <section class="cards-container">
   <?php foreach ($data as $key => $item) : ?>
   <div class="card" id="<?= htmlentities($item['id']); ?>">
      <a href="/bike_store/views/products.php?collection=<?=$response['type']? htmlentities($response['type']) :htmlentities($response['company']);?>&productID=<?=htmlentities($item['id']) ;?>"><img src="<?= htmlentities($item['image_source']); ?>" alt=""></a>
      <a href="">
         <p class="name"><?= htmlentities($item['name']) ;?></p>
         <p class="price">NT$ <?= htmlentities($item['price']); ?></p>
      </a>
   </div>
   <?php endforeach ?>
   </section>
   <section class="pagination">
  <a href="/bike_store/views/collection.php?<?=$type?'type='.$type:'company='.$company;?>&order=date-desc&page=1<?=$keyword?'&keyword='.$keyword:null;?>" title="第一頁" <?= $page_now === 1 ? "class='disable'" : ''; ?>>
    << </a>
      <a href="/bike_store/views/collection.php?<?=$type?'type='.$type:'company='.$company;?>&order=date-desc&page=<?= $page_now === 1 ? 1 : $page_now - 1; ?><?=$keyword?'&keyword='.$keyword:null;?>" title="上一頁" <?= $page_now === 1 ? "class='disable'" : ''; ?>>
        < </a>
          <?php for ($i = 1; $i <= $pages; $i++): ?> <!--用冒號中斷php標籤-->
            <a href="/bike_store/views/collection.php?<?=$type?'type='.$type:'company='.$company;?>&order=date-desc&page=<?= $i; ?><?=$keyword?'&keyword='.$keyword:null;?>" <?= $page_now === $i ? 'class="active"' : ''; ?>><?= $i; ?></a><!--用?=單純顯示變數或表達式-->
          <?php endfor; ?><!--用end某某結束行為-->
          <a href="/bike_store/views/collection.php?<?=$type?'type='.$type:'company='.$company;?>&order=date-desc&page=<?= $page_now === $pages ? $pages : $page_now + 1; ?><?=$keyword?'&keyword='.$keyword:null;?>" title="下一頁" <?= $page_now === $pages ? "class='disable'" : ''; ?>>></a>
          <a href="/bike_store/views/collection.php?<?=$type?'type='.$type:'company='.$company;?>&order=date-desc&page=<?= $pages; ?><?=$keyword?'&keyword='.$keyword:null;?>" title="最後一頁" <?= $page_now === $pages ? "class='disable'" : ''; ?>>>></a>
</section>
</section>
  
    </div>
   
  
  


   <?php require_once '../components/footer.php'; ?>
  
   <?php require_once '../components/to-top.php'; ?>
</div>
<?php require_once '../components/side-menu.php'; ?>
<?php require_once '../components/side-cart.php'; ?>

<?php require_once '../components/foot.php'; ?>