<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
      $mypassword = mysqli_real_escape_string($dbc,$_POST['password']); 
      
     $sql = "SELECT user_id,level FROM login WHERE user_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($dbc,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        if ($row['level']=="Admin")
			{ 
                $_SESSION['login_user']=$myusername;
                header ("location: admin/admin_dashboard.php");    
			}
			else if ($row['level']=="User")
			{ 
                 $_SESSION['login_user']=$myusername;
                 header ("location: admin/patient_dashboard.php");          
            }
      }
       else {
         $error = "Your Login Name or Password is invalid";
        }
   }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Eye Vision | Login </title>

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
    <div class="container" style="width:400px">
        <img src="assets/images/login.png" />
        <form method="post" action="login.php">
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Username" name="username">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password">
            </div>
            <div class="input-container">
                <input type="submit" type="submit" value="LOGIN" class="btn-login" />
                <a href="register.php"><input type="button" value="SIGN UP" class="btn-login" /></a>
            </div>
            <p>Forgot Password?<a href="forgot.php"> Reset here</a></p><br>
            <?php
                if(!empty($error)){ echo "<div class='alert alert-danger'>" . $error . "</div>"; }
            ?>
        </form>
    </div>

</body>

</html>
