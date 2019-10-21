<?php
require 'db.php';
$results=array();
$flag=$_POST['flag'];
switch($flag){
    //insert query for lent_book
    case 1:$book_id=$_POST['book_id'];
           $lent_date=$_POST['date'];
           $lent_to=$_POST['lent_to'];
           $phone_no=$_POST['ph_no'];
           //$book_return_status=1 received
           //$book_return_status=0 returned
           $book_return_status=$_POST['book_return'];
           $due_date=$_POST['due_date'];
           $user_id=$_POST['usrid'];
           $sql="INSERT INTO `lent_books`( `book_id`, `date`, `lent_to`, `phone_no`, `book_return_status`, `due_date`, `user_id`) 
           VALUES ('$book_id','$lent_date','$lent_to','$phone_no','$book_return_status','$due_date','$user_id')";
           $res=mysqli_query($con,$sql);
           if($res){
            //echo "inserted sucessfully";
            $results2['status']=1;
            $results2['message']="inserted successfull";
            }else{
            //echo "failed to insert";
            $results2['status']=-1;
            $results2['message']="insert failed";
            }
            array_push($results,$results2);
            echo json_encode($results);  
    break;
    //select query
    case 2:$user_id=$_POST['uid'];
    $sql="SELECT * FROM `lent_books` WHERE `user_id`='$user_id'";
    $res=mysqli_query($sql);
    while($row=mysqli_fetch_assoc($res)){
        $results2['book_id']=$row['bid'];
        $results2['date']=$row['lent_date'];
        $results2['lent_to']=$row['lent_to'];
        $results2['phone_no']=$row['ph_no'];
        $results2['book_return_status']=$row['return_status'];
        $results2['due_date']=$row['lent_due_date'];
        $results2['user_id']=$row['user_id'];
        array_push($results,$results2);
    }
    echo json_encode($results);
    break;

    //update query
    case 3:$book_id=$_POST['book_id'];
    $lent_date=$_POST['date'];
    $lent_to=$_POST['lent_to'];
    $phone_no=$_POST['ph_no'];
    $book_return_status=$_POST['book_return'];
    $due_date=$_POST['due_date'];
    $user_id=$_POST['usrid'];
    $sql=" UPDATE `lent_books` SET `date`='$lent_date',`lent_to`='$lent_to',
    `phone_no`='$phone_no',`book_return_status`='$book_return_status',`due_date`='$due_date'
     WHERE `book_id`='', and `user_id`='$user_id'";
     $res=mysqli_query($con,$sql);
     if($res)
 {
    //echo "inserted sucessfully";
    $results2['status']=1;
    $results2['message']="update successfull";
 }
 else{
    //echo "failed to insert";
    $results2['status']=-1;
    $results2['message']="update failed";
    
 }
 array_push($results,$results2);
 echo json_encode($results);
 break;
    
    //delete query        
    case 4:$user_id=$_POST['uid'];
    $sql="UPDATE `lent_books` SET `book_return_status`= 0 WHERE `user_id`='$user_id'";
       $res=mysqli_query($con,$sql);
     if($res){
    //echo "inserted sucessfully";
    $results2['status']=1;
    $results2['message']="return successfull";
}
else{
    //echo "failed to insert";
    $results2['status']=-1;
    $results2['message']="return failed";
    
}
array_push($results,$results2);
echo json_encode($results);
    break;
    default: echo "default case";
    break;
}
?>