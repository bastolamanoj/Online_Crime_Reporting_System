<?php require('inc/toppart.php'); ?>

<div class="container1">

    <!-- sidebar menu section start here -->
    <?php require('inc/sidebar.php'); ?>
    <!-- sidebar menu section end here -->
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select_query ="Select * from crimes where id= $id" ;
            $result_query =mysqli_query($conn, $select_query);
            $data = $result_query->fetch_assoc();  

        }
    ?>

    <!-- main dashboard section start -->
    <div class="main-section1 ">
        <!-- navabar section start here -->
        <?php require('inc/navbar.php'); ?>
        <!-- navabar part section end here -->
        <header>
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Edit Crimes </h2>
        </header>

        <?php
        if(isset($_POST['submit'])){
               
            $criminal = $_POST['criminal'];
            $category = $_POST['category'];
            $prison = $_POST['prison'];
            $court = $_POST['court'];
            $date = $_POST['date'];
            $place = $_POST['place'];
            $description = $_POST['description'];

            if($category != "" && $criminal != "" && $prison != "" && $court !="" && $date !="" && $description !="" ){
                 $sql = "UPDATE crimes SET criminal='$criminal',  category='$category', prison='$prison', court='$court', date='$date',  place='$place', description='$description' WHERE id=$id";
                 $result = mysqli_query($conn, $sql);
                 if($result){
                    ?>
                  <meta http-equiv="refresh" content="0; URL=manage_crimes.php?msg=updatesuccess" />
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
                <h3 class="fw-bold">Edit Criminals</h3>
            </div> -->
            <div class="panel-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6 mb-3">
                            <label>Criminal </label>
                            <select class="form-control" name="criminal">
                                <?php
                                    $criminal = $data['criminal'];

                                    $s ="select * from criminals" ;
                                    $r =mysqli_query($conn, $s);
                                    while($d= $r->fetch_assoc())  {
                                        ?>
                                        <option <?php  
                                        if($d['name']==$criminal){
                                            echo "selected";
                                        }
                                        ?>> <?php echo $d['name']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Category of Crime </label> <span class="mandetory_field"> * </span>
                            <select class="form-control" name="category">
                                <option value="Fraud" <?php if($data['category']=='Fraud'){
                                    echo "selected";
                                } ?>>Fraud </option>
                                <option value="Theft"  <?php if($data['category']=='Theft'){
                                    echo "selected";
                                } ?>>Theft </option>
                                <option   <?php if($data['category']=='Child Abuse'){
                                    echo "selected";
                                } ?>>Child Abuse </option>
                                <option <?php if($data['category']=='Domestic Abuse'){
                                    echo "selected";
                                } ?>>Domestic Abuse </option>
                                <option <?php if($data['category']=='Cyber Crime and Online Fraud'){
                                    echo "selected";
                                } ?>>Cyber Crime and Online Fraud </option>
                                <option <?php if($data['category']=='Rape'){
                                    echo "selected";
                                } ?>>Rape </option>
                                <option <?php if($data['category']=='Others'){
                                    echo "selected";
                                } ?>>Others </option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Prision </label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="prison" value="<?php echo $data['prison'] ?>" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Court </label> <span class="mandetory_field"> * </span>
                            <select class="form-control" name="court">
                                <option value="Subordinate Court" <?php if($data['court']=='Subordinate Court'){
                                    echo "selected";
                                } ?>>Subordinate Court  </option>
                                <option value="District Court"  <?php if($data['court']=='District Court'){
                                    echo "selected";
                                } ?>>District Court </option>
                                <option   <?php if($data['court']=='High Court'){
                                    echo "selected";
                                } ?>>High Court </option>
                                <option    <?php if($data['court']=='Supreme Court'){
                                    echo "selected";
                                } ?>>Supreme Court </option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Date</label> <span class="mandetory_field"> * </span>
                            <input type="date" class="form-control" name="date" min="15" placeholder="weight in kg" value="<?php echo $data['date'] ?>"
                                required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Place </label> <span class="mandetory_field"> * </span>
                            <select name="place" class="form-control" id="">
                                <option value="pokhara" <?php if($data['place']=='pokhara'){
                                    echo 'selected';
                                }   ?>>Pokhara </option>
                                <option value="kathmandu"   <?php if($data['place']=='kathmandu'){
                                    echo 'selected';
                                }   ?>> Kathmandu </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Description </label><span class="mandetory_field"> * </span>
                            <textarea class="form-control" name="description" id="" rows="2"
                                placeholder="write a brief description about crime scene" value="" ><?php echo $data['description'] ?></textarea>
                        </div>

                    </div>
                    <div class="row my-4">
                        <div class="col-md-6 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span> Submit </button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span> Reset </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>