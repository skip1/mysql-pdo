<html>
	<head>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	</head>
	<body>
		<h4> <a href="college.html"></a>Click here to go back to the homepage</h4>
	
<?php
/*    
$host = 'localhost';
$dbname = 'college';
$user = 'sk';
$pass = 'sk';

try {
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "connected";
} catch (PDOException $e) {

  echo $e->getMessage()
}
*/include_once "database.php";
  $stmt = $DBH->prepare("select school, address, city, state, totalenrollment from colleges inner join enrollment on colleges.unitid=enrollment.unitid where school like '%beth%' or school like '%bais%' or school like '%yeshiva%' order by totalenrollment");
  	try {$stmt->execute();
	}
	catch (PDOException $e) {
		echo errorHandle($e);
	}
	?><h4><center>  <a href="college.html">Click here to go back to the homepage.</a></h4></center> </p>
	<?php echo "<h2><center>Yeshiva enrollment </center></h2><p>";
    echo "<center><table border =1>
    <tr>
    <th>School</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Total enrollment</th>
    
    
    </tr>";
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";	
		echo "<td>"  .  $data['school'] . "</td>";
		echo "<td>"  .  $data['address'] . "</td>";
		echo "<td>"  .  $data['city'] . "</td>";
		echo "<td>"  .  $data['state'] . "</td>";
		echo "<td>"  .  $data['totalenrollment'] . "</td>";
		echo "<tr/>";
    }
    	echo "</table></center>";
   

 print_r ($data);
 ?> 
 </body>
 </html>