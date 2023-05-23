
<?php require('inc/toppart.php'); ?>

<div class="container1">
    
    <!-- sidebar menu section start here -->
    <?php require('inc/sidebar.php'); ?>
    <!-- sidebar menu section end here -->

    <!-- main dashboard section start -->
    <div class="main-section1 ">
        <!-- navabar section start here -->
        <?php require('inc/navbar.php'); ?>
        <!-- navabar part section end here -->
        <header>
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Add Criminal </h2>
        </header>

        <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $province = $_POST['province'];
            $district = $_POST['district'];
            $city = $_POST['city'];
            // for photo or file seciton start here
            $photo = $_FILES['photo']['name'];
            $photosize = $_FILES['photo']['size'];
            $explodephoto = explode(".",$photo);
            $photoname = $explodephoto[0];
            $ext = $explodephoto[1];
            $fname= str_replace(' ','',$photoname);
            $filename = strtolower($fname.time());
            $finalfile = $filename.'.'.$ext;


            if($name != "" && $email != "" && $phone != "" && $height !="" && $weight !="" && $phone !="" ){

              if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/".$finalfile)){
                 $sql = "INSERT INTO criminals(name, surname,height, weight, gender, email, phone, province, district, city, photo) VALUES('$name', '$surname', '$height','$weight', '$gender', '$email', '$phone','$province', '$district', '$city', '$finalfile')";
                 $result_query =mysqli_query($conn, $sql);
                 if($result_query){
                    ?>
                    <meta http-equiv ="refresh" content= "0; URL=manage_criminals.php?msg=asuccess"/>
                <?php 
                }else{
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Incorrect!</strong> All fields are required.
                     <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     <?php
            }
        }
        }
    }

            ?>
        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
            <div class="panel-heading"> <h3 class="fw-bold">Add Criminals</h3></div>
            <div class="panel-body">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6 mb-3">
                            <label>Name</label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="name" pattern="[A-Za-z]{3,}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Surname</label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{3,}" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Height</label> <span class="mandetory_field"> * </span>
                            <input type="number" class="form-control" name="height" pattern="[A-Za-z]{3,}" min="2" placeholder="height in feet" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>weight</label> <span class="mandetory_field"> * </span>
                            <input type="number" class="form-control" name="weight" pattern="[A-Za-z]{3,}"  min="15" placeholder="weight in kg" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>gender</label> <span class="mandetory_field"> * </span>
                            <select name="gender" class="form-control" id="">
                                <option value="M">M</option>
                                <option value="F">F</option>
                                <option value="O">O</option>
                            </select>
                        </div>

                    
                            <div class="col-lg-6 mb-3 ">
                                <label>Email</label> <span class="mandetory_field">  </span>
                                <input type="email" class="form-control" name="email" placeholder="example@gmail.com" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Phone</label> <span class="mandetory_field"> * </span>
                                <input type="tel" class="form-control" name="phone"
                                    placeholder="9875832463" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Province</label>
                              <select class="form-control" name="province" id="province">
                                    <option value="" > Select Province </option>
                                <?php
                                $con=  mysqli_connect("localhost","root", "", "province_district_city");
                                $s = mysqli_query($con, "select * from province");
                                while($data=mysqli_fetch_assoc($s)){
                                    $id = $data['id'];
                                    $province = $data['province'];
                                    echo '<option value="'.$id.'" > '.$province.' </option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>District</label>
                                <select class="form-control" name="district" id="district">
                                <option value="" > Select District </option>
                                    
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>City </label>
                                <select class="form-control" name="city" id="city" >
                                    <option value="" > Select City</option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Photo </label> <span class="mandetory_field"> * </span>
                                <input type="file" class="form-control" name="photo"    placeholder="photo" required>
                            </div>
                        </div>
                    <div class="row my-4">
                        <div class="col-md-6 col-6 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span> Process</button>
                        </div>
                        <div class="col-md-6 col-6">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span>   Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- script for district and city -->
        <script type="text/javascript">
            // $(document).ready(function(){
            //     $("#province").on('change', function(){
            //         let provinceId = $(this).val();
            //         $.ajax({
            //             method: "POST",
            //             url: "load-pdc.php",
            //             data:{id: provinceId},
            //             dataType: 'html,'
            //             success: function(data){
            //                 $("#district").html(data);
            //             }
            //         });
            //     }) ;
            // });


        </script>
        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 