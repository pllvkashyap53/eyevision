<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
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
                <li class="active"><a href="show_appointments.php">Show Appointments</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="registered_patients.php">Registered Patients</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="search.php">Search Patient</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="show_faqs.php">Show FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="add_faq.php">Add FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float:right">
                <li><a href="../index.php">Go to Index</a></li>
                <li class="active"><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="banner-strip">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 style="font-size:64px;text-align:center;margin-top:220px">Welcome <?php echo $login_session; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
