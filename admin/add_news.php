
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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Add News </h2>
        </header>

        <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded">
        <?php
        if(isset($_POST['submit'])){
            $category = $_POST['category'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $photo = $_FILES['image']['name'];
            $photosize = $_FILES['image']['size'];
            $e_photo= explode('.',$photo); //explode method convert the string into array
            $photoname = $e_photo[0];
            $ext = $e_photo[1];
            $fphoto = str_replace(' ','',$e_photo);
            $lowerphoto = strtolower($fphoto.time());
            $finalphoto = $lowerphoto.'.'.$ext;

            if($title != "" && $finalphoto != "" && $description != ""  && $date !=""  ){
                if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/news/$finalphoto")){
                 $sql = "INSERT INTO news(image, category, title, description, date) VALUES('$finalphoto', '$category', '$title','$description', '$date')";
                 $result_query =mysqli_query($conn, $sql);
                 if($result_query){
                    ?>
                    <meta http-equiv ="refresh" content= "0; URL=manage_news.php?msg=asuccess"/>
                <?php 
                }else{
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>Incorrect!</strong> All fields are required.
                     <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     <?php
            }
        }else{
            echo "file couldn't uploaded successfully";
        }

         }
         }
        ?>
            <div class="panel-heading"> <h3 class="fw-bold">Add News </h3></div>
            <div class="panel-body">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>" enctype="multipart/form-data">
                    <div class="row form-group">   
                        <div class="col-lg-6 mb-3">
                            <label>Picture  </label> <span class="mandetory_field"> * </span>
                            <input type="file" class="form-control" name="image"  required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Category </label> <span class="mandetory_field"> * </span>
                            <select class="form-control" name="category" id="category">
                                <option value="Theft">Theft </option>
                                <option value="Theft">Theft </option>
                                <option value="Theft">Theft </option>
                                <option value="Theft">Theft </option>
                                <option value="Theft">Theft </option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Title </label> <span class="mandetory_field"> * </span>
                            <input type="text" class="form-control" name="title"  required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label>Date </label> <span class="mandetory_field"> * </span>
                            <input type="date" class="form-control" name="date"  required>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label>Description  </label> <span class="mandetory_field"> * </span>
                            <textarea type="text" class="form-control" name="description"  min="3" placeholder="description " required></textarea>
                        </div>
                    </div>
                    <div class="row form-group my-4 ">
                        <div class="col-md-6 col-6 px-3 ">
                            <button type="submit" name="submit" class="btn btn-success btn-block p-2 btn-md"><span
                                    class="fa fa-plus"></span> Process</button>
                        </div>
                        <div class="col-md-6 col-6 px-3">
                            <button type="reset" class="btn btn-warning btn-block btn-md p-2"><span class="fa fa-times ">
                                </span>    Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 