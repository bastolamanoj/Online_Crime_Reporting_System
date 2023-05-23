<!-- top  part section -->
<?php require('inc/toppart.php'); ?>
    <div class="container-fluid">
        <?php require('inc/sidebar.php'); ?>

        <div class="main-content">
            <?php require('inc/user_dashboard_navbar.php'); ?>
     <div class="panel table-responsive panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded ">
     <div class="row justify-content-between my-3">
       <div class="col-6 panel-heading">
            <h3 class="heading">View Criminals</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Criminals" />
          </div>
        </div>  
        <div class="panel-body table-responsive">
            <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Height </th>
                        <th>weight</th>
                        <th>Gender</th>
                        <th>Province </th>
                        <th>District </th>
                        <th> City </th>
                        <th> Photo </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <?php 
                $select_query = "SELECT * FROM criminals";
                $result_query = mysqli_query($conn, $select_query);
                $count=0;
                while($data = mysqli_fetch_assoc($result_query)){
                    // print_r($data);
                    $count++;
              ?>
                <tr id="tableData">
                    <td><?php echo $count; ?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['surname']?></td>
                    <td><?php echo $data['height']?>  ft.</td>
                    <td><?php echo $data['weight']?>  kg</td>
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
                    <td> <img src="admin/uploads/<?php echo $data['photo']; ?>" alt="" height="70px" width="70px" ></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                    <a class="btn btn-md mx-2 btn-success mx-2 view-criminal" id="viewCriminal" data-id="<?php echo $data['id']; ?>" data-img="admin/uploads/<?php echo $data['photo']; ?>" data-bs-target="#criminalModal" role="button">View</a>
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
     
     <!-- modal section start here -->
     <?php require('admin/modal/view_criminal_modal.php'); ?>

     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
  $('.view-criminal').click(function(){
    let c_id = $(this).attr('data-id');
    let c_image = $(this).attr('data-img');
    $('.modal-content').attr("c_id",c_id);
    
    $.ajax({
      type: "POST",
      url:"admin/process/view_criminal.php",
      data: {
        "checking_viewbtn":true,
        "c_id": c_id,
        "c_image": c_image
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

   