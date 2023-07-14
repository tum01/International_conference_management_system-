<?php
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $cn=$_POST['cid'];
    $qry="delete from credentials where conference_id='$cn'";
    $ans=mysqli_query($connection,$qry);
    $qry="delete from conference where id='$cn'";
    mysqli_query($connection,$qry);
    header('location:adloginsuccessful.php');   
?>