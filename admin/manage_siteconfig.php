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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Manage SiteConfig </h2>
        </header>
     <div class="  panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded border border-secondary">
     <div class="row justify-content-between my-1">
       <div class="col-6 panel-heading">
            <h3 class="heading">View Siteconfig</h3>
          </div>
          <div class="form-outline col-6 col-md-3">
            <input id="search" type="search" class="form-control" placeholder="Search Siteconfig" />
          </div>
        </div>
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Action</th>
                    <th>name</th>
                    <th>site_key</th>
                    <th>site_value</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>S.N.</th>
                    <th>Action</th>
                    <th>name</th>
                    <th>site_key</th>
                    <th>site_value</th>
                    <th>Status</th>
                </tr>
            </tfoot>
            <tbody>
            <?php
            $query = "SELECT * FROM siteconfig";
            $result = mysqli_query($conn,$query);
            $sn = 0;
            while($data=mysqli_fetch_array($result))
            {
            $sn+=1; //$sn = $sn+1
            ?>
            <tr id="tableData">
            <td><?php echo $sn; ?></td>
            <td>
                <a name="" id="" class="btn btn-primary btn-xs" href="edit_siteconfig.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                <a name="" id="" class="btn btn-danger btn-xs" href="process/delete_siteconfig.php?id=<?php echo $data['id']; ?>" role="button">Delete</a>
            </td>
                <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['site_key']; ?></td>
            <td><?php echo $data['site_value']; ?></td>
            <td><button type="button" name="" id="" class="btn btn-primary btn-sm" btn-lg btn-block><?php echo $data['status']; ?></button></td>
            </tr>
            <?php
            }
            ?>
            </tfoot>
        </table>
      </div>

             <!-- footer part  -->
     <?php require('inc/footer.php'); ?>
    </div>
</div>

   