<?php
require ('../../connection/config.php');

if(isset($_POST['login_admin'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $select_query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $select_result= mysqli_query($conn, $select_query);
    $data = mysqli_fetch_array($select_result);
    
    if($data){
        while($data) {
            $role = $data['access'];
        echo json_encode($count);
        // echo $count;
        session_start();
        $_SESSION['username'] ="$username";  //$_SESSION['SESSION_VARIABLE'] = "value";
        $_SESSION['password'] ="$password";   
        $_SESSION['role'] = "$role";  
   
         header("Location: ../dashboard.php?msg=loginsuccess");
        } 
    }

    else{
    
         header("Location: ../index.php?msg=loginerror");
        
    }

}

?>