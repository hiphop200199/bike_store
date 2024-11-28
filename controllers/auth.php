<?php
if(session_status()!==PHP_SESSION_ACTIVE){
    session_start();
}
require_once '../database/db.php';
date_default_timezone_set('Asia/Taipei');//設定預設時區
class Auth
{
    private $conn; //承接服務的私有屬性
    public function __construct(PDO $conn) //注入服務
    {
        $this->conn = $conn; //承接服務
    }
    public function getDateFromFrontend()
    {
        $request_body = file_get_contents('php://input');
    
        $data = json_decode($request_body, true);
        
        if($data){
            switch ($data['task']) {
                case 'register':
                    $this->register($data);
                    break;
                case 'login':
                    $this->login($data);
                    break;
                case 'logout':
                    $this->logout();
                    break;
                case 'edit-user':
                    $this->editUser($data);
                    break;
            }
        }
      
    }
    private function login($data)
    {
        if($_SERVER['REQUEST_METHOD']!=='POST'){
            return;
        }
        header('Content-Type:application/json'); //回傳json格式
        $email = $data['email'];
        $password = $data['password'];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            session_regenerate_id();//參數true會刪掉現有的session資料，會導致無法辨識session固定攻擊以及程序競爭問題(程序競爭為同時多道程序搶著使用某一資源，而沒有等當下的session處理完，需要用lock方式避免競爭問題)
            echo json_encode(['message' => 'email格式不正確.']);
            exit;
        }
        if(!preg_match('/[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}/',strip_tags(trim($password)))){
            session_regenerate_id();
            echo json_encode(['message' => '密碼格式不正確.']);
            exit;
        }
        $check_email_sql = 'select id,name,email,password,delete_flag from users where email = ? ';
        $statement = $this->conn->prepare($check_email_sql);
        $statement->execute([$email]);
        if ($statement->rowCount() > 0) {
            session_regenerate_id();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $check_password = password_verify($password,$row['password']);//驗證雜湊跟密碼是否符合
            if(!$check_password){
                session_regenerate_id(); //更新sessionID
                echo json_encode(['message' => '密碼不正確.']);
                exit;
            }elseif($row['delete_flag']==1){
                session_regenerate_id();
                echo json_encode(['message'=>'此帳號已無效']);
            }else{
                session_regenerate_id(); //更新sessionID
                $_SESSION['user'] = $row['name'];
                $_SESSION['user_id'] = $row['id'];
                echo json_encode(['message' => 'login success.', 'redirect' => 'index.php']);
                exit;
            }
           
        } else {
            session_regenerate_id();
            echo json_encode(['message' => '無此帳號，需註冊.']);
            exit;
        }
    }
    private function logout()
    {
        if($_SERVER['REQUEST_METHOD']!=='POST'){
            return;
        }
        $_SESSION = [];
        session_destroy(); //破壞session
        echo json_encode(['message'=>'logout success.','redirect' => 'index.php']);
        exit;
    }
    private function register($data)
    {
        if($_SERVER['REQUEST_METHOD']!=='POST'){
            return;
        }
        header('Content-Type:application/json'); //回傳json格式
        $name = strip_tags(trim($data['name']));
        $email = $data['email'];
        $password = $data['password'];
        $phone = strip_tags(trim($data['phone']));
        $address = strip_tags(trim($data['address']));

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            session_regenerate_id();//參數true會刪掉現有的session資料，會導致無法辨識session固定攻擊以及程序競爭問題(程序競爭為同時多道程序搶著使用某一資源，而沒有等當下的session處理完，需要用lock方式避免競爭問題)
            echo json_encode(['message' => 'email格式不正確.']);
            exit;
        }
        if(!preg_match('/[A-Z]{1,}[a-z]{1,}[0-9]{1,}\W{1,}/',strip_tags(trim($password)))){
            session_regenerate_id();
            echo json_encode(['message' => '密碼格式不正確.']);
            exit;
        }
        $check_email_sql = 'select email from users where email = ?';
        $statement = $this->conn->prepare($check_email_sql); 
        $statement->execute([$email]);
        if ($statement->rowCount() > 0) {
            session_regenerate_id();
            echo json_encode(['message' => '此email已經註冊過']);
            exit;
        } else {
            $hashed_password = password_hash(strip_tags(trim($password)), PASSWORD_DEFAULT);
            $time = date("Y-m-d H:i:s");  
            $create_user_sql = 'insert into users values (?,?,?,?,?,?,?,?,?)';
            $statement = $this->conn->prepare($create_user_sql);
            $statement->execute([null,$name,$email,$hashed_password,$phone,$address,$time,$time,0]);
            if ($statement->rowCount() > 0) {
                $user_id_sql = 'select id from users where email = ?';
                $statement = $this->conn->prepare($user_id_sql);
                $statement->execute([$email]);
                $user_id = $statement->fetch(pdo::FETCH_ASSOC)['id'];
                session_regenerate_id(); //更新sessionID
                $_SESSION['user'] = $name;
                $_SESSION['user_id'] = $user_id;
                echo json_encode(['message' => 'register success.', 'redirect' => 'index.php']);
                exit;
            }
        }
    }
    private function editUser($data)
    {
        if(!$_SESSION['user_id']||$_SERVER['REQUEST_METHOD']!=='POST'){
            return;
        }
        $phone = strip_tags(trim($data['phone']));
        $address = strip_tags(trim($data['address']));
        $update_member_sql = 'update users set phone = ?,address = ? where id = ?';
        $statement = $this->conn->prepare($update_member_sql);
        $statement->execute([$phone,$address,$_SESSION['user_id']]);
        if($statement->rowCount()>0){
            session_regenerate_id(); //更新sessionID
            echo json_encode(['message' => 'update success.', 'redirect' => 'index.php']);
            exit;
        }
    }
    public function getUser()
    {
        if(!$_SESSION['user_id']){
            return;
        }
        $get_user_sql = 'select name,email,phone,address from users where id = ?';
        $statement = $this->conn->prepare($get_user_sql);
        $statement->execute([$_SESSION['user_id']]);
        $data = $statement->fetch(pdo::FETCH_ASSOC);
        return $data;
    }
}
$auth = new Auth($conn);

$auth->getDateFromFrontend();

$auth = null;
