
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
            <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>Upload File </h2>
        </header>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <?php
              if(isset($_POST['submit'])) {
                $filename = $_POST['filename'];
                $dataFile = $_FILES['dataFile']['name'];
                //$dataFile consist info like hello.jpg
                $filesize = $_FILES['dataFile']['size'];
                $explode_values = explode('.', $dataFile);
                //$explode_values become array having data in the form
                //of  $explode_values = ['hello','jpg']
                $name = $explode_values[0];
                $fname = str_replace(' ','', $name);
                $finalname = strtolower($fname.time());
                $ext = $explode_values[1];
                $finalfile = $finalname.'.'.$ext;

                if($filename!="")
                {
                  if($filesize<1000000000000)
                  {
                    if($ext=='jpg' || $ext == 'png' || $ext == 'pdf')
                    {
                        if(move_uploaded_file($_FILES['dataFile']['tmp_name'],"uploads/".$finalfile))
                        {
                          // $query = "INSERT INTO filemanager (name,filelink,ext) VALUES('$filename','$finalfile','$ext')";
                          $query = "INSERT INTO `filemanager`( `name`, `filelink`, `ext`) VALUES ('$filename','$finalfile','$ext')";
                          $result = mysqli_query($conn, $query);
                          
                          if($result)
                          {
                            echo "File is uploaded successfully.";
                            ?>
                    <meta http-equiv="refresh" content="0; URL=manage_files.php?msg=usuccess" />
                    <?php
                          }
                          else 
                          {
                            ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>File Couldn't uploaded successfully.</strong>
                    </div>

                    <script>
                    $(".alert").alert();
                    </script>
                    <?php
                            
                            echo "File couldn't uploaded successfully.";
                          }
                        }
                    }
                    else 
                    {
                      echo "File Extension doesn't match. We only accept jpg, png, pdf.";
                    }

                  }
                  else
                  {
                    echo "File size exceeded.";
                  }
                }
                else 
                {
                  echo "File name is necessary.";
                }
              }
            ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload File</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">File Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="filename"
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">File</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="dataFile"
                                        placeholder="">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 