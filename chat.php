<!-- chat.php -->

<!-- Based on this code: https://github.com/EngrAbuhena/Real-time-chat-system-using-php-mysql-pdo-and-ajax -->

<?php

    // include header, connect to database
    include 'header_logged.html';
    require 'includes/init.php';

    // check if logged in 
    if(isset($_SESSION['user_id']) && isset($_SESSION['user'])){
        $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
        if($user_data === false){
        header('Location: logout.php');
        exit;
        }
    }

    else{
        header('Location: logout.php');
        exit;
    }

    // fetch username
    $stmt = $db_connection->prepare('SELECT username FROM users WHERE id = :id');
    $stmt->execute(['id' => $_SESSION['user_id']]);
    while($row=$stmt->fetch()){ 
        $username2=$row['username'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Hii-FiVE - Global chat </title>
    <link rel="stylesheet" href="resources/style.css">
    <script type="text/javascript" src="resources/jquery.js"></script>
</head>

<body style= "background:  rgba(252, 84, 69, 0.842);">
    <div id="wrapper" >
        <h1 style="text-align: center">Welcome <?php echo $username2; ?> to the global chat :)</h1>
        <div class="chat_wrapper">
            <div id="chat"></div>
            <form class="" id="msgform" action="chat.php" method="post">
                <textarea name="message" maxlength="280" rows="8" id="error" cols="80" style="resize: none" class="textarea" onblur="checkTextField(this);"></textarea>
            </form>
        </div>
    </div>

    <br>

    <h1> Bible Verses</h1>
        <p>
            Romans 8:38-39 For I am convinced that neither death nor life, neither angels nor demons, neither the present nor the future, nor any powers, neither height nor depth, nor anything else in all creation, will be able to separate us from the love of God that is in Christ Jesus our Lord.
        </p>
        <br>
        <p>
            John 4:18: There is no fear in love. But perfect love drives out fear, because fear has to do with punishment. The one who fears is not made perfect in love.
        </p>
        <br>
        
<script type="text/javascript">
LoadChat();
setInterval(function () {
    LoadChat();
}, 1000);
function LoadChat() {
    $.post('handlers/messages.php?action=getMessages', function (response) {

        var scrollpos = $('#chat').scrollTop();
        var scrollpos = parseInt(scrollpos) + 420;
        var scrollHeight = $('#chat').prop('scrollHeight');

        $('#chat').html(response);
        if (scrollpos < scrollHeight){

        } else{
            $('#chat').scrollTop($('#chat').prop('scrollHeight'));
        }

    })
}
$('.textarea').keyup(function(e){
        //alert(e.which);
    if (e.which == 13 )  {
        //alert('enter is pressed')
        $('form').submit();
    }
    });
$('form').submit(function () {
    //alert('form is submit jquery');
    var message = $('.textarea').val();
    $.post('handlers/messages.php?action=sendMessage&message='+message, function (response) {
        //alert(response);
        if (response==1){
            LoadChat();
        }
        document.getElementById('msgform').reset();
    });
    return false;
})

function checkTextField(field) {
document.getElementById("error").innerText =
(field.value === "") ? "" : "";
}
</script>
</body>
</html>
