<?php require('connection/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>emergency complaints </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/emergency_complaints.css">
</head>

<body>
<div class="container">
    <?php// require('inc/sidebar.php'); ?>
    <div class="main-content">

        <?php
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $category = $_POST['category'];
            $police_station = $_POST['police_station'];
            $address = $_POST['address'];
            $evidence = $_FILES['evidence']['name'];
            $complaint_id = rand(111111,999999);
            // if(isset($_POST['evidence']) && !empty($evidence)){
                $file_size = $_FILES['evidence']['size']; 
                $explode_file = explode(".", $evidence);
                $name = $explode_file[0];
                $fname = str_replace(" ", "", $name);
                $fielname = strtolower($fname.time());
                $ext = $explode_file[1];
                $finalfile = $fielname.".".$ext;

            $details = $_POST['details'];
            if($title != "" && $police_station != "" && $address != ""  ){
              if(move_uploaded_file($_FILES['evidence']['tmp_name'], "crimefile/".$finalfile)){
                    $query = "INSERT INTO complaints(title, category, police_station, address, details, evidence, complaint_id, type) 
                    VALUE('$title', '$category', '$police_station', '$address', '$details', '$finalfile', '$complaint_id', 'emergency')";
               
                    $result = mysqli_query($conn, $query);

                    if($title){
                        echo '<script type="text/javascript">',
                        'alertbox();',
                        '</script>'
                   ;

                        echo '<meta http-equiv="refresh" content="0; URL=show_emergency_id.php?id='.$complaint_id.'"/>';
                      echo '  <div class="alert alert-warning alert-dismissible fade show" role="alert mx-5">
                      <strong>Your complaints has sent successfully.!</strong> 
                      <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                     }
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
                <h3 class="fw-bold">Emergency Complaint</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group my-4 ">
                        <div class="col-lg-12 px-3">
                            <label>Title</label>
                            <input type="text" class="form-control p-2" name="title" required>
                        </div>
                      
                     </div>
                    <div class="row form-group my-4 ">
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
                    <div class="row form-group my-4 ">
                        <div class="col-lg-6 px-3">
                            <label>Full Address</label>
                            <input type="address" class="form-control p-2" name="address" required>
                        </div>
                        <div class="col-lg-6 px-3">
                            <label>Evidence </label>
                            <input type="file" class="form-control p-2" name="evidence" >
                            <span>any video or photo</span>
                        </div>
                    </div>
                    <div class="row form-group my-4">
                        <div class="col-lg-12 px-3">
                            <label>Full Details</label>
                            <textarea name="details" class="form-control p-2" id="" rows="3" required></textarea>
                        </div>

                    </div>

                    <div class="row my-4 ">
                        <div class="col-md-6 col-6 px-3 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block p-2 btn-md"> Add
                            <span class="fa fa-plus ml-1"></span>  </button>
                        </div>
                        <div class="col-md-6 col-6 px-3">
                            <button type="reset" class="btn btn-warning btn-block btn-md p-2">
                        <span class="fa fa-times mr-1"></span> Clear   </button>
                        </div>
                        <a class="text-center py-2 mt-2" href="search_complaint_id.php">view complaint</a>
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



</body>

</html>