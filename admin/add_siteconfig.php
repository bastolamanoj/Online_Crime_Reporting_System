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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Admin Panel </h2>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <?php
                                if(isset($_POST['submit'])) {
                                $name = $_POST['name'];
                                $site_key = $_POST['site_key'];
                                $site_value = $_POST['site_value'];



                                if( $name!="" && $site_key!="" && $site_value!="") 
                                {
                                //Create query is also called INSERT INTO QUERY
                                $create_query = "INSERT INTO siteconfig (name,site_key,site_value) VALUES('$name','$site_key','$site_value')";
                                $create_result = mysqli_query($conn,$create_query);
                                if($create_result) 
                                {
                                ?>
                            <meta http-equiv="refresh" content="0; URL=manage_siteconfig.php" />
                            <?php
                                }
                                else 
                                {
                                ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>siteconfig couldn't be added successfully.</strong>
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

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add SiteConfig</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> Name</label> <span class="mandetory_field"> * </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">site_key</label> <span class="mandetory_field"> * </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="site_key" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">site_value</label> <span class="mandetory_field"> * </span>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="site_value" placeholder="">
                                        </div>

                                        <div class="card-footer">
                                      
                                        <div class="row my-4">
                                        <div class="col-md-6 col-6">
                                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                                    class="fa fa-plus"></span>   Submit </button>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                                </span>    Reset </button>
                                        </div>
                                    </div>
                                        </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>