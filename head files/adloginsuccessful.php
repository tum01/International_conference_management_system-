<h1> admin login successful </h1>
<h2> Running conference </h2>
<?php
	$connection=mysqli_connect('localhost','root');
	mysqli_select_db($connection,'authentication');
    $qry="select * from conference";
    $ans=mysqli_query($connection,$qry);
    while($row=mysqli_fetch_array($ans))
    {
        echo $row['id']." ".$row['topic']." ".$row['deadline'];
		echo "<br>";
    }
?>
<h2> New conference </h2>
<form action="conference.php" method="post">
		<!-- <h2>Login</h2> -->
		<p>Add new!</p>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
<h2> Go to conference </h2>
<form action="currentconference.php" method="get">
		<!-- <h2>Login</h2> -->
		<p>Please enter Conference id</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="int" class="form-control" name="id" placeholder="Id" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>  
    </form>
    <h2> Delete conference </h2>
<form action="deleteconference.php" method="post">
		<!-- <h2>Login</h2> -->
		<p>Please enter Conference id</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="int" class="form-control" name="cid" placeholder="Id" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">    
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>  
    </form>