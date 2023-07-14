<?php
    session_start();
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $em=$_POST["email"];
    $pw=$_POST['password'];
    $qry="select Conference_id from reviewer where Email='$em' and Password='$pw'";
    
    $cn=mysqli_query($connection,$qry);
    $cn=mysqli_fetch_array($cn);
    if($cn['Conference_id']==NULL)
    {
        header("location:wrongreviewerdetails.php");
        echo"ina";
    }
    echo $cn['Conference_id'];
    $cn=$cn['Conference_id'];
    $_SESSION['con']=$cn;
    header("location:reviewermain.php");
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
    