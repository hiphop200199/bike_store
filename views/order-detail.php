<?php
require_once "../components/head.php";
if(!$_SESSION['user_id']){
    header('Location:/bike_store/index.php');
  }
/* require_once "../controllers/product.php";
$product = new Product($conn);
$response =  $product->getProducts();
$data = $response['data'];
$page_now = $response['page_now'];
$pages = $response['pages'];
$order = $response['order'];
$keyword = $response['keyword']??null;
$type = $response['type']??null;
$company = $response['company']??null; */

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
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
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


