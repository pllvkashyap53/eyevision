<?php
include 'connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    $result = mysqli_query($dbc, "DELETE FROM sub_faq WHERE sub_id = '$id'");
    if ($result) {
        header("Location: show_faqs.php");
    }
} else {
    echo "There is some problem.FAQ can not be deleted!";
}
?>