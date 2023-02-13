<?php
class Database
{
    function dbConnection(){
    # move this configuration file out of the web server's range!!!
        $dbconf = simplexml_load_file("../../config_db.xml");
        if ($dbconf === FALSE) {
            echo "Failed loading XML\n";
            foreach(libxml_get_errors() as $error) {
                echo "\t", $error->message;
            }   
        }
        else {
            $db = new PDO("mysql:host=$dbconf->mysql_host;dbname=$dbconf->mysql_database;charset=utf8",
                  "$dbconf->mysql_username", "$dbconf->mysql_password")
                  or die('Error connecting to mysql server');
        }
    } 
} 
?>
