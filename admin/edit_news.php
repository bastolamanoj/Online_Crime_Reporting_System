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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Edit News </h2>
        </header>
        <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $select_query ="Select * from news where id= $id" ;
                $result_query =mysqli_query($conn, $select_query);
                $data = $result_query->fetch_assoc();  
            }
           
         ?>             
        <?php
        if(isset($_POST['submit'])){
               
            // $image = $_POST['image'];
            $category = $_POST['category'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];

            if($title != "" && $description != "" && $category !=""  ){
                 $sql = "UPDATE news SET title='$title',  category='$category',description='$description', date='$date' WHERE `id` = $id ";
                 $result = mysqli_query($conn, $sql);
                 if($result){
                    ?>
                  <meta http-equiv="refresh" content="0; URL=manage_news.php?msg=updatesuccess" />
              <?php
                }
            }else{
                ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color: red!important, color: white!important">
            <strong>Incorrect!</strong> All fields are required.
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php
           }
        }

            ?>

        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
            <!-- <div class="panel-heading">
                <h3 class="fw-bold">Edit category</h3>
            </div> -->
            <div class="panel-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6 mb-3">
                            <label>Category </label>
                            <select class="form-control" name="category">
                                <option value="Theft" <?php if($data['category']=='Theft'){
                                    echo "selected";
                                } ?>> Theft </option>
                                <option value="Robbery"   <?php if($data['category']=='Robbery'){
                                    echo "selected";
                                } ?>>hari </option>
                            </select>
                        </div>
                    
                        <div class="col-lg-6 mb-3">
                            <label>Title </label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="title" value="<?php echo $data['title'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description </label><span class="mandetory_field"> * </span>
                            <textarea class="form-control" name="description" id="" rows="2"
                                placeholder="write a brief description about news scene" value="" ><?php echo $data['description'] ?></textarea>
                        </div>
            
                        <div class="col-lg-6 mb-3">
                            <label>Date</label> <span class="mandetory_field"> * </span>
                            <input type="date" class="form-control" name="date" min="15" placeholder="weight in kg" value="<?php echo $data['date']; ?>"
                                required>
                        </div>
                        <div class="row my-4">
                        <div class="col-md-6 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span>   Submit </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span>    Reset </button>
                        </div>
                    </div>

                    </div>

                </form>
            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>