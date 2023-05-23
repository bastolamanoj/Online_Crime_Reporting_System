<?php require('process/check_session.php'); ?> 
<?php require('connection/config.php'); ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="assets/css/custom_css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/user_dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
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
