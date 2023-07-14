<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $em=$_POST["email"];
    $pw=$_POST['password'];
    // $data1='anishj469@gmail.com';
    // $data2='am';
    // if($em==$data1 && $pw==$data2)
    // {
    //     header('location:loginsuccessful.php');
    // }
    // else
    // {
    //     echo "error incorrect email or password";
    // }
    $data="select * from admin";
    $ans=mysqli_query($connection,$data);
    while($row=mysqli_fetch_array($ans))
    {
        if($em==$row['Email'] && $pw==$row['Password'])
        {
            header('location:adloginsuccessful.php');   
        }
    }
?>
<h1> invalid details </h1>