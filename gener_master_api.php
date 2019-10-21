<?php
require 'db.php';
$results=array();
$flag=$_POST['flag'];
switch($flag){
    //insert query for gener_master table
    case 1:$gener_Name=$_POST['generName'];
    //genre_status=1 active
    //gener_status=0 no-active
    $gener_Status=$_POST['status'];
    $sql="INSERT INTO `gener_master` (`gener_name`, `gener_status`) 
    VALUES ('$gener_Name',1)";
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

    //select query for genre_master
    case 2:$sql="SELECT * FROM `gener_master` WHERE `gener_status`=1";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $results2['gener_id']=$row['gener_id'];
        $results2['gener_name']=$row['gener_name'];
        array_push($results,$results2);
    } 
    echo json_encode($results);
break;
    break;

    //
    case 3:

    break;

    // 
    case 4:
    break;

    default: echo "default case";
    break;