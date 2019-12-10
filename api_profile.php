<?php
require 'db.php';
//flag 1= Get_Profile_Details
//flag 2= Update_Profile_Details
//flag 3=Profile_Image_Upload
$results=array();
$flag=$_POST['flag'];

switch($flag)
{
    //login chcek query
    case 1:$id=$_POST['id'];
           $sql="SELECT * FROM `register` WHERE `id`='$id'";
           $res=mysqli_query($con,$sql);
           if(mysqli_num_rows($res)>=1){
               while($row=mysqli_fetch_assoc($res)){
                $results2['status']="1";
                $results2['user_id']=$row['id'];
                $results2['user_name']=$row['first_name'];
                $results2['last_name']=$row['last_name'];
                $results2['email']=$row['email_id'];
                $results2['gender']="Select";
                $results2['phno']=$row['phone_no'];
                //$results2['profile_pic']=$row['profile_pic'];
                $results2['profile_pic']=$row['profile_pic']==null?'Assets/Default_Profile_Pic.png':$row['profile_pic'];
               }
           }else{
            $results2['status']="0";
            // $results2['user_id']=$row['id'];
            // $results2['user_name']=$row['first_name'];
            // $results2['last_name']=$row['last_name'];
            // $results2['email']=$row['email_id'];
            // $results2['gender']="Select";
            // $results2['phno']=$row['phone_no'];
            // $results2['profile_pic']='Assets/Default_Profile_Pic.png';
            $results2['message']="No User Data Found.";
        }
        array_push($results,$results2);
        echo json_encode($results); 
    break; 
    //Update_Profile_Details
    case 2: $id=$_POST['id'];
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $gender=$_POST['gender'];
    $sql="UPDATE `register` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender' WHERE `id`='$id'";
    $res=mysqli_query($con,$sql);
    $res2 = mysqli_num_rows($res);
    if($res2){
        $results2['status']="1";
        $results2['message']="Update success";
    }else{
        $results2['status']="-1";
        $results2['message']="Update failed";
    }
    array_push($results,$results2);
    echo json_encode($results); 
    break;
    default: echo "default case";
    break;

}
?>