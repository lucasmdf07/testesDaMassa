<html>
<head>
<title>Rate My Hotel | List of Hotels</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="back">
	<?php include 'navbar.php'; ?>

	<h2>Browse</h2>
	
	<?php
	include 'db_access.php';
		

			
		foreach ($db->query("SELECT * FROM city WHERE state_id=$stateId") as $county_row) {
			echo $county_row["name"];
			echo ", ";
			echo "<ul>";

			foreach ($db->query("SELECT * FROM state") as $state_row) {
				echo $state_row["name"];
				$stateId = $state_row["id"];

		
			$countyId = $county_row["id"];
				
			foreach ($db->query("SELECT * FROM hotel WHERE city_id=$countyId") as $site_row) {
				$siteId = $site_row["id"];
				echo "<li><a href='site.php?siteId=$siteId'>" . $site_row["name"] . "</a></li>";
			}
				
			echo "</ul>";
		}
	}
	?>
</div>

</body>
</html>