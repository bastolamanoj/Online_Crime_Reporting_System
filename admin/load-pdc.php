<?php
$con= mysqli_connect('localhost','root', '','province_district_city');

 if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($con, "select * from districts where province_id =$id");
    while($row=mysqli_fetch_assoc($query)){
        $id = $row['id'];
        $district = $row['district'];
        echo $return = '<option value="'.$id.'" > '.$district.' </option>';

    }
 }


 if(isset($_POST['districtId'])){
    $districtId = $_POST['districtId'];
    $query = mysqli_query($con, "select * from city where district_id =$districtId");
    while($row=mysqli_fetch_assoc($query)){
        $id = $row['id'];
        $city = $row['city'];
        echo $return = '<option value="'.$id.'" > '.$city.' </option>';

    }
 }
?>