<?php
if(session_status()!==PHP_SESSION_ACTIVE){
    session_start();
}
date_default_timezone_set('Asia/Taipei');//設定預設時區
require_once '../database/db.php';
require_once '../vendor/autoload.php';
use Stripe\Checkout\Session;
use Stripe\Stripe;
class Order
{
    private $conn;
    private $stripeSecretKey = 'sk_test_51L1UmkCeLPUaBTs7wQKuUJCig7GB9rCRPyzov0WdL90ylvuJqEcEjgSLf6fjSyyRnBdIVnazxRXRcblYinGJEkIH00oRYjDFKO';
    
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    
    public function getOrders()
    {
        if(!$_SESSION['user_id']){
            return;
        }
        $page_now = isset($_GET['page'])? intval($_GET['page']):null; 
        $total_row_count_sql = 'select count(*) from orders';
        $statement = $this->conn->prepare($total_row_count_sql);     
        $statement->execute();    
        $total_row_count = $statement->fetch(PDO::FETCH_NUM)[0];
        $per_page = 10;
        $pages = intval(ceil($total_row_count / $per_page)); 
        $data_sql = 'select id,payment,payment_status,total_price,invoice,receiver_name,receiver_tel,receiver_address,pickup,pickup_status from orders where delete_flag = 0 and user_id = ? order by created_at desc limit ? offset ?'; 
        $statement = $this->conn->prepare($data_sql);       
        $statement->execute([$_SESSION['user_id'],$per_page,($page_now -1) * $per_page]);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);      
        return ['page_now' => $page_now, 'pages' => $pages, 'data' => $data];   
    }
    public function getOrder()
    {
        if(!$_SESSION['user_id']){
            return;
        }
        $order_id = isset($_GET['orderID'])? intval($_GET['orderID']):null;
        $data_sql = 'select id,name,amount,price from order_details where order_id = ? ';
        $statement = $this->conn->prepare($data_sql);
        $statement->execute([$order_id]);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
       return ['data'=>$data] ;
    }
    public function checkout()
    {
        if(!$_SESSION['user_id']){
            return;
        }
        $request_body = file_get_contents('php://input');
        $data = json_decode($request_body, true);
        $user_id = $_SESSION['user_id'];
        $receiver_name = $data['receiverName'];
        $receiver_tel = $data['receiverTel'];
        $receiver_address = $data['receiverAddress'];
        Stripe::setApiKey($this->stripeSecretKey);
        header('Content-Type: application/json');
        $YOUR_DOMAIN = 'http://localhost/bike_store';
        $items = json_decode($data['data'],true) ;
        $lineItems = []; //stripe用來定義商品的資訊
        $totalPrice = 0;//總金額
        foreach ($items as $item) {
            $lineItems[] =  [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name'],
                        'images' => [$item['image']]
                    ],
                    'unit_amount' => $item['price']*100, //用美分計算，所以要*100轉換成美元
                ],
                'quantity' => $item['amount'],
            ];
            $totalPrice += $item['price'] * $item['amount'];
        }
        $this->conn->beginTransaction();
        try{
            //建立結帳session
            $checkout_session = Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => $YOUR_DOMAIN.'/views'.'/checkout-success.php?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $YOUR_DOMAIN.'/views'.'/checkout-cancel.php',
            ]);
            //產生未付款訂單
            
            $time = date("Y-m-d H:i:s");
            $create_order_sql = 'insert into orders values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $statement = $this->conn->prepare($create_order_sql);
            $statement->execute([null,
            $user_id,
            $checkout_session->id,
            '信用卡',
            '未付款',
            $totalPrice,
            'gregsergtrshtr',
            $receiver_name,
            $receiver_tel,
            $receiver_address,
            '宅配',
            '待出貨',
            $time,
            $time,
            0
        ]);
            $get_order_id_sql = 'select id from orders where session_id = ?';
            $statement = $this->conn->prepare($get_order_id_sql);
            $statement->execute([$checkout_session->id]);
            $order_id = $statement->fetch(PDO::FETCH_ASSOC)['id'];
            //產生訂單明細
            $create_order_detail_sql = 'insert into order_details values(?,?,?,?,?,?,?,?,?)';
            $statement = $this->conn->prepare($create_order_detail_sql);
            foreach($items as $item){
               $statement->execute([
                null,$order_id,$item['productId'],$item['name'],$item['amount'],$item['price'],$time,$time,0
               ]);
            }
            $this->conn->commit();
            echo json_encode(['url'=> $checkout_session->url]);
            exit;

        }catch (Exception $e){
            $this->conn->rollBack();
            echo json_encode(['error'=> $e->getMessage()]);
            exit;
        }

    }
    public function success()
    {
        if(!$_SESSION['user_id']){
            return;
        }
        $user_id = $_SESSION['user_id'];
        Stripe::setApiKey($this->stripeSecretKey);
        header('Content-Type: application/json');
        try {
            //核對session_id
            $session_id = $_GET['session_id'];
            $session = Session::retrieve($session_id);
            if(! $session){
                echo json_encode(['message'=>'Invalid Session ID']);
                exit;
            }
            //找對應session_id的訂單
            $check_order_sql = 'select * from orders where session_id = ?';
            $statement = $this->conn->prepare($check_order_sql);
            $statement->execute([$session_id]);
            if($statement->rowCount()==0){
                throw new Exception('order not found.');
            }
            //更新訂單付款狀態
            $update_order_sql = "update orders set payment_status = '已付款' where session_id = ?";
            $statement = $this->conn->prepare($update_order_sql);
            $statement->execute([$session_id]);
            //付款成功後寄感謝信給客戶
            $user_email_sql = 'select email from users where id = ?';
            $statement = $this->conn->prepare($user_email_sql);
            $statement->execute([$user_id]);
            $email = $statement->fetch(PDO::FETCH_ASSOC)['email'];
            //mail($email,'Thanks for your shopping!','Thank you for your order,'.$_SESSION['user'].'! Every purchase supports our small business and that means the world.');
            echo json_encode(['message'=> 'done.']);
        }catch (Exception $e) {
          echo json_encode(['error'=> $e->getMessage()]);
        }
    }
}

$request_body = file_get_contents('php://input');
    
$data = json_decode($request_body, true);

$order = new Order($conn);

if($data){
    switch ($data['task']) {
        case 'checkout':
            $order->checkout();
            break;
    }
}
$order = null;