
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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Manage File </h2>
        </header>
        
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Files</h3>
                <a class="btn btn-primary btn-xs" href="uploadfile.php" role="button">Upload Files</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>File Name</th>
                    <th>File Link</th>
                    <th>Preview</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = "SELECT * FROM `filemanager`";
                  $result = mysqli_query($conn,$query);
                  $sn = 0;
                  while($data= mysqli_fetch_array($result)) 
                  {
                    $sn+=1; //$sn = $sn+1
                    ?>
                  <tr id="tableData">
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['filelink']; ?></td>
                    <td><a name="" id="" class="btn btn-info btn-xs" href="uploads/<?php echo $data['filelink']; ?>" role="button" target="_blank">
                      <img height="100px" width="100px" src="uploads/<?php echo $data['filelink']; ?>" >
                    </a>    
                  </td>
                  <td>
                      <a name="" id="" class="btn btn-danger btn-xs" href="process/deletefile.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
                  </td>
                  </tr>
                    <?php
                  }
                  ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 