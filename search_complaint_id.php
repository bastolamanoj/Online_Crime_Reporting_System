<?php
require('connection/config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container mt-2">
        <form class="row  needs-validation w-75 mx-auto" action="" method="post" enctype="multipart/form-data">
          <div class="col-md-8">
            <h1 class="text-primary">Check your Complaint Report</h1>
            <label for="validationCustom01" class="form-label text" > Complaint Id</label>
            <input type="text" name="complaint_id" class="form-control" id="validationCustom01" placeholder="enter complaint id" required>
  
            <button type="submit" class="btn btn-primary btn-md mt-3 mx-auto " name="submit" >Search </button>
          </div>
        </form>
    </div>

    <?php 
    if(isset($_POST['submit'])){
        $complaint_id = $_POST['complaint_id'];
        $s_q = "SELECT * FROM complaints WHERE complaint_id =$complaint_id";
        $s_r = mysqli_query($conn, $s_q);
        $count =0;
        if($s_r){
            ?>
            <div class="container">
         <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 my-5 mb-5 bg-body rounded ">
            <div class="panel-heading my-3">
                <h3>Your complaint</h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Address</th>
                            <th>Police Station </th>
                            <th>Title </th>
                            <th>Category  </th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Action </th>
                          
                            
                        </tr>
                    </thead>
                    <?php
                    while($data=mysqli_fetch_assoc($s_r)){
                        $count++;
                    ?>
                    <tr>
                        <td>
                            <?php echo $count ;?>
                        </td>
                        <td>
                            <?php echo $data['address']?>
                        </td>
                        <td>
                            <?php echo $data['police_station']?>
                        </td>
                        <td>
                            <?php echo $data['title']?>
                        </td>
                        <td>
                            <?php echo $data['category']?>
                        </td>

                        <td>
                            <?php echo $data['details']?>
                        </td>
                        <!-- <td>
                           <img src="../admin/uploads/<?php // echo $data['evidence']?>" height="150px" alt="" srcset=""> 
                        </td> -->
                        <td>
                            <?php if($data['status']==1){
                                echo '<button type="button" class="btn btn-sm btn-danger">Pending</button>';
                            }elseif($data['status']==2){
                                echo '<button type="button" class="btn btn-sm btn-danger">In Progress</button>';
                            } ?>
                        </td>
                    
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a class="btn btn-sm btn-warning mx-2 px-2"
                                    href="edit_emergency_complaints.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                <!-- <a class="btn btn-sm btn-danger px-2"
                                    href="process/delete_report.php?id=<?php //echo $data['id']; ?>"
                                    role="button">Delete</a> -->
                            </div>
                        </td>
                    </tr>
                    <?php

}?>
   
                </table>
            </div>
        </div>

        <?php
        }

    }
    
    
    ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>