<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
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

</body>
</html>
<?php
$city=$_GET[city];
function WeatherUrl($url){
		$cn = curl_init();
		curl_setopt($cn, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($cn, CURLOPT_URL, $url);    // get the contents using url
		$weatherdata = curl_exec($cn); // execute the curl request
		curl_close($cn); //close the cURL
		return $weatherdata;
}

$url="http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=d62ca415a6b61d8927e6d87b8c420c9f";
$response=WeatherUrl($url);




$data = json_decode($response);

	
$temp = $data->main->temp . '℃';
$minimum_temp = $data->main->temp_min . '℃';
$maximum_temp = $data->main->temp_max . '℃';
$feels_like = $data->main->feels_like . '℃';
$pressure = $data->main->pressure . '℃';
$humidity = $data->main->humidity . '℃';
echo '<div class="form">';
echo 'Temperature : '. $temp.'<br/>';
echo 'Minimum Temperature : '. $minimum_temp.'<br/>';
echo 'Maximum Temperature : '. $maximum_temp.'<br/>';
echo 'Feels Like : '. $feels_like.'<br/>';
echo 'Pressure : '. $pressure.'<br/>';
echo 'Humidity : '. $humidity.'<br/>';
echo '</div>';
			 
						 
?>