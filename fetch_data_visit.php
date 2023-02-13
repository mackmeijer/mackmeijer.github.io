<!-- fetch_data_visit.php -->

<?php
  // include header, connect to database
  include 'header_logged.html';
  require 'includes/init.php';

  // check the visiting id, check if the user is an admin
  $visiting_id = $_SESSION["visiting_id"];
  $is_admin = $_SESSION["is_admin"];

  // check if logged in 
  if(isset($_SESSION['user_id']) && isset($_SESSION['user'])) {
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data === false) {
      header('Location: logout.php');
      exit;
    }
  }

  else {
    header('Location: logout.php');
    exit;
  }

  // initialize the interests
  $int_img_1 = "images/standard.jpg"; $int_txt_1 = "interest not found :(";
  $int_img_2 = "images/standard.jpg"; $int_txt_2 = "interest not found :(";
  $int_img_3 = "images/standard.jpg"; $int_txt_3 = "interest not found :(";
  $int_img_4 = "images/standard.jpg"; $int_txt_4 = "interest not found :(";
  $int_img_5 = "images/standard.jpg"; $int_txt_5 = "interest not found :(";
  $img_1 = "images/standard.jpg"; $img_caption_1 = "";
  $img_2 = "images/standard.jpg"; $img_caption_2 = "";
  $img_3 = "images/standard.jpg"; $img_caption_3 = "";
  $img_4 = "images/standard.jpg"; $img_caption_4 = "";
  $img_5 = "images/standard.jpg"; $img_caption_5 = "";

  // fetch user data 
  $stmt = $db_connection->prepare('SELECT username, user_background, user_bio, int_1, int_2, int_3, int_4, int_5, is_private, is_admin FROM users WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);

  // for each result, do the following
  while($row=$stmt->fetch()) {
    $username=$row['username'];
    $kleurid=$row['user_background'];
    $bio=$row['user_bio'];
    $int_1=$row['int_1'];
    $int_2=$row['int_2'];
    $int_3=$row['int_3'];
    $int_4=$row['int_4'];
    $int_5=$row['int_5'];
    $privacy_status=$row['is_private'];
    $visiting_is_admin=$row['is_admin'];
  }
    
  // fetch background data
  $stmt = $db_connection->prepare('SELECT frontcolor, backcolor FROM background WHERE colorid = :colorid');
  $stmt->execute(['colorid' => $kleurid]);

  // for each result, do the following
  while($row=$stmt->fetch()) { 
    $front=$row['frontcolor'];
    $back=$row['backcolor'];
  }

  // fetch the data from the five interests
  $stmt = $db_connection->prepare('SELECT int_img, int_txt FROM interests WHERE int_id = :int_id');
  $stmt->execute(['int_id' => $int_1]);
  // for each result, do the following
  while($row=$stmt->fetch()) {
    $int_img_1=$row['int_img'];
    $int_txt_1=$row['int_txt']; }

  $stmt = $db_connection->prepare('SELECT int_img, int_txt FROM interests WHERE int_id = :int_id');
  $stmt->execute(['int_id' => $int_2]);
  // for each result, do the following
  while($row=$stmt->fetch()) { 
    $int_img_2=$row['int_img'];
    $int_txt_2=$row['int_txt']; }

  $stmt = $db_connection->prepare('SELECT int_img, int_txt FROM interests WHERE int_id = :int_id');
  $stmt->execute(['int_id' => $int_3]);
  // for each result, do the following
  while($row=$stmt->fetch()) { 
    $int_img_3=$row['int_img'];
    $int_txt_3=$row['int_txt']; }

  $stmt = $db_connection->prepare('SELECT int_img, int_txt FROM interests WHERE int_id = :int_id');
  $stmt->execute(['int_id' => $int_4]);
  // for each result, do the following
  while($row=$stmt->fetch()) { 
    $int_img_4=$row['int_img'];
    $int_txt_4=$row['int_txt']; }

  $stmt = $db_connection->prepare('SELECT int_img, int_txt FROM interests WHERE int_id = :int_id');
  $stmt->execute(['int_id' => $int_5]);
  // for each result, do the following
  while($row=$stmt->fetch()) { 
    $int_img_5=$row['int_img'];
    $int_txt_5=$row['int_txt']; }

  // fetch krabbels
  $query=$db_connection->prepare('SELECT * FROM krabbel WHERE krabbel_receiver_id = :krabbel_receiver_id ORDER BY krabbel_date ASC');
  $query->execute(['krabbel_receiver_id' => $visiting_id]);
  $rs=$query->fetchAll(PDO::FETCH_OBJ);
  $chat='';
  foreach ($rs as $krabbel_msg) {
    //$chat.=$message->message.'<br>';
    $chat .= '<div class="single-msg"> <ms>
    <strong>'.$krabbel_msg->krabbel_poster.': </strong> </ms>'.$krabbel_msg->krabbel_msg.' 
    <span>'.date('d-m-Y h:i a', strtotime($krabbel_msg->krabbel_date)).'</span>
    </div>';
  }

  //check if a profile is private
  if ($privacy_status == 1) {
    $query = $db_connection->prepare('SELECT * FROM friends WHERE user_one= :user_one AND user_two= :user_two');
    $query->execute(['user_one' => $visiting_id, 'user_two' => $_SESSION["user_id"]]);
    $row = $query->fetch(PDO::FETCH_OBJ);
    if( ! $row && $is_admin == 0)
    {
      header('Location: profile_private.php');
    }
  }

  // fetch the five photo's
  $stmt = $db_connection->prepare('SELECT file_name, caption FROM photo_1 WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);
  // for each result, do the following
  while($row=$stmt->fetch()) {
    $img_1=$row['file_name']; 
    $img_caption_1=$row['caption']; }

  $stmt = $db_connection->prepare('SELECT file_name, caption FROM photo_2 WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);
  // for each result, do the following
  while($row=$stmt->fetch()) {
    $img_2=$row['file_name']; 
    $img_caption_2=$row['caption']; }

  $stmt = $db_connection->prepare('SELECT file_name, caption FROM photo_3 WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);
  // for each result, do the following
  while($row=$stmt->fetch()) {
    $img_3=$row['file_name'];
    $img_caption_3=$row['caption']; }

  $stmt = $db_connection->prepare('SELECT file_name, caption FROM photo_4 WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);
  // for each result, do the following
  while($row=$stmt->fetch()) {
    $img_4=$row['file_name']; 
    $img_caption_4=$row['caption']; }

  $stmt = $db_connection->prepare('SELECT file_name, caption FROM photo_5 WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);
  // for each result, do the following
  while($row=$stmt->fetch()) {
    $img_5=$row['file_name'];
    $img_caption_5=$row['caption']; }
?>