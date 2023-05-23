
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
    <h2> <i class="fa-solid fa-gauge" style="margin-right:13px;"></i>My Dashboard</h2>
</header>
    <?php
     $role = $_SESSION['role'];


    ?>
<div class="grid-box">
    <div class="grid-item" id="grid-item1">
        <div class="row">
            <div class="left-item">
                <i class="fa-solid fa-file"></i>
            </div>
            <div class="right-item">
            <?php 
            $select_query= "SELECT * FROM complaints";
            $result_query = mysqli_query($conn, $select_query);
            $rows = mysqli_num_rows($result_query);
            echo "<h3> $rows </h3> ";
            ?>
            </div>
        </div>
        <h4> <a href="manage_complaints.php" class="text-light" >Total Cases  </a> </h4>
    </div>
    <?php if($role==1){
    ?>
    <div class="grid-item" id="grid-item2">
        <div class="row">
            <div class="left-item">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div class="right-item">
            <?php 
            $select_query= "SELECT * FROM admin";
            $result_query = mysqli_query($conn, $select_query);
            $rows = mysqli_num_rows($result_query);
            echo "<h3> $rows </h3> ";
            ?>
            </div>
        </div>
        <h4> <a href="manage_admin.php" class="text-light" > Total Admin  </a>  </h4>
    </div>
  <?php
  }elseif($role== 2){
    ?>
     <div class="grid-item" id="grid-item2">
        <div class="row">
            <div class="left-item">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div class="right-item">
            <?php 
            $select_query= "SELECT * FROM crimes";
            $result_query = mysqli_query($conn, $select_query);
            $rows = mysqli_num_rows($result_query);
            echo "<h3> $rows </h3> ";
            ?>
            </div>
        </div>
        <h4> <a href="manage_crimes.php" class="text-light" > Total crimes  </a>  </h4>
    </div>
    <?php
  }
    ?>
    

    <div class="grid-item" id="grid-item3">
        <div class="row">
            <div class="left-item">
            <i class="fa-solid fa-masks-theater"></i>
            </div>
            <div class="right-item">
            <?php 
            $select_query= "SELECT * FROM criminals";
            $result_query = mysqli_query($conn, $select_query);
            $rows = mysqli_num_rows($result_query);
            echo "<h3> $rows </h3> ";
            ?>
            </div>
        </div>
        <h4> <a href="manage_criminals.php" class="text-light" > Total Criminals  </a>   </h4>
    </div>

    <div class="grid-item" id="grid-item4">
        <div class="row">
            <div class="left-item">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="right-item">
            <?php 
            $select_query= "SELECT * FROM users";
            $result_query = mysqli_query($conn, $select_query);
            $rows = mysqli_num_rows($result_query);
            echo "<h3> $rows </h3> ";
            ?>
            </div>
        </div>
        <h4> <a href="view_users.php" class="text-light" > users </a></h4>
    </div>

</div>

        

        <!-- footer part  -->
        <?php require('inc/footer.php'); ?>

 