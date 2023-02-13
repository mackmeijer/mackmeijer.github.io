<!-- about_us.php -->

<?php
  // connect to database
  require 'includes/init.php';

  // check if logged in, include the right header
  if(isset($_SESSION['user_id']) && isset($_SESSION['user'])) {
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false) {
      include 'header.html'; 
    }

    else {
      include 'header_logged.html';
    }
  }

  else {
      include 'header.html';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

  <link rel="stylesheet" type="text/css" href="css/styleguide.css"/>
  <link rel="stylesheet" type="text/css" href="css/home.css"/>

  <title >Hii-FiVE - about us </title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style=" text-align:center; font-family:'font-family: Calibri, sans-serif'; color: white"  >

  <div class="container_about_us" style="background-color: rgba(80, 121, 167)" > 
   <div class="Home" >
  <img src= "images/logo.jpeg" alt="Logo" width="125" height="125"> </p>
  <h2 class="w3-jumbo w3-animate-top" style="font-family:Arial, Helvetica, sans-serif ; color: rgb(226, 41, 25)">Hii-FiVE</h2>
  </div>

  <div class="Info"  style ="font-family: Calibri, sans-serif" >
    <p> Welkom! We are 4 AI students. </p>
    <p> We've made this website for a school project!</p>
    <p> For more information contact one of the following students: </p>
    <p> Roan van Blanken</p>
    <p> Britt Krijgsman </p>
    <p> Anne Leendertse </p>
    <p> Mack Meijer </p>
    <p> &copy; 2022 </p>
  </div>

</body>
</html>