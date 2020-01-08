<?php
require 'db.php';
//flag 1= Get_Gener_Details

$results=array();
$flag=$_POST['flag'];

switch($flag)
{
    //get Gener List
    case 1:$sql="SELECT `gener_id`, `gener_name` FROM `gener_master` WHERE `gener_status`=1";
           $res=mysqli_query($con,$sql);
           if($res){
               while($row=mysqli_fetch_assoc($res)){
                $results2['status']="1";
                $results2['gener_id']=$row['gener_id'];
                $results2['gener_name']=$row['gener_name'];
               }
           }else{
            $results2['status']="0";
            $results2['message']="No Data Found.";
        }
        array_push($results,$results2);
        echo json_encode($results); 
    break; 
    
    
}
?>