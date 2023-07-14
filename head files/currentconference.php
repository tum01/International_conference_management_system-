<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $cur=$_GET['id'];
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
    $qry1="truncate table currentconference";
    mysqli_query($connection,$qry1);

    $data="insert into currentconference values ('$cur')";
    $ans=mysqli_query($connection,$data);
    // while($row=mysqli_fetch_array($ans))
    // {
    //     if($em==$row['Email'] && $pw==$row['Password'])
    //     {
    //         header('location:adloginsuccessful.php');   
    //     }
    // }
    // echo "error incorrect email or password";
    echo "succefully new conference is made";
    header('location:inconference.php');
?>
