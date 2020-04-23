<?php
include 'connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        if (isset($_POST['update'])) {
            $nid         = $_POST['id'];
            $doctor_name = $_POST['doctor_name'];
            $first_name  = $_POST['firstname'];
            $last_name   = $_POST['lastname'];
            $email       = $_POST['email'];
            $phone       = $_POST['number'];
            $date        = date('d-m-Y', strtotime($_POST['date']));
            $time        = $_POST['time'];
            $purpose     = $_POST['purpose'];
            $message     = $_POST['message'];
            $doctor_id   = $_POST['doctor_id'];
            
            if ($nid != '' || $doctor_name != '' || $first_name != '' || $last_name != '' || $email != '' || $phone != '' || $date != '' || $time != '' || $purpose != '' || $message != '' || $doctor_id != '') {
                $query1 = mysqli_query($dbc, "UPDATE appointment SET appointment_id = '$nid' , doctor_name = '$doctor_name', first_name = '$first_name' , last_name = '$last_name', email = '$email', phone ='$phone', date = '$date' , time = '$time' , purpose = '$purpose', message = '$message', doctor_id = '$doctor_id' WHERE appointment_id ='$id'");
                if ($query1) {
                    header("Location: show_appointments.php");
                }
            } else {
                echo "<p>Failed to Update Appointment </p>";
            }
        }
    }
}
?>