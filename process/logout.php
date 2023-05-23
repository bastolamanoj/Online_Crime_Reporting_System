<?php
session_start();

// session_destroy($_SESSION['username']);
// session_destroy($_SESSION['password']);
echo $_SESSION['uemail'];
echo $_SESSION['upassword'];
unset($_SESSION['uemail']);
// session_unset($_SESSION['upassword']);
echo '<meta http-equiv="refresh" content="0; URL=../login.php?msg=logoutsuccess"/>';
?>