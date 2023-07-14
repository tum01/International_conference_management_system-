<?php
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


// $qry1="delete from currentconference where $con['con_id']=con_id";
// mysqli_query($connection,$qry1);
$fn=$_POST['first_name'];
$ln=$_POST['last_name'];
$em=$_POST['email'];
$pw=$_POST['password'];
echo $cn;
$data="insert into credentials(Fname,Lname,Email,Passwd,conference_id) values('$fn','$ln','$em','$pw','$cn')";
mysqli_query($connection,$data);
header("location:successfulsignup.php");
?>