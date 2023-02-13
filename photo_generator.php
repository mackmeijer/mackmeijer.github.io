<!-- photo_generator.php -->

<?php
  // include header, connect to database, include php for handeling submits
  include 'header_logged.html';
  require 'includes/init.php';
  include 'post.php';

  if(isset($_SESSION['user_id']) && isset($_SESSION['user'])) {
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false) {
        header('Location: logout.php');
        exit;
    }
  }

  // load random quote API
  $api_url = 'https://api.quotable.io/random';
  $quote = json_decode(file_get_contents($api_url));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <title> Hii-FiVE - Photo Generator </title>
  <link rel="shortcut icon" href="#" />
  <style>
  </style>
</head>

<body style=" background-color:rgba(252, 83, 69, 0.842)"> 
  <div style="display: flex; flex-direction: column; align-items: center; background-color: rgba(80, 121, 167); ">
    <div class="fetchImagesWrapper" style="margin-top: 10px; align-items: center;">
      <header style="color: white; text-align: center; background-color: rgba(80, 121, 167);">
        <h1> Hii-FiVE Photo Generator </h1>
        <p> If you're lacking inspiration today, you can use this smart Hii-FiVE Photo Generator. Good luck my guy. </p>
      </header>
    </div>
    <div class="imageDisplayWrapper" style="margin-top: 20px; margin-bottom: 50px; background-color: rgba(252, 83, 69, 0.842); height: 360px;" >
      <img
        class="FiveFoto"
        style="width: 550px; height: 360px; border: 1px solid black;"
      />
    </div>
    <button class="GenerateFiveFoto" style=" margin-bottom: 25px; background-color: rgba(252, 83, 69, 0.842); color: white; cursor: pointer;">
      Generate a photo
    </button>
    
  </br>
    </br>
      </br>
        <header style="color: white; text-align: center; background-color: rgba(80, 121, 167);">
          <h1> Hii-FiVE Quote Generator </h1>
          <p> Also don't have a clue what to write in your bio? We got your back; Introducing the Hii-FiVE Quote Generator. Go ahead and give it a try! </p>
        </header>
        <form name = "quote_bio" action = "" method = "post" > 
          <input style= "background-color: rgba(252, 83, 69, 0.842); color: white; cursor: pointer;" type="submit" name="quote_bio" value="Change your bio to a randomly generated quote!">
        </form>
      </br>
    </br>
  </br>

    </div>

</body>

<script>
  // api for generating random picture
  // based on this video: https://www.youtube.com/watch?v=95wNOAoSyaQ
  const requestUrl =
    'https://api.unsplash.com/search/photos?per_page=50&query=five&client_id=8PgZyudqSACwlcE4RMAnkOFnLrQtflv86DEqZxKdE1I';
  const GenerateFiveFoto = document.querySelector('.GenerateFiveFoto');
  const FiveFoto = document.querySelector('.FiveFoto');

  GenerateFiveFoto.addEventListener('click', async () => {
    let RandomFiveFoto = await GenerateNewImage();
    FiveFoto.src = RandomFiveFoto;
  });

  async function GenerateNewImage() {
    let RandomNumber = Math.floor(Math.random() * 50);
    return fetch(requestUrl)
      .then((response) => response.json())
      .then((data) => {
        let allImages = data.results[RandomNumber];
        return allImages.urls.regular;
      });
  }
</script>

<?php if(isset($_POST['quote_bio'])){
      $id=$_SESSION['user_id'];
      $quote_author = $quote->author;
      $quote = $quote->content;
      $bionew = $quote."-".$quote_author;
      $stmt = $db_connection->prepare('UPDATE users SET user_bio = :user_bio WHERE id = :id');
      $stmt->execute(['user_bio' => $bionew, 'id' => $_SESSION['user_id']]); 
      echo "Bio changed to a random quote!"; 
  }?>
</html>