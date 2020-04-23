<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registered Patients</title>
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
                <li><a href="show_appointments.php">Show Appointments</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="registered_patients.php">Registered Patients</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="search.php">Search Patient</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="show_faqs.php">Show FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="add_faq.php">Add FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float:right">
                <li><a href="../index.php">Go to Index</a></li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="banner-strip">
        <div class="container">

            <div class="row">
                <?php
include 'connect.php';
?>
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Patient ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                            </tr>
                        </thead>
                        <?php
$sql    = "select * from login";
$result = mysqli_query($dbc, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row["user_id"];
        $user_name    = $row["user_name"];
        $phone     = $row["phone"];
        $email          = $row["email"];
        $level          = $row["level"];
?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php
        echo $user_id;
?></th>
                                <td><?php
        echo $user_name;
?></td>
                                <td><?php
        echo $phone;
?></td>
                                <td><?php
        echo $email;
?></td>
                                <td><?php
        echo $level;
?></td>
                            </tr>
                            <?php
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
