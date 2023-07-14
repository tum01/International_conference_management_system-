<?php
    session_start();
    //include 'loginForm.php';
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $link=$_POST['pdf_link'];
    $em=$_SESSION['email'];
    $pw=$_SESSION['password'];
    $qry="update credentials set review_status='submitted' where Email='$em' and Passwd='$pw'";
    mysqli_query($connection,$qry);
    $qry="select conference_id from credentials where Email='$em' and Passwd='$pw'";
    $con=mysqli_query($connection,$qry);
    $con=mysqli_fetch_array($con);
    $con=$con['conference_id'];
    
    $qry="select deadline from conference where id='$con'";
    $dead=mysqli_query($connection,$qry);
    $dead=mysqli_fetch_array($dead);
    $dead=$dead['deadline'];

    $date=date('20y-m-d');
    
    //echo $date." ";
    //echo $date." ".$dead." ";
    if($date<=$dead)
    {
        $qry="update credentials set report='$link',submission_status='$date' where '$em'=Email and '$pw'=Passwd";
        //echo $_SESSION['email'];
        mysqli_query($connection,$qry);
        echo "Submitted";
    }
    else
    echo "deadline passed"; 
    //header("location:submitted.php");
?>