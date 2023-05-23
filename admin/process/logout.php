<?php
session_start();

echo $_SESSION['username'];
echo $_SESSION['password'];
unset($_SESSION['username']);
unset($_SESSION['password']);
echo '<meta http-equiv="refresh" content="0; URL=../index.php?msg=logoutsuccess"/>';
?>