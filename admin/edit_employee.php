
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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Edit Employee </h2>
        </header>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select_query = "SELECT * FROM employees WHERE id=$id"; 
            $result_query = mysqli_query($conn,$select_query);
            $row = mysqli_fetch_assoc($result_query);
            $name =$row['name'];
            $surname =$row['surname'];
            $email =$row['email'];
            $phone =$row['phone'];
            $access =$row['access'];
            $gender =$row['gender'];
            $username =$row['username'];
            $photo =$row['photo'];
            $finalfile = 'uploads/profile/'.$photo;

            // if($result_query){
            //  echo '<meta http-equiv="refresh" content="0; URL=manage_employee.php?msg=edit_success"/>';
            // }
        }
    ?>

    <?php
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $access = $_POST['access'];
            $gender = $_POST['gender'];
            $username = $_POST['username'];
            $photo = $_POST['photo'];
            // $photo = $_FILES['photo']['name'];
            // $photosize = $_FILES['photo']['size'];
            // $explodephoto =explode('.',$photo); //explode() covert string into array
            // $photoname = $explodephoto[0];
            // $ext = $explodephoto[1];
            // $fphoto = str_replace(' ','',$photoname);
            // $finalphoto = strtolower($fphoto.time());
                    
            // if(move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/profile/".$finalphoto)){
            $edit_query = "UPDATE employees SET name='$name', surname='$surname', email='$email', phone='$phone', access='$access', gender='$gender' ,username='$username', photo ='$photo' WHERE id=$id";
            $edit_result = mysqli_query($conn,$edit_query);
            if($edit_result){
                echo '<meta http-equiv="refresh" content="0; URL=manage_employee.php?msg=updatesuccess" />';      
            }  
        }
        
    // }

        ?>
        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
            <div class="panel-heading"> <h3 class="fw-bold">Edit Employee</h3></div>
            <div class="panel-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" pattern="[A-Za-z]{3,}" value="<?php echo $name ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{3,}" value="<?php echo $surname ?>" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone"
                                 placeholder="9875832463" value="<?php echo $phone ?>" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Access Level</label>
                            <select class="form-control" name="access" value="<?php echo $access ?>">
                                <option value="1" 
                                <?php  
                                 if($access == "1"){
                                    echo "selected";
                                 }
                                ?>>1</option>
                                <option value="2"
                                <?php  
                                 if($access == "2"){
                                    echo "selected";
                                 }
                                ?>>2</option>
                                <option value="3"
                                <?php  
                                 if($access == "3"){
                                    echo "selected";
                                 }
                                ?>>3</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                <option value="F"
                                <?php  
                                 if($gender == "F"){
                                    echo "selected";
                                 }
                                ?>
                                >F</option>
                                <option value="M" 
                                <?php  
                                 if($gender == "M"){
                                    echo "selected";
                                 }
                                ?>
                                >M</option>
                                <option value="O" 
                                <?php  
                                 if($gender == "O"){
                                    echo "selected";
                                 }
                                ?>
                                >O</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                        </div>
                        <div class="col-lg-6">
                            <label>Photo</label>
                            <input type="text" class="form-control" name="photo"  value="<?php echo $photo ?>">
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-6 col-6 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span> Process</button>
                        </div>
                        <div class="col-md-6 col-6">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span>Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>