<?php 

require ('../../connection/config.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "SELECT * FROM filemanager WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $select_row = $result-> fetch_assoc();
    $filelink = $select_row['filelink'];
    $finalfilelink = '../uploads'.$filelink;
    unlink($finalfilelink);

    $d_query ="DELETE FROM filemanager WHERE id= $id";
    $d_result = mysqli_query($conn, $d_query);
    if ($d_result){
        echo header('Location: ../manage_files.php?msg=dsuccess');

    }else{
        echo header('Location: ../manage_files.php?msg=derror');
    }

}
