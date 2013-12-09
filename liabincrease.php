<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>table {table-position: center;
			color: white;}
			
	</style>		
</head>
<?php


 include_once "database.php";
 $stmt = $DBH->prepare("select school, oldliabilities, totalliabilities, oldliabilities/totalliabilities from colleges inner join finance on colleges.unitid=finance.unitid inner join oldliabilities on colleges.unitid = oldliabilities.unitid where totalliabilities > 0 order by oldliabilities/totalliabilities asc");  
 $total = ('oldliabilities/totalliabilities');
 $percent_friendly = number_format( $total * 100, 2 ) . '%';
 
  	try {$stmt->execute();
	}
	catch (PDOException $e) {
		echo "couldnt connect";
	}
	
	?><h4><center>  <a href="college.html">Click here to go back to the homepage.</a></h4></center> </p>
	<?php echo "<h2><center>American Colleges with greatest liability increase from 2010 to 2011 </center></h2><p>";
    echo "<center><table border =1>
    <tr>
    <th>School</th>
    <th>Total Liabilities, 2010</th>
    <th>Total Liabilities, 2011</th>
    <th>Increase Percentage in Liabilities</th>
    <th>Increase Percent</th>
    </tr>";
	while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo "<tr>";	
		echo "<td>"  .  $data['school'] . "</td>";
		echo "<td>"  .  $data['oldliabilities']  . "</td>";
		echo "<td>"  .  $data['totalliabilities']  . "</td>";
		echo "<td>"  .  $data [$total]  . "</td>";
		echo "<tr/>";
    }
    	echo "</table></center>";
   

 print_r ($data);
 ?>
</html>