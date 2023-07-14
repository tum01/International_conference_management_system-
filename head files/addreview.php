<?php
    session_start();
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $em=$_POST["user_id"];
    $pw=$_POST["typ"];   
    $cn=$_SESSION['con'];
    $qry="select * from credentials where conference_id='$cn'";
    $ans=mysqli_query($connection,$qry);
    $flag=0;
    while($arr=mysqli_fetch_array($ans))
    {
        if($arr['User_id']==$em)
        {
            $flag=$flag+1;
            break;
        }
    }
    if($flag==0)
    {
        echo "User not present";
    }
    elseif($pw==1)
    {
        $qry="update credentials set review_status='under review' where '$em'=User_id and $cn=conference_id";
        mysqli_query($connection,$qry);
        header("location:reviewermain.php");
    }
    elseif($pw==2)
    {
        $qry="update credentials set review_status='accepted' where '$em'=User_id and $cn=conference_id";
        mysqli_query($connection,$qry);
        header("location:reviewermain.php");
    }
    elseif($pw==3)
    {
        $qry="update credentials set review_status='rejected' where '$em'=User_id and $cn=conference_id";
        mysqli_query($connection,$qry);
        header("location:reviewermain.php");
    }
    else
    {
        echo "invalid type";    
    }
    // $data1='anishj469@gmail.com';
    // $data2='am';
    // if($em==$data1 && $pw==$data2)
    // {
    //header('location:loginsuccessful.php');
    // }
    // else
    // {
    //     echo "error incorrect email or password";
    // }
    
?>