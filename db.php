<?php
$username="root";
$password="";
$host="localhost";
$dbName="bookish";
$con=mysqli_connect($host,$username,$password,$dbName);
if($con)
{
   //echo "Connected to db";
}
else{
    echo "something went wrong..";
}.
?>