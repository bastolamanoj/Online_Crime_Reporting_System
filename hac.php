<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php require('inc/navbar.php'); ?>

    <div class="container-fluid h-100 z-index-2 " style="min-height: 100vh;">
        <div class="row h-100 position-relative">
            <img class="img-fluid px-0" src="img/crime_banner.jpg" alt="" srcset="" style="max-height: 100vh;">
            <!-- <div class="position-absolute top-30 start-30  col-md-5 px-5 pb-5 pt-3 rounded" style="background-color:rgb(255, 241, 241); ">
                <h1 class="text-center">Have a Complaint ?</h1>
                <div class=" row gx-5 mt-3">
                  <div class="col-md-4 col-sm-12 my-sm-3">
                    <a class="btn btn-secondary btn-xl px-5 py-3  " href="login.php" role="button"> Normal Complaint</a> </a> 

                  </div>
                  <div class="col-md-4 col-sm-12 my-sm-3 offset-md-3">
                    <a class="btn btn-secondary btn-xl  px-5 py-3 " href="emergency_complaints.php" role="button">Emergency complaint</a> 
                  </div>
                </div>
            </div> -->
            <div class="container position-absolute bg-white w-50 " style="top: 30%; left: 25%;">
               <div class="row">
                <div class="col">
                <a class="btn btn-secondary" href="login.php" role="button"> Normal Complaint</a> </a> 
                </div>
                <div class="col">
                <a class="btn btn-secondary" href="emergency_complaints.php" role="button">Emergency Complaint</a> 
                </div>
               </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>