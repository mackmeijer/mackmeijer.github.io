<!-- upload_four.php -->

<?php
    // connect to database
    require 'includes/init.php';

    if (isset($_POST['submit'])) {
        $_file = $_FILES['file'];

        // fetch file data
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];

        // process file name
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        // check if file type is allowed
        if (in_array($fileActualExt, $allowed)){
            // check for errors
            if ($fileError === 0) {
                // check if file size is too big
                if ($fileSize < 1000000) {
                    // give file unique name
                    $fileNameNew = uniqid('', true).".".$fileActualExt;

                    // upload file to upload folder
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    
                    // put file name in database
                    $stmt = $db_connection->prepare('SELECT * FROM photo_4 WHERE id= :id');
                    $stmt->execute(['id' => $_SESSION['user_id']]);
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);   
                    if( ! $row) {
                        $stmt = $db_connection->prepare('INSERT INTO photo_4 SET  file_name = :file_name, id = :id');
                        $stmt->execute(['id' => $_SESSION['user_id'], 'file_name' => $fileNameNew]);  
                    }

                    else {
                        $stmt = $db_connection->prepare('UPDATE photo_4 SET  file_name = :file_name WHERE id = :id');
                        $stmt->execute(['id' => $_SESSION['user_id'], 'file_name' => $fileNameNew]);  
                    }            
                }
                // error messages
                else {
                    echo "file too big";
                }
            } 
            else {
                echo "an error occured while uploading your file";
            }
        } 
        else {
            echo "This file type is not allowed :/ (jpg, jpeg, png, pdf only!)";
        }
    }
    header("Location: profile_edit.php");
?>