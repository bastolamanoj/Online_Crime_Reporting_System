<?php
require('connection/config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <script>
    function myFunction() {
  // Get the text field
     console.log("manojbastola bca departmaent");
  var copyText = document.getElementById("myInput");

  // Select the text field
//   copyText.select();
//   copyText.setSelectionRange(0, 99999); // For mobile devices
//  console.log(copyText);
   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied complaint id: " + copyText.value);
} 
</script>
  </head>
  <body>
    
    <div class="container mt-2">
        <form class="row  needs-validation w-75 mx-auto" action="" method="post" enctype="multipart/form-data">
          <div class="col-md-8">
            <h1 class="text-primary">copy your Complaint id</h1>
            <label for="validationCustom01" class="form-label text"  > Complaint Id</label>
            <input type="text" name="complaint_id" class="form-control" id="myInput" value="<?php 
            if(isset($_GET['id'])){
                echo $_GET['id'];
            }
            ?>" required>
  
            <button onclick="myFunction()" class="btn btn-primary btn-md mt-3 mr-4" >Copy </button>
            <a class="btn btn-primary btn-md mt-3 mx-auto" href="emergency_complaints.php"  >Go Back </a>
          </div>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>