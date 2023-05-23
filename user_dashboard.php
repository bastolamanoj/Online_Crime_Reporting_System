<?php require('inc/toppart.php');  ?>

<div class="container-fluid">
    <?php require('inc/sidebar.php'); ?>
    
    <div class="main-content">
        <?php require('inc/user_dashboard_navbar.php'); ?>
        <?php
            $email = $_SESSION['uemail'];
            $sql = "SELECT * FROM users WHERE email ='$email'";
            $result = mysqli_query($conn, $sql);
            $data = $result->fetch_assoc();
            $id = $data['id'];

        ?>
        <div class="grid-box">
            <div class="grid-item" id="grid-item1">
                <div class="row">
                    <div class="left-item">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <div class="right-item">
                        <?php 
                         $s_q = "SELECT * FROM complaints WHERE complaint_user_id =$id";
                         $s_r = mysqli_query($conn, $s_q);
                         $data = mysqli_num_rows($s_r);
                        ?>
                        <h3> <?php echo $data;  ?></h3>
                    </div>
                </div>
                <h4>  <a class="text-light" href="view_report.php"> Total Cases </a>  </h4>
            </div>
            <div class="grid-item" id="grid-item2">
                <div class="row">
                    <div class="left-item">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="right-item">
                    <?php 
                         $s_q = "SELECT * FROM complaints WHERE complaint_user_id =$id AND status =1";
                         $s_r = mysqli_query($conn, $s_q);
                         $data = mysqli_num_rows($s_r);
                        ?>
                        <h3><?php echo $data; ?></h3>
                    </div>
                </div>

                <h4>   Pending Cases </h4>
            </div>
            <div class="grid-item" id="grid-item3">
                <div class="row">
                    <div class="left-item">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <div class="right-item">
                    <?php 
                         $s_q = "SELECT * FROM complaints WHERE complaint_user_id =$id AND status =1";
                         $s_r = mysqli_query($conn, $s_q);
                         $data = mysqli_num_rows($s_r);
                        ?>
                         <h3><?php echo $data; ?></h3>
                    </div>
                </div>
                <h4>  New Cases  </h4>
            </div>
            <div class="grid-item" id="grid-item4">
                <div class="row">
                    <div class="left-item">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="right-item">
                    <?php 
                        $s_q = "SELECT * FROM criminals ";
                        $s_r = mysqli_query($conn, $s_q);
                        $data = mysqli_num_rows($s_r);
                    ?>
                    <h3><?php echo $data; ?></h3>
                    </div>
                </div>
                <h4>  <a class="text-light" href="view_criminals.php"> Criminals </a> </h4>
            </div>
        </div>
        <?php  require('inc/footer.php'); ?>
    </div>
</div>




        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
            integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
            crossorigin="anonymous"></script>
            <!-- <script src="assets/js/sidebar.js"></script> -->
        </body>

        </html>