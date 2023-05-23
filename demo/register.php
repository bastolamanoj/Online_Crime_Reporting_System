<?php require('../connection/config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="index.css"> -->
</head>
<body>
<?php 
    if(isset($_POST['submit'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      // for image
        $photo = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $explode_file = explode(".", $photo);
        $name = $explode_file[0];
        $fname = str_replace(" ", "", $name);
        $fielname = strtolower($fname.time());
        $ext = $explode_file[1];
        $finalfile = $fielname.".".$ext;

      $citizenshipno = $_POST['citizenshipno'];
      $province = $_POST['province'];
      $district= $_POST['district'];
      $city= $_POST['city'];
      $password= md5($_POST['password']);
      $cpassword= md5($_POST['cpassword']);
    
      if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$finalfile)){
            if($password == $cpassword){
              $sql = "INSERT INTO users (fname, lname, email, phone, gender, photo, citizenshipno, province, district, city, password,) VALUES('$fname', '$lname', '$email', '$phone', '$gender', '$finalfile', '$citizenshipno', '$province', '$district', '$city', '$password')";
              $result = mysqli_query($conn, $sql);
              print_r($result);
              if($result){
                ?>
                <meta http-equiv="refresh" content="0; URL=user_dashboard.php?msg=asuccess" />
                <?php
              }else{
                ?>
                <meta http-equiv="refresh" content="0; URL=register.php?msg=unsucess" />
                <?php
              }
            }else{
              echo "password must be same in both field";
            }

      }
      }

  ?>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10 col-lg-8 col-xl-9 h-100">
              <div class="card shadow-2-strong w-80" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center ">
                  <h3 class="mb-5">User Sign Up</h3>
                  <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-outline mb-4 col-md-6">
                            <input type="text" id="name" name="fname" class="form-control form-control-lg rounded-pill" placeholder="First name" />
                          </div>
                        <div class="form-outline mb-4 col-md-6">
                            <input type="text" id="" name="lname"  class="form-control form-control-lg rounded-pill" placeholder="Last Name " />
                          </div>
                 
                        <div class="form-outline mb-4 col-md-6">
                            <input type="email" id="email" name="email" class="form-control form-control-lg rounded-pill" placeholder="Email Address" />
                          </div>
                        <div class="form-outline mb-4 col-md-6">
                            <input type="tel" id="phone" name="phone" class="form-control form-control-lg rounded-pill" placeholder="Phone" />
                          </div>
                          

                        <div class="form-outline mb-4 col-md-6">
                           <select name="gender" id="gender"   class="form-control form-control-lg rounded-pill">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                           </select>
                          </div>

                          <div class="form-outline mb-4 col-md-6">
                            <input type="file" id="photo" name="photo" class="form-control form-control-lg rounded-pill"  />
                          </div>
                          <div class="form-outline mb-4 col-md-6">
                            <input type="text" id="citizenshipno" name="citizenshipno" class="form-control form-control-lg rounded-pill" placeholder="Citzenship Number  " />
                          </div>
                        <div class="form-outline mb-4 col-md-6">
                           <select name="province" id="province"   class="form-control form-control-lg rounded-pill">
                            <option value="gandaki">Gandaki</option>
                            <option value="pr">Bagmati</option>
                            <option value="gandaki">Gandaki</option>
                            <option value="pr">Bagmati</option>
                            
                           </select>
                          </div>
                        <div class="form-outline mb-4 col-md-6">
                           <select name="district" id="district" class="form-control form-control-lg rounded-pill">
                            <option value="Kaski">kaski</option>
                            <option value="Kathmandu">kathmandu</option>
                            <option value="Baglung">Baglung </option>
                            <option value="Syangja">Syangja</option>
                            <option value="Palpa">Palpa</option>
                           </select>
                          </div>
                        <div class="form-outline mb-4 col-md-6">
                            <input type="text" id="city" name="city" class="form-control form-control-lg rounded-pill" placeholder="City " />
                          </div>
                         
                          <div class="form-outline mb-4 col-md-6">
                            <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg rounded-pill" placeholder="password" />
                          </div>
                          <div class="form-outline mb-4 col-md-6">
                            <input type="password" id="typePasswordX-2" name="cpassword" class="form-control form-control-lg rounded-pill" placeholder="re-enter password" />
                          </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block rounded-pill" type="submit">Signup</button>
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

  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
</body>
</html>