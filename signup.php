<?php include("./includes/connection.php") ?>
<?php
    $errorMessage = "";
    if(isset($_POST['btnRegister'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];
        $confirmpassword = $_POST['confirmpassword'];
        $phonenumber = $_POST['mobilenumber'];
        
        if($password != $confirmpassword){
            $errormessages = "Password do not match";
        }else{
            $check_query = "SELECT * FROM users WHERE email = '$email'";
            $check_result = mysqli_query($conn, $check_query);
            if(mysqli_num_rows($check_result) > 0){
                $errorMessage = "'$email'! Already exist.";
            }else{
                $hash_pwd = password_hash($password, PASSWORD_DEFAULT);
                $insert_query = "INSERT INTO users (firstname, lastname, email, `password`, phonenumber) VALUES ('$firstname', '$lastname', '$email', '$hash_pwd', '$phonenumber')";
                $insert_result = mysqli_query($conn, $insert_query);
                if(!$insert_result){
                    die("Error!" .mysqli_error($conn));
                }else{
                    header("location:login.php?signup=$firstname");
                }
            }
        }
    }
?>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="./bs4/css/bootstrap.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
</head>
<body>
    <div class="container-fluid nav">
        <h2 class="home_nav"><a href="Home.php" style="color: white;">home page</a></h2>
    </div>
    <div class="row" style="padding-top: 30px;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <form action="signup.php" class="" method="post">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="firstname" class="form-control" id="FirstName">
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="lastname" class="form-control" id="LastName">
                </div>
                <div class="form-group">
                    <!-- <div class="alert alert-danger">
                        <?php //$errorMessage ?>
                    </div> -->
                    <label>Email:</label>
                    <input type="email" name="useremail" class="form-control" id="Email">
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" [class.is-invalid]="name.invalid && name.touch" class="form-control" id="exampleInputPassword1" name="userpassword" required>
                    <small class="is-valid-feedback text-danger"><?=$errormessages; ?></small>
                </div>      
                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input type="password" [class.is-invalid]="name.invalid && name.touch" class="form-control" id="exampleInputConfirmPassword" name="confirmpassword" required>
                    <small class="is-valid-feedback text-danger"><?=$errormessages; ?></small>
                </div> 
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="mobilenumber" class="form-control" id="PhoneNumber">
                </div> 
                <a href="login.php">login</a>
                <button type="submit" name="btnRegister" class="btn btn-success btn-block">Submit</button>
            </form>

            <!--<form>
                <h2>fill in your information</h2>
                Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtmail" placeholder="Please Enter Your Last Name..." style="height: 5%; width: 20%; font-size: 100%">
                <br><br><br>
                First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtmail" placeholder="Please Enter Your First Name..." style="height: 5%; width: 20%; font-size: 100%">
                <br><br><br>
                Middle Name:&nbsp;<input type="password" name="txtpass" placeholder="Please Enter Your Middle Name... " style="height: 5%; width: 20%; font-size: 100%;">
                <br><br><br>
                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtmail" placeholder="Please Enter Your Email..." style="height: 5%; width: 20%; font-size: 100%">
                <br><br><br>
                Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="txtpass" placeholder="Input Your Password Please... " style="height: 5%; width: 20%; font-size: 100%;">
                <br><br><br>
                Mobile No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="txtmail" placeholder="Please Enter Your Mobile No..." style="height: 5%; width: 20%; font-size: 100%">
                <br><br><br>
                Last name:<input type="text" name="txtmail" placeholder="Please Enter Your Email..." style="height: 5%; width: 20%; font-size: 100%"> -->
                <!-- <br><br><br> -->
                <!-- Last name:<input type="text" name="txtmail" placeholder="Please Enter Your Email..." style="height: 5%; width: 20%; font-size: 100%"> -->
                <!-- <br><br><br> -->
                <!-- Last name:<input type="text" name="txtmail" placeholder="Please Enter Your Email..." style="height: 5%; width: 20%; font-size: 100%"> -->
                <!-- <br><br><br>
                Male<input type="radio" name="sex" checked="male">
                Female<input type="radio" name="sex" checked="female"><br>
                <a href="Symptoms.html"><input type="button" name="submit" value="Submit" style="margin-left:21%;"></a>
            
            </form> -->
        </div>
        
    </div>
    <div class="container-fluid nav" style="height:50px; text-align: center; margin-top: 150px;">
        <p class="home_nav">ESSSD</p>
    </div>

    <script src="./bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./bs4/js/bootstrap.js"></script>
</body>
</html>