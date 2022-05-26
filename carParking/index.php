<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Car Parking System</title>
	  <meta charset="utf-8">
	  <meta http-equiv="refresh" content="5"> 
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="bootstrap.min.css">
	  <script src="jquery.min.js"></script>
	  <script src="bootstrap.min.js"></script>
	</head>

	<body>
		<style>
			body
			{
				background-color:#001827;	
			}
			#active
			{
				background:#4db8ff;
				padding:2px;
				color:#ffffff;
				text-decoration:none;
			}
			#deactive
			{
				background:#ffffff;
				padding:2px;	
				color:#ffffff;
				text-decoration:none;
			}
			.table
			{
				text-align: center;
				width: 100% !important;
			}
			.table th
			{
				text-align: center;
			}
			.green 
			{
				background:#00ff00;
				font-weight: bolder;
				color:#ffffff;
			}
			.red 
			{
				background:#ff0000;
				font-weight: bolder;
				color:#ffffff;
			}
		</style>

		<div class="container">
			<?php
				$mysqli = new mysqli("localhost","remote","123456789","carparking");
				if ($mysqli -> connect_errno) {
				  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
				  exit ();
				}
				#error_reporting(0);
				#mysql_connect("localhost", "remote", "123456789") or die(mysql_error());
				#mysql_select_db("waterquality") or die(mysql_error());
				
				echo"<H2 class='text-center' style='color:#fff;'>Car Parking System</H2></br>";
				echo "<table class='table col-sm-12' >";
				
				#$result = mysql_query("SELECT * FROM status ORDER BY `id` DESC") 
				#or die(mysql_error());  
				
				$sql = "SELECT * FROM status ORDER BY `id` DESC";
				$result = $mysqli -> query($sql);
				$row = $result -> fetch_array ();
				$mysqli -> close ();
				
				$slot1 = $row['slot1'] == "Empty"?"green":"red";
				$slot2 = $row['slot2'] == "Empty"?"green":"red";
				$slot3 = $row['slot3'] == "Empty"?"green":"red";
				
				echo "<tr style='color:#fff;'><th>Slot 1</th><th>Slot 2</th><th>Slot 3</th></tr>";
				echo "<tr style='color:#fff;'><td class = '".$slot1."'>$row[slot1]</td><td class = '".$slot2."'>$row[slot2]</td><td class = '".$slot3."'>$row[slot3]</td></tr>";
				echo "</table>";
				
				#$mysqli -> close ();
			?>
		</div>
	</body>
</html>
