<?php require('connection/config.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCRS </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <!-- nav bar section start here -->
    <?php require('inc/navbar.php'); ?>
    <!-- nav bar section end  here -->

    <!-- crousel section start here -->
    <section class="main-section">
      <div class="container-fluid ">
       
      </div>

      <!--  latest news section start here  -->
      <div class="mx-4 my-5 mb-5">
        <div class="row">
          <!-- <h1 class="text-center mb-4 text-success"> News Details</h1> -->
             <div class="col-md-8 col-xs-12 col-sm-12 container">
                <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM news WHERE id= $id";
                    $result = mysqli_query($conn, $sql);
                    $data = $result->fetch_assoc();
                }
                ?>
                <h5 class="text-left"><?php echo $data['category']; ?></h5>
                <span><?php echo $data['date']; ?></span>
                <h1> <?php echo $data['title']; ?></h1>
                <hr>
                <img src="admin/uploads/news/<?php echo $data['image']; ?>" style="max-width: 100%;" alt=""><br> <br>
                <p> <?php echo $data['description']; ?></p>

             </div>
             <div class="col-md-4 col-xs-12 col-sm-12">
              <div class="title bg-dark p-2 text-light text-center font-800 h3">
                Latest News
              </div>
              <div class="content row justify-content-around">
                <?php 
                $s = "SELECT * FROM news ORDER BY date ASC LIMIT 5";
                $r = mysqli_query($conn,$s);
                while($data= mysqli_fetch_assoc($r)){
                  $id = $data['id'];
                  $title = $data['title'];
                    ?>
                    
                 <div class="content-item col-12 row" style="border-bottom: 1px solid rgb(179, 173, 173); padding: 0.3em 0.2em;" onMouseOver="this.style.backgroundColor='#CFD2CF'" onMouseOut="this.style.backgroundColor='white'">
                  <img class ="col-3"src="admin/uploads/news/<?php echo $data['image']; ?>" height="70px" width="70px" alt="">
                    <a class="text-decoration-none h5 p-2 text-dark col-8" href="news_details.php?id=<?php echo $id; ?>" ><?php echo substr_replace($title, ".", 100);    ?>
                    </a>
                 </div>
                <?php
              }
                ?>
              </div>

             </div>
        </div>
      </div>
      <!--  latest news section end here  -->
    
    </section>
  
    <!-- crousel section end here -->
    <script src="https://cdn.jsdelivr. net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- <script src="assets/js/index.js"> -->
       <!-- javascript for navbar -->
    </script>
    <?php require('inc/footer.php');  ?>
  </body>
</html>