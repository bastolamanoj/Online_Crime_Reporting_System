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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>ALL USERS  </h2>
        </header>
        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded border border-secondary">
        <div class="row justify-content-between my-1">
       <div class="col-6 panel-heading">
            <h3 class="heading">View Users</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Users" />
          </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Photo</th>
                        <th>Citizenship No </th>
                        <th>Province</th>
                        <th>District</th>
                        <th>City </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <?php 
                $select_query = "SELECT * FROM users";
                $result_query = mysqli_query($conn, $select_query);
                $count = 0;
                while($data = mysqli_fetch_assoc($result_query)){
                    $count++;
              ?>
                <tr id="tableData">
                    <td><?php echo $count?></td>
                    <td><?php echo $data['fname'].' '.$data['lname']?></td>
                    <td><?php echo $data['email']?></td>
                    <td><?php echo $data['phone']?></td>
                    <td><?php echo $data['gender']?></td>
                    <td>
                    <img src="<?php echo '../uploads/'.$data['photo']?>" alt="" height="100px" width="100px">
                    </td>
                    <td><?php echo $data['citizenshipno']?></td>
                    <td><?php echo $data['province']?></td>
                    <td><?php echo $data['district']?></td>
                    <td><?php echo $data['city']?></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a class="btn btn-sm btn-danger" href="process/delete_user.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
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

   