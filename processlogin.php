<?php include("includes/connection.php") ?>
<?php
    
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
  
            header("Location: posts.php?login=successful");
  
          }
          
        }
  
      }  
?>