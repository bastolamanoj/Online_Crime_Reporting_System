<?php

    require('../../connection/config.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $d_query= "DELETE FROM criminals WHERE id= $id";
        $d_result = mysqli_query($conn, $d_query);
        if($d_result){
            echo '
            <meta http-equiv= "refresh" content="0; URL=../manage_criminals.php?msg=deletesuccess" />
            ';
        }

    }
?>