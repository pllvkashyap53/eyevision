<!DOCTYPE html>
<html>

<head>
    <script language="javascript">
        function check() {

            if (document.form1.name.value == "") {
                alert("Please Enter Your Name");
                document.form1.name.focus();
                return false;
            }

            if (document.form1.phone.value == "") {
                alert("Please Enter Contact Number");
                document.form1.phone.focus();
                return false;
            }

            if (document.form1.email.value == "") {
                alert("Please Enter your Email Address");
                document.form1.email.focus();
                return false;
            }
            e = document.form1.email.value;
            f1 = e.indexOf('@');
            f2 = e.indexOf('@', f1 + 1);
            e1 = e.indexOf('.');
            e2 = e.indexOf('.', e1 + 1);
            n = e.length;

            if (!(f1 > 0 && f2 == -1 && e1 > 0 && e2 == -1 && f1 != e1 + 1 && e1 != f1 + 1 && f1 != n - 1 && e1 != n - 1)) {
                alert("Please Enter Valid Email");
                document.form1.email.focus();
                return false;
            }

            if (document.form1.password.value == "") {
                alert("Please Enter Your Password");
                document.form1.password.focus();
                return false;
            }
            if (document.form1.password1.value == "") {
                alert("Please Enter Confirm Password");
                document.form1.password1.focus();
                return false;
            }
            if (document.form1.password.value != document.form1.password1.value) {
                alert("Confirm Password does not match");
                document.form1.password1.focus();
                return false;
            }
            return true;
        }

    </script>

    <title>Eye Vision | Register Patient</title>

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
    <div class="container" style="width:400px;height:600px;margin-top:40px">
        <img src="assets/images/login.png" />
        <form method="post" name="form1" action="register.php" onSubmit="return check();">
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Username" id="name" name="username">
            </div>
            <div class="input-container">
                <i class="fa fa-phone icon"></i>
                <input class="input-field" type="text" placeholder="Contact Number" id="phone" name="phone">
            </div>
            <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" placeholder="Email" name="email" id="email">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password" id="password">
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Confirm Password" id="password1" name="password1">
            </div>
            <input type="submit" type="submit" value="REGISTER" class="btn-login" name="register" />
            <p>Already Registered? <a href="login.php"> Login here</a></p>

            <?php
        //including the database connection file
        include("connect.php");

        // Check If form submitted, insert user data into database.
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password1 = $_POST['password1'];
            // If email already exists, throw error
            $email_result = mysqli_query($dbc, "SELECT email FROM login where email='$email' and password='$password'");

            // Count the number of row matched 
            $user_matched = mysqli_num_rows($email_result);

            // If number of user rows returned more than 0, it means email already exists
            if ($user_matched > 0) {
                $error = "<strong>Error: </strong> User already exists with the email id '$email'.";
            } else {
                // Insert user data into database
                $result   = mysqli_query($dbc, "INSERT INTO login VALUES(default,'$username','$phone','$email','$password','$password1','User')");

                // check if user data inserted successfully.
                if ($result) {
                    $error1 = "Patient Registered successfully. You can login with your Username and Password";
                } else {
                    $error = "Registration error. Please try again." . mysqli_error($dbc);
                }
            }
        }
             if(!empty($error)){ echo "<div class='alert alert-danger'>" . $error . "</div>"; }
             if(!empty($error1)){ echo "<div class='alert alert-success'>" . $error1 . "</div>"; }        ?>
        </form>
    </div>

</body>

</html>
