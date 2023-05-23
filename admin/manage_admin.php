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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Manage Admin </h2>
        </header>
        <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']=="updatesuccess"){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> Admin details updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }elseif($_GET['msg']=='deletesuccess'){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> Admin deleted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }elseif($_GET['msg']=='asuccess'){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> Admin added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
        }
        ?>
        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded border border-secondary">
        <div class="row justify-content-between">
         <div class="col-6 panel-heading">
            <h3 class="heading">All Admins</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Admin" />
          </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Profile</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Access Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php 
                $select_query = "SELECT * FROM admin";
                $result_query = mysqli_query($conn, $select_query);
                $count=0;
                while($data = mysqli_fetch_assoc($result_query)){
                    $count++;
                    // print_r($data);
              ?>
                <tr id="tableData">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['surname']?></td>
                    <td><?php echo $data['username']?></td>
                    <td>
                       <a href="uploads/profile/<?php echo $data['photo'] ;?>" target="_blank" rel="noopener noreferrer"></a> <img src="uploads/profile/<?php echo $data['photo']; ?>" height="100px" >
                    </td>
                    <td><?php echo $data['email']?></td>
                    <td><?php echo $data['phone']?></td>
                    <td><?php if($data['gender']=="M"){
                        echo "Male";
                    }elseif($data['gender']=="F"){
                        echo "Female";
                    }elseif($data['gender']=="O"){
                        echo "Others";
                    }
                    ?></td>
                    <td><?php echo $data['access']?></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a class="btn btn-sm btn-warning mx-2" href="edit_admin.php?id=<?php echo $data['id'] ?>" role="button">Edit</a>
                    <a class="btn btn-sm btn-danger" href="process/delete_admin.php?id=<?php echo $data['id'] ?>" role="button">Delete</a>
                    </div>
                    </td>
                </tr>
                <?php
                }?>
                <!-- <div class="alert alert-success strover" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Successfully! </strong>
                    echo'Record Successfully deleted please refresh this page'
                </div>
                <div class="alert alert-danger samuel" id="sams1">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong> Danger! </strong>
                    OOPS please try again something went wrong'
                </div> -->
            </table>
        </div>
      </div>
             <!-- footer part  -->
     <?php require('inc/footer.php'); ?>
    </div>
</div>

   