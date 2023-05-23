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
      <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Manage user Complaints </h2>
    </header>

    <?php
        if(isset($_GET['msg'])){
            if($_GET['msg']=="updatesuccess"){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> Complaint details updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }elseif($_GET['msg']=='deletesuccess'){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> Complaint deleted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }elseif($_GET['msg']=='asuccess'){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Yeah!</strong> Complaint added successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            }
        }
    ?>
    <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded border border-secondary">
   
      <div class="row justify-content-between">
         <div class="col-6 panel-heading">
            <h3 class="heading">All Complaints</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Complaints" />
          </div>
        </div>
      <div class="panel-body">
        <table class="table align-middle table-striped thead-dark table-bordered table-hover" id="myTable">
          <thead>
            <tr>
              <th>SN</th>
              <th>Title </th>
              <th>Police Station </th>
              <th>Address </th>
              <th> Details </th>
              <th> Type </th>
              <th>Evidence </th>
              <th>Complain Id </th>
              <th>Status </th>
              <th>Action</th>
            </tr>
          </thead>
          <?php 
                $select_query = "SELECT * FROM complaints";
                $result_query = mysqli_query($conn, $select_query);
                $count =0;
                while($data = mysqli_fetch_assoc($result_query)){
                    // print_r($data);
                    $count++;
              ?>
          <tr id="tableData">
            <td>
              <?php echo $count ?>
            </td>
            <td>
              <?php echo $data['title']?>
            </td>
            <td>
              <?php echo $data['police_station']?>
            </td>
            <td>
              <?php echo $data['address']?>
            </td>
            <td>
              <?php echo $data['details']?>
            </td>
            <td>
              <?php echo $data['type']?>
            </td>
            <td>
              <img src="<?php echo '../crimefile/'.$data['evidence']; ?>" alt="" height="100px" width="100px">
            </td>
            <td>
              <?php echo $data['complaint_id']?>
            </td>
            <td>
              <?php 
                    if($data['status']== 1){
                        echo '
                        <a class="btn btn-sm btn-danger" role="button">Pending</a>
                        ';
                    }elseif($data['status']==2){
                        echo '
                        <a class="btn btn-sm btn-danger" role="button">In Progress</a>
                        ';
                    }elseif($data['status']==3){
                        echo '
                        <a class="btn btn-sm btn-danger" role="button">Completed</a>
                        ';
                    }
                    ?>
            </td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a class="btn btn-sm btn-primary mx-2 change-status" href="#exampleModal1"
                  data-id="<?php echo $data['id']; ?>" data-status="<?php echo $data['status']; ?>" id="changeStatus" role="button"
                  data-bs-toggle="modal" data-bs-target="#exampleModal1">change Status</a>
                <a class="btn btn-sm btn-danger align-middle" href="process/delete_complaint.php?id=<?php echo $data['status']; ?>"
                  role="button"
                  >Delete</a>
                  </div>
            </td>
          </tr>
          <?php
                }
                ?>
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
      <!-- footer part  -->
    </div>
    <?php require('inc/footer.php'); ?>
  </div>


  <!-- Modal -->
  <div class="modal fade status-modal" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          <div class="modal-body ">
            <?php
           
          // if(isset($_POST['submit'])){
          //     $status_query= "UPDATE complaints SET status= '$status' WHERE id=$id";
          //     $status_result= mysqli_query($conn, $status_query);
          // }
          ?>
          <div class="change_status_body">

          </div>
        
      </div>
    </div>
  </div>
  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
  $('.change-status').click(function(){
    let c_id = $(this).attr('data-id');
    let c_status = $(this).attr('data-status');
    $('.modal-content').attr("c_id",c_id);

    $.ajax({
      type: "POST",
      url:"change_status.php",
      data: {
        "checking_statusbtn":true,
        "c_id": c_id,
        "c_status": c_status
      },
      success: function(response){
        // console.log(response);
        // alert(response);
        $('.change_status_body').html(response);
        $('.status-modal').modal('show');
    }
  })
})
 })

</script>




























