<?php 
 
    //Database login information
    $host       = "localhost";
    $user       = "root";
    $pass       = "";
    $dbname     = "news";

    $tableName  = "allnews";

    //Connecting to the Database
    $conn    = mysqli_connect($host, $user, $pass, $dbname);

    //If there is an error, end the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>