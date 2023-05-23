<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- <link rel="stylesheet" href="index.css"> -->
</head>
<body style="">
<!-- <img class="img-fluid px-0" src="img/crime_banner.jpg" alt="" srcset="" style="max-height: 100vh;"> -->

    <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 h-100">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center ">
                <?php
                  if(isset($_GET['msg'])){
                    if($_GET['msg']== 'passchange'){
                      echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Please!</strong> password updated successfully
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      ';

                    }
                   
                    if(isset($_GET['msg'])=='success'){
                        // echo '
                        // <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-0 mt-0 w-100 rounded-pill" role="alert">
                        // <strong>Yeah!</strong> you are signed in successfully.
                        // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        // </div>
                        // ';
                    }
                    
                  }

                    ?>
      
                  <h3 class="mb-5">User Sign in</h3>
                <form action="process/login_process.php" method="post">
                  <div class="form-outline mb-5 ">
                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg rounded-pill" placeholder="email address" name="email" required />
               
                  </div>
      
                  <div class="form-outline mb-5">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg rounded-pill" placeholder="password" name="password" required/>
                   
                  </div>
      
                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                  </div>
                  
                  <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit" name="submit">Login</button>
                  <p class="mt-2">Don't have an account? <a href="register.php" class="link-info">Register here</a></p>
                  <hr class="my-2">
      

                </form>
                  <!-- <button class="btn btn-md btn-inline-block py-2 btn-primary rounded-pill" style="background-color: #f3331a;"
                    type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                  <button class="btn btn-md btn-inline-block btn-primary mb-2  py-2 rounded-pill" style="background-color: #1c56d4;"
                    type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>
                   -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>