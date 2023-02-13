<!-- post.php -->

<?php
  // post krabbel
  if(isset($_POST['submit_krabbel'])){
    $id=$_SESSION['user_id'];
    $krabbel = $_POST['krabbel_msg'];
    $krabbel = str_replace("<", "&lt;", $krabbel);
    $krabbel = str_replace(">", "&gt;", $krabbel);
    $stmt = $db_connection->prepare('INSERT INTO krabbel SET  krabbel_receiver_id = :krabbel_receiver_id, krabbel_poster= :krabbel_poster, krabbel_msg= :krabbel_msg');
    $stmt->execute(['krabbel_receiver_id' => $_SESSION['user_id'], 'krabbel_poster' => $username, 'krabbel_msg' => $krabbel]); 
    } 

  // profile edit posts

  // thema update
  if(isset($_POST['update'])){
    $id=$_SESSION['user_id'];
    if(!empty($_POST['theme'])){
      $theme=$_POST['theme'];
      $stmt = $db_connection->prepare('UPDATE users SET user_background = :background WHERE id = :id');
      $stmt->execute(['background' => $theme, 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>"; }
  }

  // bio update
  if(isset($_POST['submitbio'])){
    $id=$_SESSION['id'];
    $bionew = $_POST['bionew'];
    $bionew = str_replace("<", "&lt;", $bionew);
    $bionew = str_replace(">", "&gt;", $bionew);
    $stmt = $db_connection->prepare('UPDATE users SET user_bio = :user_bio WHERE id = :id');
    $stmt->execute(['user_bio' => $bionew, 'id' => $_SESSION['user_id']]); 
    echo "<meta http-equiv='refresh' content='0'>"; }
  
  // interesse updates 

  // 1
  if(isset($_POST['int_1_submit'])){
    $int_1 = $_POST['int_1'];
    $stmt = $db_connection->prepare('UPDATE users SET int_1 = :int_1 WHERE id = :id');
    $stmt->execute(['int_1' => $int_1, 'id' => $_SESSION['user_id']]);
    echo "<meta http-equiv='refresh' content='0'>";
  }
  
  // 2
  if(isset($_POST['int_2_submit'])){
    $int_2 = $_POST['int_2'];
    $stmt = $db_connection->prepare('UPDATE users SET int_2 = :int_2 WHERE id = :id');
    $stmt->execute(['int_2' => $int_2, 'id' => $_SESSION['user_id']]);
    echo "<meta http-equiv='refresh' content='0'>";
  }
  
  // 3
  if(isset($_POST['int_3_submit'])){
    $int_3 = $_POST['int_3'];
    $stmt = $db_connection->prepare('UPDATE users SET int_3 = :int_3 WHERE id = :id');
    $stmt->execute(['int_3' => $int_3, 'id' => $_SESSION['user_id']]);
    echo "<meta http-equiv='refresh' content='0'>";
  }
  
  // 4
  if(isset($_POST['int_4_submit'])){
    $int_4 = $_POST['int_4'];
    $stmt = $db_connection->prepare('UPDATE users SET int_4 = :int_4 WHERE id = :id');
    $stmt->execute(['int_4' => $int_4, 'id' => $_SESSION['user_id']]);
    echo "<meta http-equiv='refresh' content='0'>";
  }

  // 5
  if(isset($_POST['int_5_submit'])){
    $int_5 = $_POST['int_5'];
    $stmt = $db_connection->prepare('UPDATE users SET int_5 = :int_5 WHERE id = :id');
    $stmt->execute(['int_5' => $int_5, 'id' => $_SESSION['user_id']]);
    echo "<meta http-equiv='refresh' content='0'>";
  }

  // submit caption
  // 1
  if(isset($_POST['submit_cap_1'])){
    $id=$_SESSION['user_id'];
    if(!empty($_POST['cap_1'])){
      $caption=$_POST['cap_1'];
      $caption = str_replace("<", "&lt;", $caption);
      $caption = str_replace(">", "&gt;", $caption);
      $stmt = $db_connection->prepare('UPDATE photo_1 SET caption = :caption WHERE id = :id');
      $stmt->execute(['caption' => $caption, 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>"; 
    }
  }

  // 2
  if(isset($_POST['submit_cap_2'])){
    $id=$_SESSION['user_id'];
    if(!empty($_POST['cap_2'])){
      $caption=$_POST['cap_2'];
      $caption = str_replace("<", "&lt;", $caption);
      $caption = str_replace(">", "&gt;", $caption);
      $stmt = $db_connection->prepare('UPDATE photo_2 SET caption = :caption WHERE id = :id');
      $stmt->execute(['caption' => $caption, 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>"; 
    }
  }

  // 3
  if(isset($_POST['submit_cap_3'])){
    $id=$_SESSION['user_id'];
    if(!empty($_POST['cap_3'])){
      $caption=$_POST['cap_3'];
      $caption = str_replace("<", "&lt;", $caption);
      $caption = str_replace(">", "&gt;", $caption);
      $stmt = $db_connection->prepare('UPDATE photo_3 SET caption = :caption WHERE id = :id');
      $stmt->execute(['caption' => $caption, 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>";
    }
  }

  // 4 
  if(isset($_POST['submit_cap_4'])){
    $id=$_SESSION['user_id'];
    if(!empty($_POST['cap_4'])){
      $caption=$_POST['cap_4'];
      $caption = str_replace("<", "&lt;", $caption);
      $caption = str_replace(">", "&gt;", $caption);
      $stmt = $db_connection->prepare('UPDATE photo_4 SET caption = :caption WHERE id = :id');
      $stmt->execute(['caption' => $caption, 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>"; 
    }
  }
  
  // 5
  if(isset($_POST['submit_cap_5'])){
    $id=$_SESSION['user_id'];
    if(!empty($_POST['cap_5'])){
      $caption=$_POST['cap_5'];
      $caption = str_replace("<", "&lt;", $caption);
      $caption = str_replace(">", "&gt;", $caption);
      $stmt = $db_connection->prepare('UPDATE photo_5 SET caption = :caption WHERE id = :id');
      $stmt->execute(['caption' => $caption, 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>"; 
    }
  }

  // set private
  if(isset($_POST['private_submit'])){
    $id=$_SESSION['user_id'];  
    $private=$_POST['private'];
    $caption = str_replace("<", "&lt;", $caption);
    $caption = str_replace(">", "&gt;", $caption);
    $stmt->execute(['is_private' => $private, 'id' => $_SESSION['user_id']]); 
    echo "<meta http-equiv='refresh' content='0'>"; 
  }

  // delete account
  if(isset($_POST['submit_delete'])){
    $id=$_SESSION['user_id'];  
    $delete_verification=$_POST['delete'];
    if ($delete_verification == "DELETE_ACCOUNT") {
      $stmt = $db_connection->prepare('DELETE FROM users WHERE id = :id');
      $stmt->execute([ 'id' => $_SESSION['user_id']]); 
      echo "<meta http-equiv='refresh' content='0'>";
    }
    else {
      echo "account deletion not succesfull";
    }
  }

  // change bio to randomly generated quote
  
?>
