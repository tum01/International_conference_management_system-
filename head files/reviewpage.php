<?php
    session_start();
    $cn=$_SESSION['con'];
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection, 'authentication');
    $qry="select Fname,Lname,report,review_status from credentials where conference_id='$cn'";
    $arr=mysqli_query($connection,$qry);
     while($row=mysqli_fetch_array($arr))
    {
        echo $row['Fname']." ".$row['Lname']." ".$row['report']." ".$row['review_status']." ";
        echo "<br>"; 
    }
?>