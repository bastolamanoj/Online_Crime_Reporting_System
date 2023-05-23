<?php
require('../connection/config.php');

if(isset($_POST['checking_statusbtn'])){
    $id = $_POST['c_id'];
    $status = $_POST['c_status'];
    
    $sql ="SELECT * FROM complaints WHERE id=$id";
    $result =mysqli_query($conn, $sql);
    $data= mysqli_fetch_assoc($result);
    echo $return ='
     
        <form action="change_status.php" class="center  " method="post">
        <label>Status</label> <span class="mandetory_field"> * </span> <br>
        <input type="text" name="id" value="'.$id.'" style="display:none;">
        <select name="status" class="form-control" >
        <option value="1" ';if($status==1){
            echo 'selected';
        } echo' >Pending</option>
        <option value="2" ';if($data['status']==2){
            echo 'selected'; }echo'>in-progress</option>
        <option value="3" '; if($data['status']==3 ){
            echo 'selected';} echo'>Completed</option>
        </select>   

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel </button>
    <button type="submit" name="submit" class="btn btn-primary">Save </button>
    </div>
    </form>';

}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $status =$_POST['status'];
    $update_query= "UPDATE complaints SET status= $status WHERE id=$id ";
    $update_result= mysqli_query($conn, $update_query);

    if($update_result){
        echo ' <meta http-equiv="refresh" content="0; URL=manage_complaints.php?msg=changestatus" />';
    }
}



?>