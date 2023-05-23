  <!-- sidebar menu section start here -->
  <div class="mysidebar1" id="mySidebar">
    <!-- <button  id="profile" class="profilebtn"> click</button> -->
    <div class="top-container1 ">
        <div class="profile profilebtn" data-user="<?php echo $_SESSION['username'];?>" data-role="<?php echo $_SESSION['role'];?>"  data-bs-target="#updateModal" role="button">
            <?php
            if($_SESSION['role']==2){
            $session_username = $_SESSION['username'];
            $sql = "SELECT * FROM employees WHERE username = '$session_username'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result); 
            if($data['photo']){     
                ?>
             <img src="uploads/profile/<?php echo $data['photo']; ?>" alt="" >
            <!-- </button> -->
            <?php 
            }else{
                echo '<img src="img/avatar2.png">';
            }
            }elseif($_SESSION['role']==1){
                $session_username = $_SESSION['username'];
                $sql = "SELECT * FROM admin WHERE username = '$session_username'";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);  
                if(!empty($data['photo'])){  
                ?>
                <img src="uploads/profile/<?php echo $data['photo']; ?>" alt="">
                <?php 
                }else{
                    echo '<img src="img/avatar2.png">';
                }
            }
            ?>
        </div>

        <div class="bio">
            <h5>Welcome, <span> <?php echo $data['name'].' '.$data['surname']; ?></span> </h5>
            <span class="role text-center"  >Role: <?php 
            if( $_SESSION['role']==1){
                echo "Admin";
            }elseif($_SESSION['role']==2){
                echo "Employee";
            }  ?></span>
            <!-- <div class="buttons">
                <a href="#"><i class="fas fa-solid fa-lock"></i></a>
                <a href="#"> <i class="fa-solid fa-gem"></i> </a>
                <a href="#"> <i class="fa-solid fa-gear"></i></i> </a>
            </div> -->
        </div>
    </div>
    <div class="items-part">
        <?php $role = $_SESSION['role']; ?>
        <ul class="items">
            <li class="item active"> <a href="dashboard.php"><i class="fa-solid fa-house-user"></i> Dashboard</a></li>
            <li class="item active"> <a href="manage_complaints.php"><i class="fa-solid fa-file"></i>  Complaints</a></li>
            <li class="item active"> <a href="add_crime.php"><i class="fa-solid fa-file"></i>  Add Crime </a></li>
            <li class="item active"> <a href="manage_crimes.php"><i class="fa-solid fa-file"></i>  view crime</a></li>
            <?php if($_SESSION['role']== 1){?>
            <li class="item active"> <a href="add_criminal.php"> <i class="fa-solid fa-people-robbery"></i>   Add criminal</a></li>
            <li class="item active"> <a href="manage_criminals.php"><i class="fa-solid fa-people-robbery"></i>  view criminals</a></li>
            <li class="item"> <a href="add_employee.php"> <i class="fa-solid fa-people-group"></i>  Add Employees</a></li>
            <li class="item"> <a href="manage_employee.php"> <i class="fa-solid fa-people-group"></i>  All Employees</a></li>
            <!-- <li class="item"> <a href="#"> <i class="fa-solid fa-location-crosshairs"></i> Report Issues</a></li> -->
            <!-- <li class="item"> <a href="#"> <i class="fa-solid fa-gem"></i> View Issues</a></li> -->
            <li class="item"> <a href="add_admin.php"><i class="fa-solid fa-lock"></i> Add Admin</a></li>
            <li class="item"> <a href="manage_admin.php"> <i class="fa-solid fa-house-medical"></i> View Admin</a></li>
                <?php }?>
            <li class="item"> <a href="view_users.php"> <i class="fa-solid fa-users"></i> View Users</a></li>
                <li class="item"> <a href="add_news.php"> <i class="fa-solid fa-newspaper"></i></i> Add News</a></li>
                <li class="item"> <a href="manage_news.php"> <i class="fa-solid fa-newspaper"></i></i> All News</a></li>
                <li class="item"> <a href="add_siteconfig.php"> <i class="fa-solid fa-location-crosshairs"></i> Add Siteconfig</a></li>
                <li class="item"> <a href="manage_siteconfig.php"> <i class="fa-solid fa-location-crosshairs"></i> Manage Siteconfig</a></li>
                <li class="item"> <a href="uploadfile.php"> <i class="fa-solid fa-location-crosshairs"></i> Uplaod File</a></li>
                <li class="item"> <a href="manage_files.php"> <i class="fa-solid fa-location-crosshairs"></i> view File</a></li>
                <li class="item"> <a href=""> <i class="fa-solid fa-gear"></i> Setting</a>
                <ul class="child">
                    <li class="child-item "> <a href="change_password.php"> <i class="fa-solid fa-person-booth"></i> Change Password </a></li>
                </ul> 
            </li>
            <!-- <li class="item"> <a href="#"> <i class="fa-solid fa-gem"></i> View Issues</a></li>
            <li class="item"> <a href="#"> <i class="fa-solid fa-gear"></i> Setting </a></li>
        </ul> -->
        
    </div>
    <!-- modal section -->
</div>
<?php require('modal/update_profile_modal.php');  ?>
        <!-- sidebar menu section end here -->