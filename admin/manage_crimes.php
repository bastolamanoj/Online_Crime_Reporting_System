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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Manage Crimes  </h2>
        </header>
        <?php 
        if(isset($_GET['msg'])){
            if($_GET['msg']=="updatesuccess"){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> crimes updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }elseif($_GET['msg']=='deletesuccess'){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> crimes deleted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }elseif($_GET['msg']=='asuccess'){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> crimes added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
        }

    ?>
     <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded ">
     <div class="row justify-content-between">
       <div class="col-6 panel-heading">
            <h3 class="heading">Manage Crimes</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Crimes" />
          </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Criminal </th>
                        <th>Category </th>
                        <th>Prison  </th>
                        <th>Court </th>
                        <th>Date </th>
                        <th>Place </th>
                        <th>Description </th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <?php 
                $select_query = "SELECT * FROM crimes";
                $result_query = mysqli_query($conn, $select_query);
                $count=0;
                while($data = mysqli_fetch_assoc($result_query)){
                    // print_r($data);
                    $count++;
              ?>
                <tr id="tableData">
                    <td><?php echo $data['id']?></td>
                    <td><?php echo $data['criminal']?></td>
                    <td><?php echo $data['category']?></td>
                    <td><?php echo $data['prison']?></td>
                    <td><?php echo $data['court']?></td>
                    <td><?php echo $data['date']?></td>
                    <td><?php echo $data['place']?></td>
                    <td><?php echo $data['description']?></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a class="btn btn-sm btn-warning mx-2" href="edit_crimes.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                    <a class="btn btn-sm btn-danger" href="process/delete_crimes.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                    </div>
                    </td>
                </tr>
                <?php
                }?>
               
            </table>
        </div>
      </div>

             <!-- footer part  -->
     <?php require('inc/footer.php'); ?>
    </div>
</div>

   