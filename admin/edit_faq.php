<?php
include 'connect.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        if (isset($_POST['update'])) {
            $header  = $_POST['header'];
            $content = $_POST['content'];
            
            if ($header != '' || $content != '') {
                $query1 = mysqli_query($dbc, "UPDATE sub_faq SET sub_header = '$header' , sub_content = '$content' WHERE sub_id ='$id'");
                if ($query1) {
                    header("Location: show_faqs.php");
                }
            } else {
                echo "<p>Failed to Update FAQ </p>";
            }
        }
    }
}
?>