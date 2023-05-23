
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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Edit Criminal </h2>
        </header>
        <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $select_query ="Select * from criminals where id= $id" ;
                    $result_query =mysqli_query($conn, $select_query);
                    $data = $result_query->fetch_assoc();

                }
                    ?>

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
            $photo = $_POST['photo'];

            if($name != "" && $email != "" && $phone != "" && $height !="" && $weight !="" && $phone !="" ){
                 $sql = "UPDATE criminals SET name='$name',  surname='$surname', height='$height', weight='$weight', gender='$gender',  email='$email', phone='$phone', province='$province', district='$district' ,city='$city', photo='$photo' WHere id=$id ";
                 $result = mysqli_query($conn, $sql);
                 if($result){
                    ?>
                    <meta http-equiv ="refresh" content= "0; URL=manage_criminals.php?msg=asuccess"/>
                <?php 
                }else{
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Incorrect!</strong> All fields are .
                     <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     <?php
            }
            

        }
    }

            ?>

        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
            <div class="panel-heading"> <h3 class="fw-bold">Add Criminals</h3></div>
            <div class="panel-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6 mb-3">
                            <label>Name</label> <span class="mandetory_field"> * </span>
                            <input type="text"  class="form-control" name="name" pattern="[A-Za-z]{3,}" value="<?php echo $data['name']; ?>" >
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Surname</label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="surname"  value="<?php echo $data['surname']; ?>" >
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Height</label> <span class="mandetory_field"> * </span>
                            <input type="number" class="form-control" name="height" pattern="[A-Za-z]{3,}" min="2" placeholder="height in feet"  value="<?php echo $data['height']; ?>" >
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>weight</label> <span class="mandetory_field"> * </span>
                            <input type="number" class="form-control" name="weight" pattern="[A-Za-z]{3,}"  min="15" placeholder="weight in kg"  value="<?php echo $data['weight']; ?>" >
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>gender</label> <span class="mandetory_field"> * </span>
                            <select name="gender" class="form-control" id="" >
                                <option value="M" <?php 
                                if($data['gender']== 'M'){echo "selected";} ?>>M</option>
                                <option value="F"<?php 
                                if($data['gender']== 'F'){echo "selected";} ?> >F</option>
                            </select>
                        </div>

                    
                            <div class="col-lg-6 mb-3 ">
                                <label>Email</label> <span class="mandetory_field">  </span>
                                <input type="email" class="form-control" name="email" placeholder="example@gmail.com"  value="<?php echo $data['email']; ?>" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Phone</label> <span class="mandetory_field"> * </span>
                                <input type="tel" class="form-control" name="phone"
                                    placeholder="9875832463"  value="<?php echo $data['phone']; ?>" >
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Province</label>
                                <select class="form-control" name="province" id="province">
                                    <option value="" > Select Province </option>
                                <?php
                                $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                                $s = mysqli_query($con, "select * from province");
                                while($row=mysqli_fetch_assoc($s)){
                                    $id = $row['id'];
                                    $province1 = $row['province'];
                                    $province = $data['province'];
                                    ?>
                                      <option value="<?php echo $id; ?>" <?php if($id== $province){
                                    echo "selected";
                                   }
                                    ?> >
                                    <?php echo $province1; ?> </option>
                                   <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>District</label>
                                <select class="form-control" name="district" id="district">
                                <option value=""> Select District</option>
                                    
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>City </label>
                                <select class="form-control" name="city" id="city" >
                                <option value="" > Select City </option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Photo </label> <span class="mandetory_field"> * </span>
                                <input type="text" class="form-control" name="photo"   min="15" placeholder="photo" value="<?php echo $data['photo']; ?>" >
                            </div>
                        </div>
                    <div class="row my-4">
                        <div class="col-md-6 col-6">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span> Process</button>
                        </div>
                        <div class="col-md-6 col-6 ">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span>   Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 