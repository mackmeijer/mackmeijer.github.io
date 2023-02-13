<!-- home_mobile.php -->

<?php
  // include header, connect to database
  include 'header_logged.html';
  require 'includes/init.php';

  // check if the user is logged in
  if(isset($_SESSION['user_id']) && isset($_SESSION['user'])){
      $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
      if($user_data ===  false){
          header('Location: logout.php');
          exit;
      }
  }
  else{
      header('Location: logout.php');
      exit;
  }

  //fetch user name
  $stmt = $db_connection->prepare('SELECT username FROM users WHERE id = :id');
  $stmt->execute(['id' => $_SESSION['user_id']]);

  while($row=$stmt->fetch()){ 
    $username=$row['username']; 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<link rel="stylesheet" type="text/css" href="css/styleguide.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>

<style>
</style>
<title >Hii-FiVE - Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style=" text-align:center; font-family:'font-family: Calibri, sans-serif'; color: white"  >

  <div class="container_mobile" style="background-color: rgba(80, 121, 167)" > 
   <div class="Home" >
  <img src= "images/logo.jpeg" alt="Logo" width="125" height="125"> </p>
  <h2 class="w3-jumbo w3-animate-top" style="font-family:Arial, Helvetica, sans-serif ; color: rgb(226, 41, 25)">Hii-FiVE</h2>
  </div>


  <div class="Info"  style ="font-family: Calibri, sans-serif" >
  <p>Welcome back, <?php echo $username; ?>!</p>
    <p > You lookin' fresh as always</p>
    <p > Mashallah   </p>
    <img src="images/banana.gif" length="220px" width="220px">
  </div>
  
  <div class="Register">
    <p > Druk op de knop hieronder om je profiel te bezoeken! </br> Hier kun je mensen volgen, afbeeldingen posten en je interesses instellen! </p>
    <a href="profile_mobile.php" style= "text-decoration: none;  " > <h4 style="background-color:  rgba(80, 121, 167); color: white; font-family: Calibri, sans-serif" > Profiel  </h4> </a>
    <p> Druk op de knop hieronder om de global chatroom te bezoeken! </br> Hier kun je real-time chatten met alle andere gebruikers! </p>
    <a href="chat.php" style= "text-decoration: none;  " > <h4 style="background-color:  rgba(80, 121, 167); color: white; font-family: Calibri, sans-serif" > Global chatroom   </h4> </a>

    

  </div>
  
 
  
</body>
</html>

