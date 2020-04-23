<?php
include 'connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id     = $_GET['id'];
    $sql    = "SELECT * FROM sub_faq WHERE sub_id = '$id'";
    $result = mysqli_query($dbc, $sql);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update FAQ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        textarea.form-control {
            width: 737px;
            height: 544px;
        }

    </style>
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
            <h2>Update FAQ</ h2>

                <div class="row">
                    <div class="col-sm-12">
                        <form class="appointment panel panel-body marbot40 panel-grey" method="post" action="edit_faq.php?id=<?php
    echo $id;
?>">
                            <!-- Form Section -->
                            <?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $sub_header  = $row["sub_header"];
            $sub_content = $row["sub_content"];
?>
                            <div class="row clearfix">
                                <div class="clearfix">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="header">FAQ Header</label>
                                            <input name="header" type="text" value="<?php
            echo $sub_header;
?>" class="form-control" id="header" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="clearfix">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea name="content" class="form-control" value="" placeholder=""><?php
            echo $sub_content;
        }
?></textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <button type="submit" name="update" class="btn btn-type1-reverse">Update FAQ</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="show_faqs.php"><button type="button" name="back" class="btn btn-type1-reverse">Go Back</button></a>
                                    </div>
                                </div>
                                <!-- // Form Section -->
                            </div>
                            <?php
    }
}
?>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</body>

</html>
