<!-- index.php -->

<?php
  // include header, connect to database
  include 'header.html';
  require 'includes/init.php';

  // check if the user is already loggd in
  if(isset($_SESSION['user_id']) && isset($_SESSION['user'])){
          header('Location: home.php');     
      }
?>

<!DOCTYPE html>
<html lang="en">

<!-- style for cookie pop-up  -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" /> 

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

  <link rel="stylesheet" type="text/css" href="css/styleguide.css"/>
  <link rel="stylesheet" type="text/css" href="css/home.css"/>
  <title > Hii-FiVE - Home </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!-- creating cookie pop-up -->

<script>
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#237afc"
      },
      "button": {
        "background": "#fff",
        "text": "#237afc"
      }
    },
    "theme": "classic",
    "position": "bottom-right",
    "content": {
      "message": "This website uses cookies to ensure the best user experience. "
    }
  });

</script>

<!-- end cookie pop-up -->

  <body style=" text-align:center; font-family:'font-family: Calibri, sans-serif'; color: white"  >
    <div class="container" style="background-color: rgba(80, 121, 167); font-family: Calibri, sans-serif " > 

      <div class="Home" >
        <img src= "images/logo.jpeg" alt="Logo" width="125" height="125"> </p>
        <h2 class="w3-jumbo w3-animate-top" style="font-family:Arial, Helvetica, sans-serif ; color: rgb(226, 41, 25)">Hii-FiVE</h2>
      </div>


      <div class="Info"  style ="font-family: Calibri, sans-serif" >
        <p > Welcome to Hii-FiVE. </p>
        <p > Find new student buddy's in Amsterdam. </p>
        <p > Join Hii-FiVE today and make lots of new friends!  </p>
        <img src="images/banana.gif" length="220px" width="220px">
      </div>
  
      <div class="Register">
        <a href="login.php" style= "text-decoration: none;  " > 
          <h4 style="background-color:  rgba(80, 121, 167); color: white; font-family: Calibri, sans-serif" > Login  </h4>
        </a>
        <a href="register.php" style= "text-decoration: none; " >  
          <h4 style="background-color: rgba(80, 121, 167); color: white; font-family: Calibri, sans-serif"> Register</h4> 
        </a>
      </div>
  </body>
</html>

