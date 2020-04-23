<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show FAQ</title>
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
                <li><a href="registered_patients.php">Registered Patients</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="search.php">Search Patient</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="show_faqs.php">Show FAQ</a></li>
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
            <a href="add_faq.php"><button type="button" class="btn btn-success" style="float:right">Add More Frequently Asked Questions</button></a>

            <div class="row">
                <?php
include 'connect.php';
?>
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Header</th>
                                <th scope="col">Content</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
$sql    = "select * from sub_faq";
$result = mysqli_query($dbc, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        $sub_id      = $row["sub_id"];
        $sub_header  = $row["sub_header"];
        $sub_content = $row["sub_content"];
?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php
        echo $sub_id;
?></th>
                                <td><?php
        echo $sub_header;
?></td>
                                <td><?php
        echo $sub_content;
?></td>
                                <td><a href="update_faq.php?id=<?php
        echo $sub_id;
?>"><button type="button" class="btn btn-info">Edit</button></a></td>
                                <td><a href="delete_faq.php?id=<?php
        echo $sub_id;
?>"><button type="button" class="btn btn-dark">Delete</button></a></td>
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
