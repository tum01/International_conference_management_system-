<?php
session_start();
$connection=mysqli_connect('localhost','root');
if($connection)
{
    echo "hi";
}
else
{   
    echo "Oh! no";
}
mysqli_select_db($connection, 'authentication');
$qry="select *   from currentconference";
$con=mysqli_query($connection,$qry);
$con=mysqli_fetch_array($con);  
$cn= $con['con_id'];
$_SESSION['con']=$cn;
$fn=$_POST['first_name'];
$ln=$_POST['last_name'];
$em=$_POST['email'];
$pw=$_POST['password'];
$data="insert into reviewer values('$cn','$fn','$ln','$em','$pw')";
mysqli_query($connection,$data);
echo 'new reviewer added';     
header("location:reviewpage.php");
?>