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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Manage Criminals </h2>
        </header>
        

        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded border border-secondary">
        <div class="row justify-content-between">
         <div class="col-6 panel-heading">
            <h3 class="heading">All Criminals</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Criminals" />
          </div>
        </div>
      <div class="panel-body">
            <table class="table align-middle table-striped thead-dark table-bordered table-hover " id="myTable">
                <?php
                if(isset($_GET['msg'])){
                    if($_GET['msg']=='asuccess'){
                        echo'
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>woow!</strong> Criminal added successfully..
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                    }
                    if($_GET['msg']=='deletesuccess'){
                        echo'
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong></strong> Criminal deleted successfully.
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                    }
                    if($_GET['msg']=='updatesuccess'){
                        echo'
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong></strong> Criminal details updated successfully.
                        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        ';
                    }
                }
    
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Surname</th>
                       
                        <th>Gender</th>
                      
                        <th>Province </th>
                        <th>District </th>
                        <th> City </th>
                        
                    </tr>
                </thead>
                <?php 
                $select_query = "SELECT * FROM criminals";
                $result_query = mysqli_query($conn, $select_query);
              
                $count = 0;
                while( $data = mysqli_fetch_assoc($result_query)){
                    $count++;
                ?>
                <tr id="tableData">
                  <td><?php echo $count; ?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['surname']?></td>
          
                    <td><?php if($data['gender']=="M"){
                        echo "Male";}elseif($data['gender']=="F"){echo "Female";}?></td>

                    <td><?php
                    $province = $data['province'];
                      $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                      $s = mysqli_query($con, "select * from province where id=$province");
                      $r=mysqli_fetch_assoc($s);
                      echo $r['province'];
                    ?></td>
                    <td><?php
                    $district = $data['district'];
                      $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                      $s = mysqli_query($con, "select * from districts where id=$district");
                      $r=mysqli_fetch_assoc($s);
                      echo $r['district'];
                    ?></td>
                    <td><?php
                    $city = $data['city'];
                      $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                      $s = mysqli_query($con, "select * from city where id=$city");
                      $r=mysqli_fetch_assoc($s);
                      echo $r['city'];
                    ?></td>
                   
                    <td> 
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a class="btn btn-sm btn-success mx-2 view-criminal" id="viewCriminal" data-id="<?php echo $data['id']; ?>"  data-bs-toggle="modal" data-bs-target="#criminalModal" role="button">view</a>
    
                    <a class="btn btn-sm btn-warning mx-2" href="edit_criminals.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                    <a class="btn btn-sm btn-danger" href="process/delete_criminal.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
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
            <!-- modal section start here -->
    <?php  require('modal/view_criminal_modal.php'); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
  $('.view-criminal').click(function(){
    let c_id = $(this).attr('data-id');
    // let c_status = $(this).attr('data-status');
    $('.modal-content').attr("c_id",c_id);

    $.ajax({
      type: "POST",
      url:"process/view_criminal.php",
      data: {
        "checking_viewbtn":true,
        "c_id": c_id
      },
      success: function(response){
        // console.log(response);
        // alert(response);
        $('.view_criminal_body').html(response);
        $('.criminal_modal').modal('show');
    }
  })
})
 })

</script>

   