
<?php require('inc/toppart.php'); ?>

<div class="container1">
    
    <!-- sidebar menu section start here -->
    <?php require('inc/sidebar.php'); ?>
    <!-- sidebar menu section end here -->

    <!-- main dashboard section start -->
    <div class="main-section1 ">
    <?php require('inc/user_dashboard_navbar.php'); ?>
    
    
    <div class="main-content">
<?php
if(isset($_POST['submit'])){
    $old_pass = md5($_POST['old_pass']);
    $new_pass = md5($_POST['new_pass']);
    $cnew_pass =md5($_POST['cnew_pass']);
    
    if($old_pass!="" && $new_pass!="" && $cnew_pass!=""){
        $sql = "SELECT * FROM users WHERE password = '$old_pass'";
        $fire_sql = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($fire_sql);
        
        if($row){
            if($new_pass == $cnew_pass){
                $updatequery = "UPDATE users SET password = '$new_pass'";
                $updateresult = mysqli_query($conn, $updatequery);
                if($updateresult){
                    session_destroy();
                    echo '<meta http-equiv="refresh" content="0; URL=login.php?msg=passchange"/>';
                }
            } else{
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Please!</strong> Enter same password on both field.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
        }
    }else{
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Please!</strong> All field are required.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';

    }
}
    ?>
<div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
    <div class="panel-heading">
        <h3 class="fw-bold">Change Password</h3>
    </div>
    <div class="panel-body">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
            <div class="row form-group my-4 ">
                <div class="col-lg-6 px-3 my-2">
                    <label>Old Password</label>
                    <input type="password" class="form-control p-2" name="old_pass" required>
                </div>    
                <div class="col-lg-6 px-3 my-2">
                    <label>New Password</label>
                    <input type="password" class="form-control p-2" name="new_pass" required>
                </div>    
                <div class="col-lg-6 px-3 my-2">
                    <label>New Password</label>
                    <input type="password" class="form-control p-2" name="cnew_pass" required>
                </div>    
            </div>
            <div class="row my-4 ">
                <div class="col-md-6 col-6 col-md-px-3 ">
                    <button type="submit" name="submit" class="btn btn-success w-100 btn-block p-2 btn-md"><span
                            class="fa fa-plus"></span> Process</button>
                </div>
                <div class="col-md-6 col-6 col-md-px-3">
                    <button type="reset" class="btn btn-warning btn-block w-100 btn-md p-2"><span class="fa fa-times">
                        </span> Cancel</button>
                </div>
            </div>

    </div>

    </form>

</div>
<?php require('inc/footer.php'); ?>
</div>

 