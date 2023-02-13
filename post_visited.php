<!-- post_visited.php -->

<?php
  // follow visited user
  if(isset($_POST['follow'])){
    $stmt = $db_connection->prepare('INSERT INTO friends SET user_one= :user_one, user_two= :user_two');
    $stmt->execute(['user_one' => $_SESSION["user_id"], 'user_two' => $visiting_id]);
    echo "<meta http-equiv='refresh' content='0'>";
  }

  // unfollow visited user
  if(isset($_POST['unfollow'])){
    $stmt = $db_connection->prepare('DELETE FROM friends WHERE user_one= :user_one AND user_two= :user_two');
    $stmt->execute(['user_one' => $_SESSION["user_id"], 'user_two' => $visiting_id]);
    echo "<meta http-equiv='refresh' content='0'>";
  }

  // post krabbel
  if(isset($_POST['submit_krabbel'])){
    $id=$_SESSION['user_id'];
    $krabbel = $_POST['krabbel_msg'];
    $krabbel = str_replace("<", "&lt;", $krabbel);
    $krabbel = str_replace(">", "&gt;", $krabbel);
    $stmt = $db_connection->prepare('INSERT INTO krabbel SET  krabbel_receiver_id = :krabbel_receiver_id, krabbel_poster= :krabbel_poster, krabbel_msg= :krabbel_msg');
    $stmt->execute(['krabbel_receiver_id' => $visiting_id, 'krabbel_poster' => $_SESSION["username"], 'krabbel_msg' => $krabbel]);
    echo "<meta http-equiv='refresh' content='0'>";  
  }

  // delete visited user
  if(isset($_POST['delete_user'])){
    $stmt = $db_connection->prepare('DELETE FROM users WHERE id= ?');
    $stmt->execute([$visiting_id]); 
  } 
    
  // delete visited user
  if(isset($_POST['make_admin'])){
    $one = '1';
    $stmt = $db_connection->prepare('UPDATE users SET is_admin= :is_admin WHERE id= :id');
    $stmt->execute(['is_admin'=>$one, 'id'=>$visiting_id]); 
  } 

?>