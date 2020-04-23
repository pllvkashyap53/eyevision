<?php
include 'connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $result = mysqli_query($dbc, "DELETE FROM appointment WHERE appointment_id = '$id'");
    if ($result) {
        header("Location: show_appointments.php");
    }
} else {
    echo "There is some problem.Appointment can not be deleted!";
}
?>
