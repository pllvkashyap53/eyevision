 <?php
include 'connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id     = $_GET['id'];
    $sql    = "SELECT * FROM appointment WHERE appointment_id = '$id'";
    $result = mysqli_query($dbc, $sql);
    
?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <title>Bootstrap Example</title>
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
                <li><a href="registered_patients.php">Registered Patients</a></li>
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
             <h2>Update Appointment</h2>

             <div class="row">
                 <div class="col-sm-12">
                     <form class="appointment panel panel-body marbot40 panel-grey" method="post" action="edit_appointment.php?id=<?php
    echo $id;
?>">
                         <!-- Form Section -->
                         <?php
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
            $doctor_id      = $row["doctor_id"];
            
?>
                         <div class="row clearfix">
                             <div class="clearfix">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="id">Appointment ID</label>
                                         <input name="id" type="text" value="<?php
            echo $appointment_id;
?>" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="clearfix">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="doctor_name">Doctor Name</label>
                                             <input name="doctor_name" type="text" value="<?php
            echo $doctor_name;
?>" class="form-control" placeholder="">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row clearfix">
                             <div class="clearfix">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="firstname">Patients's First Name</label>
                                         <input name="firstname" type="text" value="<?php
            echo $first_name;
?>" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="clearfix">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="lastname">Patient's Last Name</label>
                                             <input name="lastname" type="text" value="<?php
            echo $last_name;
?>" class="form-control" placeholder="">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row clearfix">
                             <div class="clearfix">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="email">Email ID</label>
                                         <input name="email" type="text" value="<?php
            echo $email;
?>" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="clearfix">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="number">Phone Number</label>
                                             <input name="number" type="text" value="<?php
            echo $phone;
?>" class="form-control" placeholder="">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row clearfix">
                             <div class="clearfix">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="date">Date</label>
                                         <input name="date" type="text" value="<?php
            echo $date;
?>" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="clearfix">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="time">Time</label>
                                             <input name="time" type="text" value="<?php
            echo $time;
?>" class="form-control" placeholder="">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row clearfix">
                             <div class="clearfix">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="purpose">Purpose</label>
                                         <input name="purpose" type="text" value="<?php
            echo $purpose;
?>" class="form-control" placeholder="">
                                     </div>
                                 </div>
                                 <div class="clearfix">
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="message">Message</label>
                                             <textarea name="message" class="form-control" value="" placeholder=""><?php
            echo $message;
?></textarea>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="row clearfix">
                             <div class="clearfix">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="doctor_id">Doctor ID</label>
                                         <input name="doctor_id" type="text" value="<?php
            echo $doctor_id;
?>" class="form-control" placeholder="">
                                     </div>
                                 </div>

                             </div>

                             <div class="row clearfix">
                                 <div class="col-md-6">
                                     <button type="submit" name="update" class="btn btn-type1-reverse">Update Appointment</button>
                                 </div>
                                 <div class="col-md-6">
                                     <a href="show_appointments.php"><button type="button" name="back" class="btn btn-type1-reverse">Go Back</button></a>
                                 </div>
                             </div>
                             <!-- // Form Section -->
                         </div>
                         <?php
        }
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
