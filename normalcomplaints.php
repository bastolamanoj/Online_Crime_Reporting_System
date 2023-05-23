<?php require('connection/config.php'); ?>
<?php require('inc/toppart.php'); ?>


<div class="container-fluid">
    <?php require('inc/sidebar.php'); ?>

    <div class="main-content">
    <?php require('inc/user_dashboard_navbar.php'); ?>

        <?php
        $email = $_SESSION['uemail'];
        $s_q = "SELECT * FROM users WHERE email='$email'";
        $s_r = mysqli_query($conn, $s_q);
        $data = $s_r->fetch_assoc();
        $id = $data['id'];
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $category = $_POST['category'];
            $police_station = $_POST['police_station'];
            $address = $_POST['address'];
            $complaint_id = rand(1111111,9999999);

            $evidence = $_FILES['evidence']['name'];
            if(!empty($evidence)){
                $file_size = $_FILES['evidence']['size'];
                $explode_file = explode(".", $evidence);
                $name = $explode_file[0];
                $fname = str_replace(" ", "", $name);
                $fielname = strtolower($fname.time());
                $ext = $explode_file[1];
                $finalfile = $fielname.".".$ext;

            }
            $details = $_POST['details'];

            if($title != "" && $police_station != "" && $address != ""){
            if(!empty($evidence)){
              if(move_uploaded_file($_FILES['evidence']['tmp_name'], "crimefile/".$finalfile)){
                    $query = "INSERT INTO complaints(title, category, police_station, address, details, evidence,complaint_id, complaint_user_id) 
                    VaLUE('$title', '$category', '$police_station', '$address', '$details', '$finalfile','$complaint_id', '$id')";
                    $result = mysqli_query($conn, $query);
              }
            } 
              if(empty($evidence)){
                $query = "INSERT INTO complaints(title, category, police_station, address, details,complaint_id, complaint_user_id) 
                VaLUE('$title', '$category', '$police_station', '$address', '$details','$complaint_id', '$id')";
                $result = mysqli_query($conn, $query);
            }
       
                if($result){
                    echo '<meta http-equiv="refresh" content="0; URL=view_report.php?msg=asuccess"/>';
                    }

                }else{
                    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Incorrect!</strong> All fields are required.
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php

            }

        }

            ?>
        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
            <div class="panel-heading">
                <h3 class="fw-bold">Complaints</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
                    <div class="row form-group my-2 ">
                        <div class="col-lg-12 px-3">
                            <label>Title</label>
                            <input type="text" class="form-control p-2" name="title" required>
                        </div>
                    </div>
                    <div class="row form-group my-2 ">
                        <div class="col-lg-6 px-3">
                            <label>Category </label> <span class="mandetory_field"> * </span>
                              <select class="form-control" name="category" id="">
                                <option>Fraud </option>
                                <option>Theft</option>
                                <option> Child Abuse</option>
                                <option> Domestic Abuse</option>
                                <option> Cyber Crime and Online Fraud</option>
                                <option> Rape </option>
                                <option> Others </option>
                              </select>
                         </div>
                        <div class="col-lg-6 px-3">
                            <label>Police Station </label>
                            <input type="text" class="form-control p-2" name="police_station" required>
                        </div>
                    </div>
                    <div class="row form-group mt-2 ">
                        <div class="col-lg-6 px-3">
                            <label>Full Address</label>
                            <input type="address" class="form-control p-2" name="address" placeholder="place of crime scene " required>
                        </div>
                        <div class="col-lg-6 px-3">
                            <label>Evidence </label>
                            <input type="file" class="form-control p-2" name="evidence" >
                            <span>any photo</span>
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col-lg-12 px-3">
                            <label>Full Details</label>
                            <textarea name="details" class="form-control p-2" id="" rows="3" required></textarea>
                        </div>

                    </div>
                    <div class="row form-group my-4 ">
                        <div class="col-md-6  col-6 px-3 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block w-100 p-2 btn-md"><span
                                    class="fa fa-plus"></span> Process</button>
                        </div>
                        <div class="col-md-6 col-6 px-3">
                            <button type="reset" class="btn btn-warning btn-block btn-md p- w-100"><span class="fa fa-times">
                                </span> Cancel</button>
                        </div>
                    </div>

            </div>

            </form>
        </div>
        <?php require('inc/footer.php'); ?>
    </div>
</div>


<!-- crousel section end here -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script src="assets/js/index.js">
        // <!-- javascript for navbar -->
</script>
</body>

</html>