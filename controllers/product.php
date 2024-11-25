<?php
require_once '../database/db.php';
class Product
{
    private $conn;
    
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    
    public function getProducts()
    {
        $type = isset($_GET['type'])?strip_tags(trim($_GET['type'])):null;
        $company = isset($_GET['company'])?strip_tags(trim($_GET['company'])):null;
        $order = isset($_GET['order'])?strip_tags(trim($_GET['order'])):null;
        $keyword = isset($_GET['keyword'])?strip_tags(trim($_GET['keyword'])):null;
        $page_now = isset($_GET['page'])? intval($_GET['page']):null; //從網址列參數索取當下頁面並轉數字
        $total_row_count_sql =  'select count(*) from products where delete_flag = 0 ';
        if($type && ($type!=='New Arrivals'&& $type!=='熱門商品')){
            $total_row_count_sql .= ' and type = ?';
        }
        if($company){
            $total_row_count_sql .= ' and company = ?';
        }
        if($keyword){
            $total_row_count_sql .= ' and (name like ? or introduction like ?) ';
        }
        $statement = $this->conn->prepare($total_row_count_sql);
        if($type && ($type!=='New Arrivals'&& $type!=='熱門商品')){
            $keyword?$statement->execute([$type,'%'.$keyword.'%','%'.$keyword.'%']): $statement->execute([$type]);
        }
        if($type==='New Arrivals'||$type==='熱門商品'){
            $statement->execute();
        }
        if($company){
            $keyword?$statement->execute([$company,'%'.$keyword.'%','%'.$keyword.'%']): $statement->execute([$company]);
        }
        $total_row_count = $statement->fetch(PDO::FETCH_NUM)[0];
        $per_page = 10;
        $pages = intval(ceil($total_row_count / $per_page)); //無條件進位但回傳浮點數，round四捨五入，floor無條件捨去
        $data_sql ='select id,name,price,image_source from products where delete_flag = 0 '; 
        if($type && ($type!=='New Arrivals'&& $type!=='熱門商品')){
            $data_sql .= ' and type = ?';
        }
        if($company){
            $data_sql .= ' and company = ?';
        }
        if($keyword){
            $data_sql .= ' and (name like ? or introduction like ?) ';
        }
        if($order){
            switch ($order) {
                case 'date-desc':
                    $data_sql .= ' order by created_at desc ';
                    break;
                case 'date-asc':
                    $data_sql .= ' order by created_at asc ';
                    break;
                case 'price-desc':
                    $data_sql .=' order by price desc ';
                    break;
                case 'price-asc':
                    $data_sql .=' order by price asc ';
                    break;
            }
        }
        $data_sql .= ' limit ? offset ? ';
        $statement = $this->conn->prepare($data_sql);
        if($type && ($type!=='New Arrivals'&& $type!=='熱門商品')){
            $keyword?$statement->execute([$type,'%'.$keyword.'%','%'.$keyword.'%',$per_page,($page_now -1) * $per_page]): $statement->execute([$type,$per_page,($page_now -1) * $per_page]);
        }
        if($type==='New Arrivals'||$type==='熱門商品'){
            $keyword?$statement->execute(['%'.$keyword.'%','%'.$keyword.'%',$per_page,($page_now -1) * $per_page]):$statement->execute([$per_page,($page_now -1) * $per_page]);
        }
        if($company){
            $keyword?$statement->execute([$company,'%'.$keyword.'%','%'.$keyword.'%',$per_page,($page_now -1) * $per_page]): $statement->execute([$company,$per_page,($page_now -1) * $per_page]);
        }
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($type){
           return $keyword?['page_now' => $page_now, 'pages' => $pages, 'data' => $data,'keyword'=>$keyword,'type'=>$type,'order'=>$order]:['page_now' => $page_now, 'pages' => $pages, 'data' => $data,'type'=>$type,'order'=>$order];
        }
        if($company){
            return $keyword?['page_now' => $page_now, 'pages' => $pages, 'data' => $data,'keyword'=>$keyword,'company'=>$company,'order'=>$order]:['page_now' => $page_now, 'pages' => $pages, 'data' => $data,'company'=>$company,'order'=>$order];  
        }
          
    }
    public function getProduct()
    {
        $collection =  isset($_GET['collection'])?strip_tags(trim($_GET['collection'])):null;
        $product_id = isset($_GET['productID'])? intval($_GET['productID']):null;//用isset確認變數是否存在
        $data_sql = 'select name,price,image_source,introduction,stock from products where id = ? ';
        $statement = $this->conn->prepare($data_sql);
        $statement->execute([$product_id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return ['collection'=>$collection,'data'=>$data];
    }
    
}

