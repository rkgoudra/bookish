<?php
require 'db.php';
//flag 1= Register
//flag 2= login
//flag 3=add_books
$results=array();
$flag=$_POST['flag'];

switch($flag)
{
    //login chcek query
    case 1:$email_id=$_POST['mail'];
           $password=md5($_POST['pwd']);
           $sql="SELECT * FROM `register` WHERE `email_id`='$email_id' and `password`='$password'";
           $res=mysqli_query($con,$sql);
           if(mysqli_num_rows($res)>=1){
               while($row=mysqli_fetch_assoc($res)){
                $results2['status']=1;
                $results2['user_id']=$row['id'];
                $results2['user_name']=$row['first_name'];
                $results2['email']=$row['email_id'];
                $results2['message']="Welcome,".strtoupper($row['first_name']);
               }
           }else{
            $results2['status']=-1;
            $results2['user_id']=0;
            $results2['message']="login failed";   
        }
        //array_push($results,$results2);
        echo json_encode($results2); 
    break; 
    //Register table Insert query
    case 2: $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email_id=mysqli_real_escape_string($con,$_POST['mail']);
    $password=md5($_POST['pwd']);
    $phone_no=$_POST['phno'];
   // $status=$_POST['status'];
    //$gender=$_POST['gender'];     
     $sql1 = "SELECT `email_id`, `phone_no` FROM `register` WHERE `email_id`='$email_id' or `phone_no`='$phone_no'" ;
     $res=mysqli_query($con,$sql1);
     if (mysqli_num_rows($res) == 0) {
      $sql="INSERT INTO `register` (`first_name`, `last_name`, `email_id`, `password`, `phone_no`, `status`) 
      VALUES ('$first_name','$last_name','$email_id','$password','$phone_no',1)";
         $res1=mysqli_query($con,$sql);
         if($res1){
            //echo "inserted sucessfully";
            $results2['status']=1;
            $results2['message']='Registration Done';
            }else{
            //echo "failed to insert";
            $results2['status']=-1;
            $results2['message']='Registration failed';
            }  
     }else{
        $results2['status']=0;
        $results2['message']='email or mobile Number found';
        }
        // array_push($results,$results2);
        
        echo json_encode($results2); 
    
    break;
    
    default: echo "default case";
    break;

}
?>