<?php require('connection/config.php'); ?>
<?php require('inc/navbar.php'); ?>

<!-- crousel section start here -->
<section class="main-section">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
        aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner"> 
      <div class="carousel-item active">
        <img src="img/crime_banner.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider4.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <!--  latest news section start here  -->
  <div class="container my-5 mb-5">
    <div class="row">
      <h1 class="text-center mb-4 text-success">Latest News </h1>
      <?php 
          $s_query = "SELECT * FROM news";
          $s_result = mysqli_query($conn, $s_query);
          while($data = $s_result->fetch_assoc()){
            $description= $data['description'];
          ?>
      <div class=" col-md-4 mb-5">
        <div class="card">
          <img src="admin/uploads/news/<?php echo $data['image']; ?>" height="250px" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $data['title']; ?>
            </h5>
            <p class="card-text">
              <?php echo substr_replace($description,'.',100); ?>
            </p>
            <a href="news_details.php?id=<?php echo $data['id']?>" class="">Read More..</a>
          </div>
        </div>
      </div>
      <?php } ?>

    </div>
  </div>
  <!--  latest news section end here  -->


  <!--  criminals section start here  -->
  <div class="container my-5 mb-5">
    <div class="row">
      <h1 class="text-center mb-4 text-success">Criminals Details </h1>
      <?php 
          $s_query = "SELECT * FROM criminals";
          $s_result = mysqli_query($conn, $s_query);
          while($data = $s_result->fetch_assoc()){
          ?>
      <div class=" col-md-4 mb-5">
        <div class="card">
          <img src="admin/uploads/<?php echo $data['photo']; ?>" height="250px" class="card-img-top" alt="...">
          <div class="">
            <h4 class="card-title py-1">
              <?php echo $data['name'].' '.$data['surname']; ?>
            </h4>
            <div class="row my-1">
              <div class="col-6">
                <SPAN class="fw-bold">
                Height : <?php echo  $data['height']; ?>
                </SPAN>
              </div>
              <div class="col-6">
                <SPAN class="fw-bold">
                Weight : <?php echo  $data['weight']; ?>
                </SPAN> 
              </div>
            </div>
            <div class="row my-1">
              <div class="col-6">
                <SPAN class="fw-bold">
                Gender : <?php echo  $data['gender']; ?>
                </SPAN>
              </div>
              <div class="col-6">
                <SPAN class="fw-bold">
                Province :
                <?php
                $province = $data['province'];
                      $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                      $s = mysqli_query($con, "select * from province where id=$province");
                      $r=mysqli_fetch_assoc($s);
                      echo $r['province'];
                      ?>
                </SPAN> 
              </div>
            </div>
      
            <div class="row my-1">
              <div class="col-6">
              <SPAN class="fw-bold">
                District :
                <?php
                    $district = $data['district'];
                      $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                      $s = mysqli_query($con, "select * from districts where id=$district");
                      $r=mysqli_fetch_assoc($s);
                      echo $r['district'];
                    ?>
                </span>
              </div>
              <div class="col-6">
                <SPAN class="fw-bold">
                City :
                <?php
                    $city = $data['city'];
                      $con=  mysqli_connect("localhost","root", "", "province_district_city");  
                      $s = mysqli_query($con, "select * from city where id=$city");
                      $r=mysqli_fetch_assoc($s);
                      echo $r['city'];
                    ?>
                </SPAN> 
              </div>
            </div>
      
            <div class="row my-1">
              <div class="col-12">
              <SPAN class="fw-bold">
                Crime Types :
                <?php
                $query ="SELECT *
                FROM criminals
                JOIN crimes ON criminals.name= crimes.criminal";
                $result=mysqli_query($conn, $query);
                $d1 = mysqli_fetch_assoc($result);
                echo $d1['category'];

                  ?>
                </span>
              </div>
         
            </div>
      
           
            <!-- <a href="news_details.php?id=<?php echo $data['id']?>" class="">Read More..</a> -->
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <!--  latest criminals section end here  -->

</section>

<?php require('inc/footer.php'); ?>