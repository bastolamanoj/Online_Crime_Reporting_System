<?php
require('../../connection/config.php');

if(isset($_POST['check_status'])){
    $username = $_POST['username'];
    $role = $_POST['role'];
    if($role ==1){
        $sql= "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
    }elseif($role==2){
        $sql= "SELECT * FROM employees WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
    }
    while($data= mysqli_fetch_assoc($result)){
        $id = $data['id'];
        $photo = $data['photo'];
        $name =$data['name'];
        $surname = $data['surname'];
        $role = $data['access'];
        $email = $data['email'];
        $phone = $data['phone'];
        $username = $data['username'];
        $gender = $data['gender'];
  

        echo $return ='
        <div class="row justify-content-around">
            <div class="col-12  row py-2  border-bottom border-3">
                <div class="col-3">
                <b> Name: </b> 
                </div>
                <div class="col-9">
                '.$name.'
                </div>
                </div>
        <div class="col-12 row py-2  border-bottom-1 border-3">
            <div class="col-6 ">';
                if(!empty($photo)){
                    echo $return ='<img src="uploads/profile/'.$photo.'" height="150em" > ';    
                }else{
                    echo $return ='  <img src="'.$image.'" height="150em" />  ';
                }
                    echo $return=' 
            </div>
            <div class="col-6">
            <form action="process/profile_change.php" method="POST" enctype="multipart/form-data">
            <label>Update Profile Picture </label> <span class="mandetory_field"> * </span>
            <input type="text" class="form-control d-none" name="id" placeholder="profile" value="'.$id.'">
            <input type="text" class="form-control d-none" name="photolink" placeholder="profile" value="'.$photo.'">
            <input type="file" class="form-control" name="photo" placeholder="profile" required>
            <div class="form-group  my-2">
            <button class=" btn-sm bg-success text-light" type="submit" name="update">Update</button>
      
            </div>
            </form>
        </div>
        </div>
            <div class="col-12 row py-2  border-bottom-1 border-3">
            <div class="col-3">
                <b> Role: </b> 
                </div>
            <div class="col-7">';
                if($role ==1){
                    echo $return ='<b> Admin</b>';    
                }elseif($role==2){
                    echo $return ='<b> Employee</b>';   
                }
                    echo $return=' 
            </div>
        </div>
            <div class="col-12 row py-2 border-bottom border-3">
                <div class="col-3">
                <b> email: </b> 
                </div>
                <div class="col-9">
                '.$data['email'].'
                </div>
            </div>
            <div class="col-12 row py-2 border-bottom border-3">
                <div class="col-3">
                <b> phone: </b> 
                </div>
                <div class="col-9">
                '.$data['phone'].'
                </div>
            </div>
            <div class="col-12 row py-2 border-bottom border-3">
                <div class="col-3">
                <b> Gender: </b> 
                </div>
                <div class="col-9">
                '.$data['gender'].' 
                </div>
            </div>
            <div class="col-12 row py-2 border-bottom border-3">
                <div class="col-md-3 col-4">
                <b> Username: </b> 
                </div>
                <div class="col-md-9 col-8">
                '.$data['username'].' 
                </div>
            </div>
           
        </div>';
      
    }
}



// update profile picture 
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $photolink = $_POST['photolink'];
    $photo_name= $_FILES['photo']['name'];
    $photo_size= $_FILES['photo']['size'];
    $fphoto = explode('.',$photo_name); //it convet the string into array
    $fphotoname = $fphoto[0];
    $ext = $fphoto[1];
    $ffphoto= str_replace(' ','',$fphotoname);
    $finalname = strtolower($ffphoto.time());
    $finalphoto = $finalname.'.'.$ext;

    if(move_uploaded_file($_FILES['photo']['tmp_name'], "../uploads/profile/".$finalphoto)){
        $s_update= "UPDATE admin SET photo ='$finalphoto' WHERE id = '$id'";
        $result = mysqli_query($conn, $s_update);
        if($result){
            $finalfilelink = '../uploads/profile/'.$photolink;
            unlink($finalfilelink);
          echo  'updated successfully';
          echo ' <meta http-equiv="refresh" content="0; URL=../dashboard.php?msg=usuccess" />';
        }
        
}

  
}
?>