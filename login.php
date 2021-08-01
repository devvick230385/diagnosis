<?php include("includes/connection.php") ?>
<?php 

  include("includes/connection.php");

  if(isset($_GET['signup'])){
    $successful = $_GET['signup'];
    $successMsg = '<div class="alert alert-danger" role="alert">
    <strong>Welcome'.$successful. '/Email or Password</strong>
</div>';
}
    $successMessage = $errorMessage = "";
    if(isset($_POST['btnLogin'])){
      $user_id = $_POST['txtUserID'];
      $password = $_POST['txtPassword'];
      $sql = "SELECT * FROM users WHERE email = '$user_id'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) < 1 ){
        $errorMessage = '<div class="alert alert-danger" role="alert">
                              <strong>Incorrect Username/Email or Password</strong>
                          </div>';
                          
                          
      }elseif(mysqli_num_rows($result) > 0){

        while($row =  mysqli_fetch_assoc($result)){
          $hashed_password = $row['password'];
          $id = $row['id'];

        }
        // dehash password and compare
        $check_password = password_verify($password, $hashed_password);

        if(!$check_password){
          
          $errorMessage = '<div class="alert alert-danger" role="alert">
                              <strong>Incorrect Username/Email or Password</strong>
                          </div>';                          
         }else{

          // User is valid, create sessions
          session_start();          
          $_SESSION['user_identity'] = $user_id;
          $_SESSION['id']=TRUE;
          $_SESSION['logged_in'] = $id;
          $_SESSION['email'] = $user_id;

          // set cookies
          $duration = time(60 * 60 * 24 * 365);

          
        
          setcookie('User', $user_id, $duration);
          setcookie('Password', $password, $duration);          
          header("Location: confirm.php?login=confirm");

        }
        
      }

    }


?>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="./bs4/css/bootstrap.css">



    </head>

    <Body>  
        <div class="container-fluid nav">
            <h2 class="home_nav"><a href="Home.php" style="color: white;">home page</a></h2>
        </div>
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                    <?=$successMessage ?>
                    <?=$errorMessage ?>
                <form action="login.php" class="" method="post">
                <!-- <form role="form" method="POST" action="login.php"> -->
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="txtUserID" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" name="txtPassword" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <a href="signup.php">Sign up</a>
                    <!-- <button type="submit" name="btnLogin" class="btn btn-success">Submit</button> -->
                    <button type="submit" name="btnLogin" class="btn btn-primary btn-block rounded">Login</button><br>
                </form>

            </div>
            <div class="col-md-4"></div>

        </div>
        <!-- <img src="images/Med1.jpg"> -->
        <!--<div id="Login">
        
        Username:<input type="text" name="txtmail" placeholder="Please Enter Your Email..." style="height: 5%; width: 20%; font-size: 100%">
        <br><br><br>
        Password: <input type="password" name="txtpass" placeholder="Input Your Password Please... " style="height: 5%; width: 20%; font-size: 100%;">
        <br><br>
        <a href="Symptoms.html"><input type="submit" name="btnLogin" value="Login" style="margin-left:21%;"></a>
	<br>
	<br>
	<p> Please <a href="Signin.html"> Click here to Register </a> if you do not have an account with us. </p>
    
<div id="Back"><a href="Home.html"><input type="submit" name="btnBack" value="Back"  style="margin-right:50%; margin-top: 15%;"></a></div>
    

</div>-->
    <div class="container-fluid nav" style="height:50px; text-align: center; margin-top: 150px;">
        <p class="home_nav">ESSSD</p>
    </div>
    <script src="./bs4/js/jquery-3.5.1.min.js"></script>
    <script src="./bs4/js/bootstrap.js"></script>
    </Body>



    </html>