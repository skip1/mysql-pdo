<html>
<head>
	<link rel="stylesheet" type="text/css" href="default.css">
	<style>table {table-position: center;
			color: white;}
			
	</style>		
</head>
<?php


 include_once "database.php";
 $stmt = $DBH->prepare("select school, totalenrollment, totalliabilities, totalliabilities/totalenrollment from colleges inner join enrollment on colleges.unitid=enrollment.unitid inner join finance on colleges.unitid=finance.unitid where (totalliabilities/totalenrollment)> 0 order by (totalliabilities/ totalenrollment) desc");  
 $total = ('totalenrollment/totalliabilities');
  	try {$stmt->execute();
	}
	catch (PDOException $e) {
		echo "couldnt connect";
	}
	$quotient=('totalliabilities/totalenrollment');
	?><h4><center>  <a href="college.html">Click here to go back to the homepage.</a></h4></center> </p>
	<?php echo "<h2><center>American Colleges with highest liability per student, 2011</center></h2><p>";
    echo "<center><table border =1>
    <tr>
    <th>School</th>
    <th>Total Enrollment</th>
    <th>Total Liabilities</th>
    <th>Total Liabilities per Student</th>
    </tr>";
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";	
		echo "<td>"  .  $data['school'] . "</td>";
		echo "<td>"  .  $data['totalenrollment']  . "</td>";
		echo "<td>"  .  $data['totalliabilities']  . "</td>";
		echo "<td>"  .  $data[$quotient]  . "</td>";
		echo "<tr/>";
    }
    	echo "</table></center>";
   

 print_r ($data);
 ?>
</html>