<html>
<head>
	<link rel="stylesheet" type="text/css" href="default.css">
	<style>table {table-position: center;
			color: white;}
			
	</style>		
</head>
<?php


 include_once "database.php";
  
 $stmt = $DBH->prepare("SELECT school, address, state, totalassets
FROM colleges
INNER JOIN finance ON colleges.unitid = finance.unitid
ORDER BY totalassets DESC ");
  	try {$stmt->execute();
	}
	catch (PDOException $e) {
		echo "couldnt connect";
	}?>
	<h4><center>  <a href="college.html">Click here to go back to the homepage.</a></h4></center> </p>
<?php	echo "<h2><center>American Colleges with highest assets, 2011</center></h2><p>";
    echo "<center><table border =1>
    <tr>
    <th>School</th>
    <th>Address</th>
    <th>State</th>
    <th>Total Assets</th>
    </tr>";
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";	
		echo "<td>"  .  $data['school'] . "</td>";
		echo "<td>"  .  $data['address']  . "</td>";
		echo "<td>"  .  $data['state']  . "</td>";
		echo "<td>"  .  $data['totalassets']  . "</td>";
		echo "<tr/>";
    }
    	echo "</table></center>";
   

 
 ?>
</html>