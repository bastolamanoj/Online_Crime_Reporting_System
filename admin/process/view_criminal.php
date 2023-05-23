

<?php
require('../../connection/config.php');

if(isset($_POST['checking_viewbtn'])){
    $id = $_POST['c_id'];
    if(isset($_POST['c_image'])){
        $image =$_POST['c_image'];

    }
    
    $sql ="SELECT * FROM criminals WHERE id=$id";
    $result =mysqli_query($conn, $sql);
    $data= mysqli_fetch_assoc($result);
    $name = $data['name'] .' '. $data['surname'];
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
            <div class="col-12  py-2  border-bottom-1 border-3">';

        if(empty($image)){
            echo $return ='<img src="uploads/'.$data['photo'].'" height="200px" />   ';    
        }else{
            echo $return ='  <img src="'.$image.'" height="200px" />  ';
        }
             echo $return='  
        </div>
        <div class="col-12 row py-2 border-bottom border-3">
            <div class="col-3">
            <b> Height: </b> 
            </div>
            <div class="col-9">
            '.$data['height'].' <b> feet </b> 
            </div>
        </div>
        <div class="col-12 row py-2 border-bottom border-3">
            <div class="col-3">
            <b> Weight: </b> 
            </div>
            <div class="col-9">
            '.$data['weight'].'<b> kg </b> 
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
        <div class="col-12 row  py-2  border-bottom border-3">
            <div class="col-3">
            <b> Email: </b> 
            </div>
            <div class="col-9">
            '.$data['email'].' 
            </div>
        </div>
        <div class="col-12 row  py-2  border-bottom border-3">
            <div class="col-3">
            <b> Province: </b> 
            </div>
            <div class="col-9">
            '.$data['province'].'
            </div>
        </div>
        <div class="col-12 row  py-2  border-bottom border-3">
            <div class="col-3">
            <b> District: </b> 
            </div>
            <div class="col-9">
            '.$data['district'].'
            </div>
        </div>
        <div class="col-12 row  py-2  border-bottom border-3">
            <div class="col-3">
            <b> City: </b> 
            </div>
            <div class="col-9">
            '.$data['city'].'
            </div>
        </div>
    </div>';
     

}



?>