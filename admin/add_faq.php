<?php
include 'connect.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (isset($_POST['submit'])) {
        $header  = $_POST['header'];
        $content = $_POST['content'];
        
        if ($header != '' || $content != '') {
            
            $query = mysqli_query($dbc, "INSERT INTO sub_faq VALUES (default,'$header','$content')");
            if ($query) {
                echo "<br/><br/><span>FAQ Added Successfully...!!</span>";
            }
        } else {
            echo "<p>Failed to Add FAQ <br/> Fields are Blank....!!</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add FAQ</title>
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
                <li><a href="show_faqs.php">Show FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="add_faq.php">Add FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float:right">
                <li><a href="../index.php">Go to Index</a></li>
                <li><a href="logout.php">Sign Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="banner-strip">
        <div class="container">
            <h2>Add More Frequently Asked Questions and Answers Here</h2>

            <div class="row">
                <div class="col-sm-12">
                    <form class="appointment panel panel-body marbot40 panel-grey" method="post" action="add_faq.php">
                        <!-- Form Section -->
                        <div class="row clearfix">
                            <div class="clearfix">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="header">FAQ Header</label>
                                        <input name="header" type="text" class="form-control" id="header" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="clearfix">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" class="form-control" id="content" style="width:737px;height:544px;"> </textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-type1-reverse">Add FAQ</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="show_faqs.php"><button type="button" name="back" class="btn btn-type1-reverse">Go Back</button></a>
                                </div>
                            </div>
                            <!-- // Form Section -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
