
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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Add Crimes </h2>
        </header>

        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
        <?php
        if(isset($_POST['submit'])){
            $criminal = $_POST['criminal'];
            $category = $_POST['category'];
            $prison = $_POST['prison'];
            $court = $_POST['court'];
            $date = $_POST['date'];
            $place = $_POST['place'];
            $description = $_POST['description']; 

            if($criminal != "" && $category != "" && $prison != "" && $court !="" && $date !=""  ){
                 $sql = "INSERT INTO crimes(criminal, category, prison, court, date, place, description) VALUES('$criminal', '$category', '$prison','$court', '$date', '$place','$description')";
                 $result_query =mysqli_query($conn, $sql);
                 if($result_query){
                    ?>
                    <meta http-equiv ="refresh" content= "0; URL=manage_crimes.php?msg=asuccess"/>
                <?php 
                }else{
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Incorrect!</strong> All fields are required.
                     <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     <?php
            }

         }
         }
        ?>
            <div class="panel-heading"> <h3 class="fw-bold">Add Crimes </h3></div>
            <div class="panel-body">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
                    <div class="row form-group">
                        <div class="col-lg-6 mb-3">
                            <label>Criminal </label>
                            <select class="form-control" name="criminal">
                                <?php 
                                    $s  = "SELECT * FROM criminals";
                                    $r = mysqli_query($conn, $s);
                                    while($d=mysqli_fetch_assoc($r)){
                                    ?>
                                    <option><?php echo $d['name']; ?> </option>
                                    <?php

                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Category of Crime </label> <span class="mandetory_field"> * </span>
                              <select class="form-control" name="category" id="">
                                <option>Fraud </option>
                                <option>Theft</option>
                                <option> Child Abuse</option>
                                <option> Domestic Abuse</option>
                                <option> Cyber Crime and Online Fraud</option>
                                <option> Rape </option>
                                <option> Others </option>
                              </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>prison </label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="prison"  required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Court </label> <span class="mandetory_field"> * </span>
                            <select class="form-control" name="court" id="court">
                                <option>Subordinate Court  </option>
                                <option>District Court </option>
                                <option> High Court </option>
                                <option> Supreme Court</option>
                               
                              </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Date</label> <span class="mandetory_field"> * </span>
                            <input type="date" class="form-control" name="date"   min="15" placeholder="weight in kg" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Place </label> <span class="mandetory_field"> * </span>
                            <select name="place" class="form-control" id="">
                                <option value="pokhara">Pokhara </option>
                                <option value="kathmandu">  Kathmandu </option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="">Description </label><span class="mandetory_field"> * </span>
                          <textarea class="form-control" name="description" id="" rows="2" placeholder="write a brief description about crime scene " ></textarea>
                        </div>
                     
                        </div>
                    <div class="row my-4">
                        <div class="col-md-6 col-6 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block"><span
                                    class="fa fa-plus"></span>   Submit </button>
                        </div>
                        <div class="col-md-6 col-6">
                            <button type="reset" class="btn btn-warning btn-block"><span class="fa fa-times">
                                </span>    Reset </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 