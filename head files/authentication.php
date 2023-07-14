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
$fn=$_POST['first_name'];
$ln=$_POST['last_name'];
$em=$_POST['email'];
$pw=$_POST['password'];
$data="insert into credentials(Fname,Lname,Email,Passwd) values('$fn','$ln','$em','$pw')";
mysqli_query($connection,$data);
header("location:successfulsignup.php");
?>