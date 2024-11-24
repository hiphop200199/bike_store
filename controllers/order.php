<?php
require_once '../database/db.php';
class Order
{
    private $conn;
    
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    
    public function getOrders()
    {
        $keyword = isset($_GET['keyword'])?strip_tags(trim($_GET['keyword'])):null;
        $page_now = isset($_GET['page'])? intval($_GET['page']):null; //從網址列參數索取當下頁面並轉數字
        
        $total_row_count_sql = $keyword===null? 'select count(*) from products':"select count(*) from products where (name like ? or introduction like ?)";
        $statement = $this->conn->prepare($total_row_count_sql);
        if($keyword===null){
            $statement->execute();
        }else{
            $statement->execute(['%'.$keyword.'%','%'.$keyword.'%']);//like句型一樣擺問號在樣板，執行時放入'%*%'即可
        }
       
        $total_row_count = $statement->fetch(PDO::FETCH_NUM)[0];
        $per_page = 10;
        $pages = intval(ceil($total_row_count / $per_page)); //無條件進位但回傳浮點數，round四捨五入，floor無條件捨去
        $data_sql = $keyword===null? sprintf('select id,name from products limit %d offset %d', $per_page, ($page_now - 1) * $per_page):sprintf('select id,name from products where (name like ? or introduction like ?) limit %d offset %d', $per_page, ($page_now - 1) * $per_page); //特定格式組字串，用offset計算起始位置，搭配limit設定要讀取的範圍
        $statement = $this->conn->prepare($data_sql);
        if($keyword===null){
            $statement->execute();
        }else{
            $statement->execute(['%'.$keyword.'%','%'.$keyword.'%']);
        }
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($keyword===null){
            return ['page_now' => $page_now, 'pages' => $pages, 'data' => $data];
        }else{
            return ['page_now' => $page_now, 'pages' => $pages, 'data' => $data,'keyword'=>$keyword];
        }
       
    }
    public function getOrder()
    {
        $item_id = isset($_GET['itemID'])? intval($_GET['itemID']):null;//用isset確認變數是否存在
        $data_sql = 'select name,price,image_source,theme,language,author,publisher,published_date,introduction,stock from products where id = ? ';
        $statement = $this->conn->prepare($data_sql);
        $statement->execute([$item_id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
}

