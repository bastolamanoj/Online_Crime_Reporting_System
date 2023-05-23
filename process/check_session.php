<?php 
session_start();
if(!$_SESSION['uemail'] && !$_SESSION['upassword']){
   ?>
    <meta http-equiv="refresh" content="0; URL=/ocrs/login.php"/>
   <?php
}

?>
<?php
// session_start();
// if(!$_SESSION['email']) {
//     ?>

 <?php

// }

?>