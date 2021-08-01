<?php
    session_start();
    include("includes/connection.php");
    $author_id = $_SESSION['logged_in'];
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE id = '$author_id'");
    while($row = mysqli_fetch_assoc($sql)){
        $user_name = $row['firstname'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnose</title>
    <link rel="stylesheet" href="./bs4/css/bootstrap.css">
</head>
<body>
    <div class="container mt-4">
        <?php

            if(isset($_GET['diagnose'])){
                $diagnose = $_GET['diagnose'];
                echo '<h4 class="text-center mt-5 bg-danger p-4 text-white rounded">Hey '.$user_name.' you are likely to be suffering from <u><i><strong>'.$diagnose.'</strong></i></u></h4>';
            }




        ?>
        <h5>Cure: <small>Drink snipper. Snipper mainly kills pests, vectors and as well diseases. </small></h5>
        <h5>Dose: <small>1 medium sized container after every 4hrs</small></h5>
        <div class="d-flex justify-content-center mt-5">
        <a class="btn btn-primary" href="symptoms.php"><<- Go Back </a>
        </div>
    </div>
</body>
</html>