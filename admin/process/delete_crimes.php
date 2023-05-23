<?php
require('../../connection/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $delete_query = "Delete FROM crimes WHERE id = $id";
    $delete_result = mysqli_query($conn, $delete_query);
    if($delete_result){
        echo '
        <meta http-equiv= "refresh" content="0; URL=../manage_crimes.php?msg=deletesuccess" />
        ';
    }
}


?>