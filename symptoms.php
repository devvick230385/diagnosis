<?php include("includes/connection.php") ?>
<?php
    session_start();
     if(!$_SESSION['logged_in']){
        header("Location: login.php");
    }

    if(isset($_POST['send'])){
        $gono = $_POST['gono'];
        $syph = $_POST['syph'];
        $gen = $_POST['gen'];

        if($gono > $syph && $gono > $gen){
            header("location:diagnose.php?diagnose=gonorrhoea");
        }elseif($syph > $gono && $syph > $gen){
            header("location:diagnose.php?diagnose=syphilis");
        }else{
            header("location:diagnose.php?diagnose=genital_herpes");
        }

    }



?>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid nav">
        <h2 class="home_nav"><a href="Home.php" style="color: white;">home page</a></h2>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <div class="container">
        <div id="symp">
            <h1>Please tick the selected symptoms felt</h1>
            <hr>
        </div>
        <div class="sex">
            <form method="post">
                <div id="symp1" style="margin-right:0%">
                <div class="row">
                    <?php
                        $query = "SELECT * FROM symptoms";
                        $result = mysqli_query($conn, $query);
                        if(!$result){
                            die("Error". mysqli_error($conn));
                        }else{
                            while($row=mysqli_fetch_assoc($result)){
                                $id=$row['id'];
                                $name=$row['name'];
                                $illness_id = $row['illness_id'];

                                $sql = mysqli_query($conn,"SELECT * FROM illness WHERE id = '$illness_id'");
                                while($info = mysqli_fetch_assoc($sql)){
                                    $ill = $info['name'];
                                }
                    ?>
                        <div class="form group">
                            <label for="symptoms"><input type="checkbox" value="<?=$ill?>" id="unchecked"  class="symps" name="<?=$ill?>"> <?=$name ?></label>
                        </div>
                    <?php
                            }
                        }
                    ?>
                     <div class="col-md-6">
                        <button class="btn btn-success" type="submit" name="send">submit</button>    
                    </div>
                   
                </div>
                <!-- <p type="text" value="0" name="gono" id="gono"></p> -->
            <input type="hidden" value="" name="syph" id="syph">
            <input type="hidden" value="" name="gono" id="gono">
            <input type="hidden" value="" name="gen" id="gen">
            </form>
          
           
        </div>
    </div>
    <div class="container-fluid nav" style="height:50px; text-align: center; margin-top: 150px;">
        <p class="home_nav">ESSSD</p>
    </div>

    <script src="script.js"></script>
</body>

</html>