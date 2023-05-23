<!-- top  part section -->
<?php require('inc/toppart.php'); ?>
    <div class="container-fluid">
        <?php require('inc/sidebar.php'); ?>

        <div class="main-content">
            <?php require('inc/user_dashboard_navbar.php'); ?>
            <?php
                $email = $_SESSION['uemail'];
                $q = "SELECT * FROM users WHERE email ='$email' ";
                $q_r = mysqli_query($conn, $q);
                $data= $q_r->fetch_assoc();
                $id = $data['id'];
            ?>

            <div class="panel panel-default sammacmedia shadow-lg px-5 py-2 mb-5 bg-body rounded ">
            <div class="row justify-content-between my-2">
                <div class="col-6 panel-heading">
                        <h3 class="heading">Manage Crimes</h3>
                    </div>
                    <div class="form-outline col-6 col-md-3">
                        <input id="search" type="search" class="form-control" placeholder="Search Crimes" />
                    </div>
                    </div>
                <div class="panel-body table-responsive">
                <table class="table table-striped thead-dark table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Status </th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <?php 
                    $select_query = "SELECT * FROM complaints WHERE complaint_user_id=$id ";
                    $result_query = mysqli_query($conn, $select_query);
                    $count =0;
                    while($data = mysqli_fetch_assoc($result_query)){
                        // print_r($data);
                        $count++;
                ?>
                        <tr id="tableData">
                            <td>
                                <?php echo $count ;?>
                            </td>
                            <td>
                                <?php echo $data['title']?>
                            </td>
                            <td>
                                <?php echo $data['details']?>
                            </td>
                            <td>
                                <?php echo $data['address']?>
                            </td>
                            <td>
                                <?php if($data['status']==1){
                                    echo '<button type="button" class="btn btn-sm btn-danger">Pending</button>';
                                }elseif($data['status']==2){
                                    echo '<button type="button" class="btn btn-sm btn-danger">In Progress</button>';
                                } ?>
                            </td>
                        
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a class="btn btn-sm btn-warning mx-2 px-2"
                                        href="edit_report.php?id=<?php echo $data['id']; ?>" role="button">Edit</a>
                                    <a class="btn btn-sm btn-danger px-2"
                                        href="process/delete_report.php?id=<?php echo $data['id']; ?>"
                                        role="button">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }?>

                    </table>
                </div>
            </div>

        <?php require('inc/footer.php'); ?>