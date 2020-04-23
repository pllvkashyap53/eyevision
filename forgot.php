<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['reset'])) {
      $email = mysqli_real_escape_string($dbc,$_POST['email']);
      $password = mysqli_real_escape_string($dbc,$_POST['password']);
      $password1 = mysqli_real_escape_string($dbc,$_POST['password1']);
      
      $sql = "SELECT * FROM login WHERE email = '$email'";
      $result = mysqli_query($dbc,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      if($count >0 ){
          if($password == $password1 ){
               $query1 = mysqli_query($dbc, "UPDATE login SET password = '$password' , password1 = '$password1' WHERE email ='$email'");
           $error1 = "Password Changed Successfully";
            }
       else {
         $error = "Your Password Doesnot Matches";
       }
      }
          else{
              $error = "This Email does not exist";
          }
          }
   }
?>


<!DOCTYPE html>
<html>

<head>
    <title> Eye Vision | Forgot Password</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="width:400px;height:400px">
        <img src="assets/images/login.png" />
        <form method="post" action="forgot.php">
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Enter Email" name="email">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Enter New Password" name="password">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Confirm New Password" name="password1">
            </div>
            <div class="input-container">
                <input type="submit" type="submit" name="reset" value="Submit" class="btn-login" />
            </div><br>
            <?php
                if(!empty($error)){ echo "<div class='alert alert-danger'>" . $error . "</div>"; }
                if(!empty($error1)){ echo "<div class='alert alert-success'>" . $error1 . "</div>"; }
            ?>
        </form>
    </div>

</body>

</html>
