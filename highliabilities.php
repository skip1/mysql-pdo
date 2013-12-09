<html>
<head>
	<link rel="stylesheet" type="text/css" href="default.css">
	<style>table {table-position: center;
			color: white;}
			
	</style>		
</head>
<?php

/*include_once "database.php";
  $stmt = $DBH->prepare("select school, address, state, zip, totalliabilities from colleges inner join enrollment on colleges.unitid=enrollment.unitid order by totalliabilities desc");
  	try {$stmt->execute();
	}
	catch (PDOException $e) {
	
	}
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		print_r ($row);
	    echo "<table>";
		foreach ($rows as $row) {
			echo "<tr>";
			foreach ($row as $column) {	
		        echo "<td>$column</td>;";
			}
			echo "</tr>";
			
		}
	echo "</table>";
	}
 */include_once "database.php";
  $stmt = $DBH->prepare("SELECT school, totalliabilities
FROM colleges
INNER JOIN finance ON colleges.unitid = finance.unitid
ORDER BY totalliabilities DESC ");
  	try {$stmt->execute();
	}
	catch (PDOException $e) {
		echo "couldnt connect";
	} ?> 
  <h4><center>  <a href="college.html">Click here to go back to the homepage.</a></h4></center> </p>
<?php	echo "<h2><center>American Colleges with highest liabilities, 2011</center></h2><p>";
    echo "<center><table border =1>
    <tr>
    <th>School</th>
    <th>Total Liabilities</th>
    </tr>";
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";	
		echo "<td>"  .  $data['school'] . "</td>";
		echo "<td>"  .  $data['totalliabilities']  . "</td>";
		echo "<tr/>";
    }
    	echo "</table></center>";
   

 
 ?>
</html>