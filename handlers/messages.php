<?php
include ('../includes/init.php');
switch ($_REQUEST['action']){
    case "sendMessage":

        $stmt = $db_connection->prepare('SELECT username, user_background FROM users WHERE id = :id');
        $stmt->execute(['id' => $_SESSION['user_id']]);
        
        while($row=$stmt->fetch()){ //for each result, do the following
          $username=$row['username'];
          $kleurid=$row['user_background'];
        }
        
        //echo 'sending response back from php page';
        //global $pdo;
        session_start();
        $message = $_REQUEST['message'];
        $message = str_replace("<", "&lt;", $message);
        $message = str_replace(">", "&gt;", $message);
        $query = $db_connection->prepare("INSERT INTO messages SET user=?, message=?");
        $row = $query->execute([$username, $message]);
        if ($row){
            echo 1;
            exit;
        }
        break;

    case "getMessages":
        //echo 'working';
        $query=$db_connection->prepare("SELECT * FROM messages ORDER BY date ASC");
        $row=$query->execute();
        $rs=$query->fetchAll(PDO::FETCH_OBJ);
        //echo var_dump($rs);
    $chat='';
    foreach ($rs as $message){
        //$chat.=$message->message.'<br>';
        $chat .= '<div class="single-msg">
<strong>'.$message->user.': </strong> '.$message->message.'
<span>'.date('d-m-Y h:i a', strtotime($message->date)).'</span>
</div>';
    }
    echo $chat;
        break;
}
?>