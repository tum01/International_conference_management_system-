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
$data="insert into admin values('$em','$pw')";
mysqli_query($connection,$data);
echo 'new admin added'; 
//header("location:successfulsignup.php");
?>