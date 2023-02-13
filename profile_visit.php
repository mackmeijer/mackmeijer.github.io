<!-- profile_visit.php -->

<?php
  // fetch data, include php for handeling submits
  include 'fetch_data_visit.php';
  include 'post_visited.php';
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

    .textarea{
        width: 97%;
        height: 370px;
        border-bottom: 5px solid <?php echo $back; ?>;
        padding: 10px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        overflow: scroll;
    }

    .single-msg{
        padding: 5px 0px 5px 0px;
        border-bottom: 1px solid <?php echo $back; ?>;
    }

    .single-msg span{
        float: right;
        font-size: 70%;
    }

    .single-msg ms{
        text-align: left;
    }
  </style>
</head>

<body style="background-color: <?php echo $back; ?> ;text-align:center">
    <div class="container">
      <div class="name" id="rcorners1">  <?php echo "<h3> $username </h3> " ; ?>
        <?php
          // if user is admin and visited user not, show options to delete user or make admin
          if ($is_admin == 1 && $visiting_is_admin == 0) {
            echo ' <form method="post">
            <input type="submit" name="delete_user" value="delete user">
            </form>';
          }

          if ($is_admin == 1 && $visiting_is_admin == 0) {
            echo ' <form method="post">
            <input type="submit" name="make_admin" value="Make user admin">
            </form>';
          } 
        ?>
      </div>

      <div class="bio" id="rcorners1"> 
        <h3> bio </h3> 
        <?php echo  $bio  ; ?> 
      </div>

      <div class="pic" id="rcorners1"> 

        <div class="container2">
          <img src=uploads/<?php echo $img_1 ?> width="250" height="250" class="image" id="rcorners1" alt="pic not found :("> 
            <div class="overlay"> 
            <div class="text"> <?php echo $img_caption_1 ?>
                </div> 
            </div> 
        </div>

        <div class="container2">
          <img src=uploads/<?php echo $img_2 ?> width="250" height="250"  class="image" id="rcorners1" alt="pic not found :("> 
            <div class="overlay"> 
                <div class="text"> <?php echo $img_caption_2 ?>
                </div> 
            </div> 
        </div>

        <div class="container2">
          <img src=uploads/<?php echo $img_3 ?> width="250" height="250" class="image" id="rcorners1" alt="pic not found :("> 
            <div class="overlay"> 
                <div class="text"> <?php echo $img_caption_3 ?>
                </div> 
            </div> 
        </div>

        <div class="container2">
          <img src=uploads/<?php echo $img_4 ?> width="250" height="250" class="image" id="rcorners1" alt="pic not found :(">  
            <div class="overlay"> 
                <div class="text"> <?php echo $img_caption_4 ?> 
                </div> 
            </div> 
        </div>
        
        <div class="container2">
          <img src=uploads/<?php echo $img_5 ?> width="250" height="250" class="image" id="rcorners1" alt="pic not found :(">  
            <div class="overlay"> 
                <div class="text"> <?php echo $img_caption_5 ?>
                </div> 
            </div> 
        </div>

  </div>

      <div class="chat_title" id="rcorners1">
        <h1> Krabbel functie</h1> 
      </div>

      <div class="chat" id="rcorners1"> 

      <div class="textarea" >
        <?php echo $chat; ?>
      </div>
        <p> Leave a nice message for <?php echo $username; ?> </p>
          <form name = "krabbel_msg" action = "" method = "post" value = "" > 
            <input type="text" maxlength="50" size="80" name="krabbel_msg" style="border-radius: 4px"> </input>   
            <input type="submit" name="submit_krabbel" value="post">
          </form>
      </div>

      <div class="interests_title" id="rcorners1"> 
        <h1> Friends </h1>  
      </div>

      <div class="interests" id="rcorners1"> 
        <?php
          // check if user follows visited profile
          $stmt = $db_connection->prepare('SELECT user_one, user_two FROM friends WHERE user_one= :user_one AND user_two= :user_two');
          $stmt->execute(['user_one' => $_SESSION["user_id"], 'user_two' => $visiting_id]);
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          // if not show 'follow' button
          if( ! $row)
          {
              echo '<form name = "follow" action ="" method = "post">
              <input type="submit" name="follow" value=" follow ">
              </form>';
          }
          // if they do show 'unfollow' button
          else {
            echo '<form name = "unfollow" action ="" method = "post">
              <input type="submit" name="unfollow" value="unfollow ">
              </form>';
          }
        ?>

        <div class="friend_area" >
          <h4> Currently following: </h4>
            <?php
              // fetch visiting user following
              $query=$db_connection->prepare('SELECT user_two FROM friends WHERE user_one = :user_one');
              $query->execute(['user_one' => $visiting_id]);
              $rss=$query->fetchAll(PDO::FETCH_OBJ);

              // show visiting user following
              foreach($rss as $row){
                $id_inq = $row->user_two;
                $query=$db_connection->prepare('SELECT username FROM users WHERE id = :id');
                $query->execute(['id' => $id_inq]);
                while($rss=$query->fetch()){
                  $name=$rss['username'];
                  print '<div class="single-msg">' .$name. '</br> </div>';
                }
              }
            ?>
        </div>
      </div>

      <div class="friend_title" id="1rcorners1"> 
        <h2> Interests </h2>
      </div>

      <div class="friend" id="1rcorners1"> 

        <div class="container3">
        <img src=<?php echo $int_img_1?> width="170" height="170" class="image" id="rcorners1" alt="interest not found :("> 
          <div class="overlay_int"> 
              <div class="text" > <?php echo $int_txt_1  ?>
              </div> 
          </div> 
        </div>

        <div class="container3">
        <img src=<?php echo $int_img_2?>  width="170" height="170"  class="image" id="rcorners1" alt="interest not found :("> 
          <div class="overlay_int"> 
              <div class="text"> <?php echo $int_txt_2  ?>
              </div> 
          </div> 
        </div>

        <div class="container3">
        <img src=<?php echo $int_img_3?> width="170" height="170" class="image" id="rcorners1" alt="interest not found :("> 
          <div class="overlay_int"> 
              <div class="text"> <?php echo $int_txt_3  ?>
              </div> 
          </div> 
        </div>

        <div class="container3">
        <img src=<?php echo $int_img_4?>  width="170" height="170" class="image" id="rcorners1" alt="interest not found :(">  
          <div class="overlay_int"> 
              <div class="text"> <?php echo $int_txt_4  ?>
              </div> 
          </div> 
        </div>

        <div class="container3">
        <img src=<?php echo $int_img_5?>  width="170" height="170" class="image" id="rcorners1" alt="interest not found :(">  
          <div class="overlay_int"> 
              <div class="text"> <?php echo $int_txt_5 ?>
              </div> 
          </div> 
        </div>

      </div>
    </div>
  </body>
</html>

