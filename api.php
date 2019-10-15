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
    case 3:
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