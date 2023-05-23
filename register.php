<?php require("connection/config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .form-control{
                background-color: rgba(250, 251, 251, 1)!important ;
                /* background-color: white!important ; */
                color: black!important ;
            }
            input[type="file"]{
                /* background-color:black!important; */
            }
            hr{
                height:3px!important;
            }
            .btn{
                background-color:rgba(50,50,250,1);
                color:white;
            }
            .btn:hover{
                background-color:#4f4343;
                color:white;
            }
            .line{
                background-color:black;
                color:black;
                height: 0.15em !important;
                
            }
        </style>
</head>

<body
    style="background-image: url('img/crime_banner.jpg'); background-repeat: no-repeat; background-size: cover; height:100vh;">

    <section class="vh-100 position-relative">
        <div class="w-50 w-sm-100 pt-1 h-100 m-auto">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-10 col-lg-8 col-xl-8 bg-gradient  h-100"
                    style="border-radius: 30px; background-color: rgba(250, 251, 250);">
                    <?php
                    if(isset($_GET['msg'])=='success'){
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-0 mt-0 w-100 rounded-pill" role="alert">
                        <strong>wrong!</strong> email you entered is already exits.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                    }
                    ?>
                    <h3 class="mt-3 text-dark text-center">User Sign Up</h3>
                    <hr class=" w-50 mt-0 mx-auto line">
                    <?php
                    if(isset($_POST['submit'])){
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $uemail =$_POST['email'];
                        // email verificaion
                        $s_q = "SELECT * FROM users WHERE email='$uemail'";
                        $s_r = mysqli_query($conn, $s_q);
                        $data= mysqli_fetch_assoc($s_r);
                        if(!$data){
                            $email = $_POST['email'];
                        }else{
                            echo '
                            <meta http-equiv="refresh" content="0; URL=register.php?msg=emailerr" />
                            ';
                            die();
                        }
                        $phone = $_POST['phone'];
                        $gender = $_POST['gender'];

                    // fjaskdfjaslkdfjaslk
                        $photo = $_FILES['photo']['name'];
                        $photosize = $_FILES['photo']['size'];
                        $explode_file = explode(".", $photo);
                        $name = $explode_file[0];
                        $fname1 = str_replace(" ", "", $name);
                        $fielname = strtolower($fname1.time()); 
                        $ext = $explode_file[1];
                        $finalfile = $fielname.".".$ext;

                        $citizenshipno = $_POST['citizenshipno'];
                        $province = $_POST['province'];
                        $district = $_POST['district'];
                        $city = $_POST['city'];
                        $password = md5($_POST['password']);
                        $cpassword = md5($_POST['cpassword']);
                        
                        if($password == $cpassword){
                            if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$finalfile)){
                                $sql ="INSERT INTO users(fname, lname, email, phone, gender, photo, citizenshipno, province, district, city, password) VALUES('$fname', '$lname', '$email', '$phone', '$gender', '$finalfile', '$citizenshipno', '$province', '$city', '$district', '$password')";
                                $result=mysqli_query($conn, $sql);

                        
                            if($result){
                                ?>
                                <meta http-equiv="refresh" content="0; URL=login.php?msg=success" />
                                <?php
                            }else{
                            
                                echo "result error";
                            }
                        }
                    }else{
                        echo "password must be same in both field";
                    }
                    }
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"
                        class="px-2 py-2">
                        <div class="row my-3">
                            <div class="form-group col-md-6">

                                <input type="text" class="form-control form-control-lg  rounded-xl" name="fname" id=""
                                    aria-describedby="helpId" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-lg  rounded-xl" name="lname"
                                    id="lname" aria-describedby="helpId" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="form-group col-md-6">

                                <input type="text" class="form-control form-control-lg  rounded-xl" name="email" id=""
                                    aria-describedby="helpId" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-6">

                                <input type="tel" class="form-control form-control-lg  rounded-xl" name="phone" id=""
                                    aria-describedby="helpId" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="form-group col-md-6">
                                <select name="gender" id="gender" class="form-control form-control-lg rounded-xl">
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-6 px-3">
                                <input type="file" class="form-control form-control-lg rounded-xl p-2" name="photo"
                                    required>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-lg  rounded-xl"
                                    name="citizenshipno" id="" aria-describedby="helpId" placeholder="Citizenship No">
                            </div>
                            <div class="form-group col-md-6">
                                <select name="province" id="province" class="form-control form-control-lg rounded-xl">
                                    <option value="gandaki">Gandaki</option>
                                    <option value="pr">Bagmati</option>
                                    <option value="gandaki">Gandaki</option>
                                    <option value="pr">Bagmati</option>

                                </select>
                            </div>

                        </div>
                        <div class="row my-2">

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-lg  rounded-xl" name="district"
                                    id="district" aria-describedby="helpId" placeholder="district ">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-lg  rounded-xl" name="city"
                                    id="city" aria-describedby="helpId" placeholder="City ">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="form-group col-md-6">
                                <input type="password" id="typePasswordX-2" name="password"
                                    class="form-control form-control-lg rounded-xl" placeholder="password" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" id="typePasswordX-2" name="cpassword"
                                    class="form-control form-control-lg rounded-xl" placeholder="re-enter password" />
                            </div>
                        </div>

                        <button class="btn  btn-lg btn-block rounded-xl" type="submit" name="submit">Signup
                        </button>
                        <hr class="my-2">


                    </form>

                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


</body>

</html>