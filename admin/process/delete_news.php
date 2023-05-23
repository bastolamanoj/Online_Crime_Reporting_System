<?php 
require('../../connection/config.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $squery = "SELECT *  FROM news WHERE id=$id";
    $sresult = mysqli_query($conn,$squery);
    
    $select_row = $sresult->fetch_assoc();
    $filelink = $select_row['image'];
    $finalfilelink = '../uploads/news/'.$filelink;
    unlink($finalfilelink);

    $query = "DELETE FROM news WHERE id=$id";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        echo header('Location: ../manage_news.php?msg=dsuccess');
    }
    else 
    {
        echo header("Location: ../manage_news.php?msg=derror");
    }
}
?>