<?php require('inc/toppart.php'); ?>

<div class="container1">

    <!-- sidebar menu section start here -->
    <?php require('inc/sidebar.php'); ?>
    <!-- sidebar menu section end here -->
    <?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $show_query = "SELECT * FROM siteconfig WHERE id=$id"; 
    $show_result = mysqli_query($conn,$show_query);
    $row = $show_result->fetch_assoc();
    $name = $row['name'];
    $site_key = $row['site_key'];
    $site_value = $row['site_value'];
}
?>
    <!-- main dashboard section start -->
    <div class="main-section1 ">
        <!-- navabar section start here -->
        <?php require('inc/navbar.php'); ?>
        <!-- navabar part section end here -->
        <?php
                if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $site_key = $_POST['site_key'];
                $site_value = $_POST['site_value'];

                if($name!="" && $site_key!="" && $site_value!="" ) 
                {
                //edit query is also called UPDATE QUERY
                $edit_query = "UPDATE siteconfig SET name='$name', site_key='$site_key', site_value='$site_value'  WHERE id=$id";
                $edit_result = mysqli_query($conn,$edit_query);
                if($edit_result) 
                {
                  ?>
                 <meta http-equiv="refresh" content="0; URL=manage_siteconfig.php?msg=csuccess" />
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Updated successfully.</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                        <?php
                    }
                    else 
                    {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>Couldn't be updated successfully.</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                        <?php
                    }
                    }
                    else 
                    {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <strong>All fields are necessary.</strong> 
                        </div>
                        
                        <script>
                          $(".alert").alert();
                        </script>
                    <?php
                    }
                    }

                    ?>
        <header>
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Edit siteconfig </h2>
        </header>
        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
            <div class="panel-body">
             <div class="card card-primary">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> site_key</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="site_key" placeholder="" value="<?php echo $site_key; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> site_value</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="site_value" placeholder="" value="<?php echo $site_value; ?>">
                    </div>
                    
    
                    <div class="card-footer">
                    <div class="row my-4">
                        <div class="col-md-6 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span> Process</button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span>   Cancel</button>
                        </div>
                    </div>
                    </div>
                </form>
                
             </div>
            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>