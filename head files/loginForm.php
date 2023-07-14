<h1> Login Successful! </h1>
<?php
    session_start();
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $em=$_POST["email"];
    $pw=$_POST['password'];
    $_SESSION['email']=$em;
    $_SESSION['password']=$pw;
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
    $data="select * from credentials";
    $ans=mysqli_query($connection,$data);
    $flag=0;
    while($row=mysqli_fetch_array($ans))
    {
        if($em==$row['Email'] && $pw==$row['Passwd'])
        {
           //echo "Login successful";
            echo "<br>";
            $qry="select conference_id from credentials where '$em'=Email and '$pw'=Passwd";
            $con=mysqli_query($connection,$qry);
            $con=mysqli_fetch_array($con);
            $con=$con['conference_id'];
            //echo $con;
            $qry1="select * from conference where id='$con'";
            $aj=mysqli_query($connection,$qry1);
            while($cd=mysqli_fetch_array($aj))
            {
                echo $cd['id']."    ".$cd['topic']."     ".$cd['deadline']."     ";
            }
            // echo "<br>";
            $qry2="select review_status,report from credentials where '$em'=Email and '$pw'=Passwd";
            $cn=mysqli_query($connection,$qry2);
            while($cb=mysqli_fetch_array($cn))
            {
                if($cb['report']==NULL)
                {
                    echo "NULL ";
                }
                else
                {
                    $url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
                    $string= preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $cb['report']);
                    echo $string;
                    echo "      ";
                    //header('Location: '.$row['Pdf']);
                    // echo (,"Report");
                    // https://stackoverflow.com/questions/1960461/convert-plain-text-urls-into-html-hyperlinks-in-php
                }
                if($cb['review_status']==NULL)
                {
                    echo "NULL ";
                }
                else
                {
                    echo $cb['review_status']."     ";
                }
            }
            $flag=$flag+1;
        }

    }
    if($flag==0)
    {
        header("location:userloginunsucc.php");
    }
?>

<form action="pdf.php" method="post">
		<!-- <h2>Login</h2> --> 
		<hr>
        <div class="form-group">
        	<input type="text" class="form-control" name="pdf_link" placeholder="New submission" required="required">
        </div>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

<a href="pdf.php" title=""> </a>