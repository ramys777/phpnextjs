<?php
include("auth.php"); //include auth.php file on all secure pages 

?>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p><a href="dashboard.php">Dashboard</a></p>
<p><a href="search.php">Search</a></p>
<p><a href="prefrences.php">Preferences</a></p>
<a href="logout.php">Logout</a>
<br /><br /><br /><br />
</div>
<?php
	require('db.php');
	$id=$_SESSION["uid"];
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['unit'])){
		$unit = stripslashes($_REQUEST['unit']); // removes backslashes
		$unit = mysqli_real_escape_string($con,$unit); //escapes special characters in a string
        $query = "Update `users` SET units='$unit' where id='$id'";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You preferable unit measurment is saved successfully.</h3><br/>Click here to <a href='search.php'>check the weather</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="units" action="" method="post">
 <select name="unit">
     <?php
     require('db.php');
// If form submitted, insert values into the database.

	$id = $_SESSION['uid']; // removes backslashes
	
	
//Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE id='$id'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
    if($rows==1){
	while($row = mysqli_fetch_array($result))
	{
	   			$_SESSION['units'] = $row["units"];
                $units=$_SESSION['units'];
	}
    }
    echo '<option value="$units"selected>'.$units.'</option>';
     ?>
<option value="standard">standard</option>
<option value="metric" >metric</option>
<option value="Imperial">Imperial</option>
</select>
<input type="submit" name="submit" value="Save Unit" />
</form>
<br /><br />
</div>
<?php } ?>
</body>
</html>

       
    </body>
</html>