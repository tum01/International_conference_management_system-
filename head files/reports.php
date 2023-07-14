<?php
    $name=$_POST['first_name'];
    $connection=mysqli_connect('localhost','root');
    mysqli_select_db($connection,'authentication');
    $qry="select * from reports";
    $ans=mysqli_query($connection,$qry);
    while($row=mysqli_fetch_array($ans))
    {
        
        // <a href="$row['Pdf']">Report</a>
        if($row['Name']==$name)  
        {
            echo $row['Name']; 
            echo "<br>"; 
            $url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
            $string= preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $row['Pdf']);
            echo $string;
            echo "<br>";
            //header('Location: '.$row['Pdf']);
        }
        // echo (,"Report");
        // https://stackoverflow.com/questions/1960461/convert-plain-text-urls-into-html-hyperlinks-in-php
       
    }   
    //echo "data not present";   
?>  
