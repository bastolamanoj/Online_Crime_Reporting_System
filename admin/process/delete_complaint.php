<?php
 require('../../connection/config.php');

 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM complaints WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $select_row = $result-> fetch_assoc();
    $filelink = $select_row['evidence'];
    $finalfilelink = '../uploads'.$filelink;
    unlink($finalfilelink);

    $d_query = "DELETE FROM complaints Where id = $id";
    $d_result = mysqli_query($conn,$d_query);
    if($d_query){
        ?>
        <meta http-equiv="refresh" content=" 0; URL= ../manage_complaints.php?msg=deletesuccess">
        <?php
    }
 }


?>