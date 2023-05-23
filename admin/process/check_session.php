<?php 
session_start();
if(!$_SESSION['username'] && !$_SESSION['password'] && !$_SESSION['role']){
   ?>
    <meta http-equiv="refresh" content="0; URL=../admin/index.php"/>
   <?php
}

