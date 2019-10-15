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
    case 1:
    break; 
    //Register table Insert query
    case 2:
    break;
    //book_table insert query
    case 3:$book_title=$_POST['title'];
           $book_image=$_POST['image'];
           $book_auth_name=$_POST['authorName'];
           $book_language=$_POST['language'];
           $book_gener=$_POST['gener'];
           $book_status=$_POST['status'];
           $book_description=$_POST['description'];
                $sql="INSERT INTO `book_table`(`title`, `image`, `author_name`, `language`, `gener`, `status`, `description`) 
                VALUES ('$book_title','$book_image','$book_auth_name','$book_language','$book_gener','$book_status','$book_description') ";
                        $res=mysqli_query($con,$sql);
                                if($res){
                                //echo "inserted sucessfully";
                                $results2['status']=1;
                                $results2['message']="inserted successfull";
                                array_push($results,$results2);
                                echo json_encode($results);
                                }else{
                                //echo "failed to insert";
                                $results2['status']=-1;
                                $results2['message']="insert failed";
                                array_push($results,$results2);
                                echo json_encode($results);
                                }
    break;
    //insert query to lent_book table
    case 4:$book_id=$_POST['book_id'];
           $lent_Date=$_POST['date'];
           $lent_To=$_POST['lent_to'];
           $phone_Number=$_POST['phno'];
           $book_Return_staus=$_POST['retunStatus'];
           $due_Date=$_POST['due_date'];
               $sql="INSERT INTO `lent_books`(`book_id`, `date`, `lent_to`, `phone_no`, `book_return_status`, `due_date`) 
               VALUES ('$book_id','$lent_Date','$lent_To','$phone_Number','$book_Return_staus','$due_Date') ";
                    $res=mysqli_query($con,$sql);
                    if($res){
                        $results2['status']=1;
                        $results2['message']="inserted successfull";
                        array_push($results,$results2);
                        echo json_encode($results); 
                    }else{
                        $results2['status']=-1;
                                $results2['message']="insert failed";
                                array_push($results,$results2);
                                echo json_encode($results);
                    }    
    break;
    //insert query to Gener_master
    case 5:$gener_Name=$_POST['generName'];
           $gener_State=$_POST['status'];
           $sql="INSERT INTO `gener_master` (`gener_name`, `gener_status`) 
           VALUES ('$gener_Name','$gener_State')";
           $res=mysqli_query($con,$sql);
           if($res){
               $results2['status']=1;
               $results2['message']="insert successfull";
               array_push($results,$results2);
               echo json_encode($results);
           }else{
            $results2['status']=-1;
            $results2['message']="insert failed";
            array_push($results,$results2);
            echo json_encode($results);
           }          
    break;

    default: echo "default case";
    break;

}
?>