
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel </title>
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     -->
</head>

<body style="background-color: #0BE0FD; background-image: url('../img/cybercrime.jpg'); background-repeat:no-repeat;  background-size: cover;">
    <div class="container bg-primary rounded">
        <h1>Crime Reporting Login</h1>
     

        <div class="form-section bg-success"> 
  
             <div class="form-btn">
                <span onclick="adminlogin()">Admin </span>
                <span onclick="policelogin()">Employee </span>
                <hr id="indicator">
              </div>  
              <?php
        // if(isset($_GET['msg'])){
        //     if($_GET['msg']=='loginerror'){
        //         echo '
        //         <div class="alert alert-success alert-dismissible fade show" role="alert" style="width:90%; background-color: red; color: white;">
        //         <strong>OOPs!</strong> Login Error. Please enter valid username and password
        //         <button type="button"  style="padding" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //         </div>
        //         ';
        //     }
        // }

        ?>
            <form  id="adminForm" action="process/login_process.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" id="username" placeholder=" Username"><br>
                <input type="password" name="password" id="password" placeholder="Enter Password"><br>
                <button type="submit" name="login_admin">login </button>
            </form>
            <form  id="policeForm" action="process/police_login_process.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" id="username" placeholder=" Username"><br>
                <input type="password" name="password" id="password" placeholder="Enter Password"><br>
                <button type="submit" name="login_employee">login </button>
            </form>
        </div>
    </div>

    <script src="assets/js/loginScript.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>