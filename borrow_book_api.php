<?php
require 'db.php';
$results=array();
$flag=$_POST['flag'];
switch($flag){
    //insert query to borrow_book table
    case 1:$book_id=$_POST['bid'];
           $borrow_date=$_POST['date'];
           $borrow_from=$_POST['b_from'];
           $borrow_phone_no=$_POST['b_ph_no'];
           //$book_return_status=1 received
           //$book_return_status=0 returned
           $book_return_status=$_POST['return_status'];
           $borrow_due_date=$_POST['due_date'];
           $user_id=$_POST['uid'];
           $sql="INSERT INTO `borrowed_books`( `book_id`, `date`, `borrow_from`, `phone_no`, `book_return_status`, `due_date`, `user_id`) 
           VALUES ('$book_id','$borrow_date','$borrow_from','$borrow_phone_no',1,'$borrow_due_date','$user_id')"; 
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
           $sql="SELECT * FROM `borrowed_books` WHERE `user_id`='$user_id'";
           $res=mysqli_query($con,$sql);
           while($row=mysqli_fetch_assoc($res)){
               $results2['book_id']=$row['bid'];
               $results2['date']=$row['date'];
               $results2['borrow_from']=$row['phone_no'];
               $results2['book_return_status']=$row['book_return_status'];
               $results2['due_date']=$row['due_date'];
               $results2['user_id']=$row['user_id'];
               array_push($results,$results2);
           } 
           echo json_encode($results);
break;
//update query 
    case 3:$book_id=$_POST['bid'];
    $borrow_date=$_POST['date'];
    $borrow_from=$_POST['b_from'];
    $borrow_phone_no=$_POST['b_ph_no'];
    $book_return_status=$_POST['return_status'];
    $borrow_due_date=$_POST['due_date'];
    $user_id=$_POST['uid'];
    $sql="UPDATE `borrowed_books` SET `date`='$borrow_date',`borrow_from`='$borrow_from',`phone_no`='$borrow_phone_no',
    `book_return_status`='$book_return_status',`due_date`='$borrow_due_date' WHERE `book_id`='$book_id' and `user_id`='$user_id'";
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
//delete book from borrow table
case 4:$user_id=$_POST['uid'];
       $sql="UPDATE `borrowed_books` SET `book_return_status`= 0 WHERE `user_id`='$user_id'";
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