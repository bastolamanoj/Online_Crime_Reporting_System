        <div class="sidebar bg-light " id="sidebar">
             <div class="top-container1 ">
                <div class="profile">
                    <?php 
                    $email = $_SESSION['uemail'] ;
                    $sql = "SELECT * FROM users WHERE email='$email' ";
                    $result = mysqli_query($conn, $sql);
                    $data =mysqli_fetch_assoc($result);
                    $photo= $data['photo'];
                    ?>
                    <img src="uploads/<?php echo $photo; ?>" alt="">
                </div>

                <div class="bio">
                    <h5><span> <?php 
                    $email =  $_SESSION['uemail'];  

                    $sql ="select * from users where email = '$email' ";
                    $result = mysqli_query($conn, $sql);
                    $data =mysqli_fetch_assoc($result);
                    $name= $data['fname'];
                    $surname= $data['lname'];
                    $fullname = $name.' '.$surname;
                    ?>
                    <b> <?php  echo $fullname;  ?> </b></span> </h5>
                    <span>Role :<b> User </b></span>
                    
                    <!-- <div class="buttons">
                        <a href="#"><i class="fas fa-solid fa-lock"></i></a>
                        <a href="#"> <i class="fa-solid fa-gem"></i> </a>
                        <a href="#"> <i class="fa-solid fa-gear"></i></i> </a>
                    </div> -->
                </div>
            </div>
            <?php
                $select_query = "SELECT * FROM complaints";
                

                ?>

            <ul class="d-flex flex-column ">
                <li class="nav-item   border-bottom-danger">
                    <a href="user_dashboard.php" class="nav-link "><i class="fa-solid fa-gauge"></i>  Dashboard</a>
                </li>
                <li class="nav-item ">
                    <a href="normalcomplaints.php" class="nav-link"><i class="fa-solid fa-file-arrow-up"></i>  Report a complaint</a>
                </li>
                <li class="nav-item ">
                    <a href="view_report.php" class="nav-link"><i class="fa-solid fa-eye"></i>  View  Report</a>
                </li>
                <li class="nav-item ">
                    <a href="view_criminals.php" class="nav-link"><i class="fa-solid fa-eye"></i>  View  Criminals</a>
                </li>
                <li class="nav-item ">
                <a href="" class="nav-link"><i class="fa-solid fa-gear"></i>  Setting</a>
                    <ul class="child d-none">
                    <li class="nav-item ">
                    <a href="process/logout.php" class="nav-link"><i class="fa-solid fa-eye"></i>  Logout</a>
                    </li>
                    <li class="nav-item ">
                    <a href="change_password.php" class="nav-link"><i class="fa-solid fa-eye"></i>  Change Password</a>
                    </li>
                    </ul>
                </li>
           
                
        </div>