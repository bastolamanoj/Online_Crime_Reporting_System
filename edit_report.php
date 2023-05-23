<?php require('connection/config.php'); ?>
<?php require('inc/toppart.php'); ?>


<div class="container-fluid">
    <?php require('inc/sidebar.php'); ?>

    <div class="main-content">

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql ="SELECT * FROM complaints WHERE id = $id";
            $s_result = mysqli_query($conn, $sql);
            $data = $s_result->fetch_assoc();
        }




        ?>
        <?php
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $police_station = $_POST['police_station'];
            $address = $_POST['address'];
            // $evidence = $_FILES['evidence']['name'];
            // $file_size = $_FILES['evidence']['size'];
            // $explode_file = explode(".", $evidence);
            // $name = $explode_file[0];
            // $fname = str_replace(" ", "", $name);
            // $fielname = strtolower($fname.time());
            // $ext = $explode_file[1];
            // $finalfile = $fielname.".".$ext;

            $details = $_POST['details'];
            if($title != "" && $police_station != "" && $address != ""  ){
            //   if(move_uploaded_file($_FILES['evidence']['tmp_name'], "crimefile/".$finalfile)){
                    $query = "UPDATE `complaints` SET `title` ='$title', `police_station`='$police_station', `address`='$address', `details`='$details' WHERE `id`= $id ";     
                    $result = mysqli_query($conn, $query);

                    if($result){
                      echo '<meta http-equiv="refresh" content="0; URL=view_report.php?msg=usuccess"/>';
                     }
                    // } 

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
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group my-2 ">
                        <div class="col-lg-12 px-3">
                            <label>Title</label>
                            <input type="text" class="form-control p-2" name="title" value="<?php echo $data['title'] ?>" required>
                        </div>
                    </div>
                    <div class="row form-group my-2 ">
                    <div class="col-lg-6 mb-3">
                            <label>Category of Crime </label> <span class="mandetory_field"> * </span>
                            <select class="form-control" name="category">
                                <option value="Subordinate Court" <?php if($data['category']=='Fraud'){
                                    echo "selected";
                                } ?>>Fraud </option>
                                <option value="Theft"  <?php if($data['category']=='Theft'){
                                    echo "selected";
                                } ?>>Theft </option>
                                <option   <?php if($data['category']=='Child Abuse'){
                                    echo "selected";
                                } ?>>Child Abuse </option>
                                <option <?php if($data['category']=='Domestic Abuse'){
                                    echo "selected";
                                } ?>>Domestic Abuse </option>
                                <option <?php if($data['category']=='Cyber Crime and Online Fraud'){
                                    echo "selected";
                                } ?>>Cyber Crime and Online Fraud </option>
                                <option <?php if($data['category']=='Rape'){
                                    echo "selected";
                                } ?>>Rape </option>
                                <option <?php if($data['category']=='Others'){
                                    echo "selected";
                                } ?>>Others </option>
                            </select>
                        </div>
                        <div class="col-lg-6 px-3">
                            <label>Police Station </label>
                            <input type="text" class="form-control p-2" name="police_station" value="<?php echo $data['police_station'] ?>"  required>
                        </div>
                    </div>
                    <div class="row form-group my-2 ">
                        <div class="col-lg-6 px-3">
                            <label>Full Address</label>
                            <input type="address" class="form-control p-2" name="address" value="<?php echo $data['address'] ?>"  required>
                        </div>
                        <!-- <div class="col-lg-6 px-3">
                            <label>Evidence </label>
                            <input type="file" class="form-control p-2" name="evidence" required>
                            <span>any video or photo</span>
                        </div> -->
                    </div>
                    <div class="row form-group my-2">
                        <div class="col-lg-12 px-3">
                            <label>Full Details</label>
                            <textarea name="details" class="form-control p-2" id="" rows="3"  required><?php echo $data['details']; ?></textarea>
                        </div>

                    </div>
                    <div class="row my-2 ">
                        <div class="col-md-6 col-6 px-3 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block p-2 btn-md w-100"><span
                            class="fa fa-plus"></span>  Process</button>
                        </div>
                        <div class="col-md-6 col-6 px-3">
                            <button type="reset" class="btn btn-warning btn-block btn-md p-2 w-100"><span class="fa fa-times">
                                 </span>  Cancel</button>
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