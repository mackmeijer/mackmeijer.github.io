<!-- profile_private.php -->

<?php
  // fetch data, include php for handeling submits
  include 'header_logged.html';
  require 'includes/init.php';

  // check if the user is an admin
  $visiting_id = $_SESSION["visiting_id"];
  $is_admin = $_SESSION["is_admin"];

  if(isset($_SESSION['user_id']) && isset($_SESSION['user'])){
      $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
      if($user_data ===  false){
          header('Location: logout.php');
          exit;
      }
      $all_users = $user_obj->all_users($_SESSION['user_id']);
  }
  else{
      header('Location: logout.php');
      exit;
  }

  // fetch user data 
  $stmt = $db_connection->prepare('SELECT username, user_background FROM users WHERE id = :id');
  $stmt->execute(['id' => $visiting_id]);
  // for each result, do the following
  while($row=$stmt->fetch()){ 
    $username=$row['username'];
    $kleurid=$row['user_background'];
  }
    
  // fetch background data
  $stmt = $db_connection->prepare('SELECT frontcolor, backcolor FROM background WHERE colorid = :colorid');
  $stmt->execute(['colorid' => $kleurid]);
  // for each result, do the following
  while($row=$stmt->fetch()){
    $front=$row['frontcolor'];
    $back=$row['backcolor'];
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title> Hii-FiVE - Profile </title>
  <style>
    .container2 {
      position: relative;
      
    }

    .container3 {
      position: relative;
      
    }

    .image {
      display: block;
    }

    .overlay {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 250px;
      width: 250px;
      opacity: 0;
      transition: .5s ease;
      background-color: <?php echo $front; ?> ;
      border-radius: 4px;
    }

    .overlay_int {
      font-size: 80%;
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      height: 170px;
      width: 170px;
      opacity: 0;
      transition: .5s ease;
      background-color: <?php echo $back; ?> ;
      border-radius: 4px;
    }

    .container3:hover .overlay_int {
      opacity: 1;
    }

    .container2:hover .overlay {
      opacity: 1;
    }

    .text {
      color: white;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
    }

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
      grid-template-rows: 1fr 0.2fr 1fr 0.2fr 1fr 1fr 0.2fr 1fr;
      gap: 5px 5px;
      grid-template-areas:
        "pic pic pic pic pic"
        "name name name name name"
        "bio bio bio bio bio"
        "interests_title interests_title interests_title chat_title chat_title"
        "interests interests interests chat chat"
        "interests interests interests chat chat"
        "friend_title friend_title friend_title friend_title friend_title"
        "friend friend friend friend friend"
        
    }
    .bio { grid-area: bio;
    background-color: <?php echo $front; ?> ;
    text-align: center;
    font-size: 20px;
    }

    .name { grid-area: name;
    background-color: <?php echo $front; ?> ;
    text-align: center;
    font-size: 20px;
    }

    .friend_title { grid-area: friend_title;
      background-color: <?php echo $front; ?> ;
    height: 60px;
    }

    .friend{ grid-area: friend;
    background-color: <?php echo $front; ?> ;
    padding: 20px;
    display: grid;
    align-items: right;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    justify-content:space-evenly;
    }

    .pic { grid-area: pic;
    background-color: <?php echo $back; ?>;
    display: grid;
    align-items: right;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }

    .chat { grid-area: chat;
    background-color: <?php echo $front; ?> ;
    }

    .chat_title{ grid-area: chat_title;
    background-color: <?php echo $front; ?> ;
    height: 60px;
    }

    .interests { grid-area: interests;
    background-color: <?php echo $front; ?> ;
    padding: 20px;
    display: grid;
    align-items: right;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    justify-content:space-evenly;
    }

    .interests_title{ grid-area: interests_title;
    background-color: <?php echo $front; ?> ;
    height:60px;
    }

    #rcorners1 {
      border-radius: 4px;  
    }

    h1 {
      color: <?php echo $back; ?> ;
      text-shadow: -2px 0 black, 0 2px black, 1px 0 black, 0 -1px black;
      text-decoration: underline overline;
    }


    h2 {
      color: <?php echo $back; ?> ;
      text-shadow: -2px 0 black, 0 2px black, 1px 0 black, 0 -1px black;
      text-decoration: underline overline;
    }

    h3 {
      color: <?php echo $back; ?> ;
      text-shadow: -2px 0 black, 0 2px black, 1px 0 black, 0 -1px black;
      text-decoration: underline overline;
    }

    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

</style>

</head>

<body style="background-color: <?php echo $back; ?> ;text-align:center">

      

  <div class="container">

    <div class="name" id="rcorners1">  <?php echo "<h3> $username </h3> "; ?> 
    <h3> is a private account </h3>
     </div>




    

  




</body>
</html>
