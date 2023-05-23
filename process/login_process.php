<?php
require('../connection/config.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    echo $email;
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password ='$password'";
    $result =mysqli_query($conn, $sql);
    $count = mysqli_fetch_row($result);
    echo $count;

    if($count){  
        session_start();
        $_SESSION['uemail'] ="$email";  //$_SESSION['SESSION_VARIABLE'] = "value";
        $_SESSION['upassword'] ="$password";   
         header("Location: ../user_dashboard.php?msg=loginsuccess"); 
    }

    else{
    
         header("Location: ../login.php?msg=loginerror");
        
    }

}

?>