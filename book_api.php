<?php
require 'db.php';
$results=array();
$flag=$_POST['flag'];
switch($flag){
    //insert query to book_table
    case 1: $book_title=$_POST['title'];
    $book_image=$_POST['image'];
    $book_auth_name=$_POST['authorName'];
    $book_language=$_POST['language'];
    $book_gener=$_POST['gener'];
    $book_status=$_POST['status'];
    $book_description=$_POST['description'];
    $user_id=$_POST['uid'];
    
         $sql="INSERT INTO `book_table`(`title`, `image`, `author_name`, `language`, `gener`, `status`, `description`,`user_id`,`delete_status`) 
         VALUES ('$book_title','$book_image','$book_auth_name','$book_language','$book_gener','$book_status','$book_description','$user_id',1) ";
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
           $sql="SELECT * FROM `book_table` WHERE user_id='$user_id'";
           $res=mysqli_query($con,$sql);
         while($row=mysqli_fetch_assoc($res)){
          echo $row['title'];   
         }                
    break;
    
    //update query
    case 3: $book_id=$_POST['bid'];
    $book_title=$_POST['title'];
    $book_image=$_POST['image'];
    $book_auth_name=$_POST['authorName'];
    $book_language=$_POST['language'];
    $book_gener=$_POST['gener'];
    $book_status=$_POST['status'];
    $book_description=$_POST['description'];
    $user_id=$_POST['uid'];
         $sql="UPDATE `book_table` SET `title`='$book_title',`image`='$book_image',`author_name`='$book_auth_name',`language`='$book_language',
         `gener`='$book_gener',`status`='$book_status',`description`='$book_description',`user_id`='$user_id' WHERE `book_id`='$book_id'"; 
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
case 4: $book_id=$_POST['bid'];
     $sql="UPDATE `book_table` SET `delet_status`= 0 WHERE `book_id`='$book_id'"; 
     $res=mysqli_query($con,$sql);
     if($res)
{
    //echo "inserted sucessfully";
    $results2['status']=1;
    $results2['message']="delete successfull";
}
else{
    //echo "failed to insert";
    $results2['status']=-1;
    $results2['message']="delete failed";
    
}
array_push($results,$results2);
echo json_encode($results);
break;




 
}
