<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Medical History</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Eye Vision</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="history.php">View my Medical History</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float:right">
                <li class="active"><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="banner-strip">
        <div class="container">
            <form class="navbar-form navbar-left" action="history.php" method="post">
                <div class="input-group">
                    <label for="basic-url">Please Enter Your Email Here:</label>&nbsp;&nbsp;
                    <div class="input-group mb-6">
                        <input type="text" class="form-control" name="history" aria-describedby="basic-addon6">
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-default" name="submit" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="row">
                <?php
include 'connect.php';
?>
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Message</th>
                            </tr>
                        </thead>
                        <?php
if (isset($_POST['submit'])) {
    $email = $_POST['history'];
    
    $sql    = "SELECT * FROM appointment WHERE email='$email'";
    $result = mysqli_query($dbc, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $appointment_id = $row["appointment_id"];
            $doctor_name    = $row["doctor_name"];
            $first_name     = $row["first_name"];
            $last_name      = $row["last_name"];
            $email          = $row["email"];
            $phone          = $row["phone"];
            $date           = $row["date"];
            $time           = $row["time"];
            $purpose        = $row["purpose"];
            $message        = $row["message"];
?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php
            echo $appointment_id;
?></th>
                                <td><?php
            echo $doctor_name;
?></td>
                                <td><?php
            echo $first_name;
?></td>
                                <td><?php
            echo $last_name;
?></td>
                                <td><?php
            echo $email;
?></td>
                                <td><?php
            echo $phone;
?></td>
                                <td><?php
            echo $date;
?></td>
                                <td><?php
            echo $time;
?></td>
                                <td><?php
            echo $purpose;
?></td>
                                <td><?php
            echo $message;
        }
?></td>
                            </tr>
                            <?php
    } else {
        echo '<script language="javascript">';
        echo 'alert("No Any Medical History Yet")';
        echo '</script>';
    }
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
