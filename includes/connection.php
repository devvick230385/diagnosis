<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "medical_app";

    $conn = mysqli_connect($server, $username, $password, $db_name);

    if(!$conn){
        die("Error" .mysqli_error($conn));
    }else{
        // echo "We are connected!";
    }

?>