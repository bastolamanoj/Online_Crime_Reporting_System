<?php
require ("process/check_session.php");
?>
<!-- db connection -->
<?php require('../connection/config.php')  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="icon" type="image/x-icon" href="img/ocrslogo1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/customize_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
        </script>
    <script >
        $(document).ready(function(){
       // alert("click successfully");
        $(".profilebtn").dblclick(function(){
           // alert("The paragraph was double-clicked");
            let username = $(this).attr('data-user');
            let role = $(this).attr('data-role');
        
            $.ajax({
                type: "POST",
                url: "process/profile_change.php",
                data: {
                    "check_status": true,
                    "username" : username,
                    "role" : role
                },
                success: function(response){
                    $('.modal-profile-body').html(response);
                    $('.update-modal').modal('show');
                }
            });

        }); 
 

        // for district selection
        $("#province").on('change', function(){
            let provinceId = $(this).val();
            alert("province slecejsdk");

            $.ajax({
                method: "POST",
                url: "load-pdc.php",
                data:{id: provinceId},
                dataType: 'html',
                success: function(data){
                    $("#district").append(data);
                }
            });
        }) ;

          // for city selection
        $("#district").on('change', function(){
            let districtId = $(this).val();
            alert(districtId);

            $.ajax({
                method: "POST",
                url: "load-pdc.php",
                data:{"districtId": districtId},
                dataType: 'html',
                success: function(data){
                    $("#city").append(data);
                }
            });
        }) ;

        // js for searching
        $("#search").keyup(function(){
            search_table($(this).val());
        });
        
        function search_table(value){
            $('#myTable #tableData').each(function(){
                let found= 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0){
                        found= 'true';
                        // alert("found");
                    }
                });

                if(found=='true'){
                    $(this).show();
                }
                if(found=='false'){
                    $(this).hide();
                }
            })

        }


       }); 


   
    </script>
</head>

<body>