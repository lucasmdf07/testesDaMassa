<html>
<head>
<title>Rate My Hotel | List of Hotels</title>
<link rel="stylesheet" href="css/css.css">
</head>

<body>
<!-- navbar -->
	<div class="navbar">
	<a class="active" id="home" href="index.php">HOME</a>
	</div>
	<div class="row"></div>
<!-- /navbar -->

	<div class="body">
    <br>

	<h2>List of Hotels to Rate</h2>
	<h4> Click on the Hotel Name for more Details</h4>
	
	<?php
	include 'db_access.php';
		
	foreach ($db->query("SELECT * FROM state") as $state_row) {
		echo $state_row["name"] . ", ";
		$stateId = $state_row["id"];
			
		foreach ($db->query("SELECT * FROM city WHERE state_id=$stateId") as $county_row) {
			echo $county_row["name"];
			echo "<ul>";
			$countyId = $county_row["id"];
				
			foreach ($db->query("SELECT * FROM hotel WHERE city_id=$countyId") as $site_row) {
				$siteId = $site_row["id"];
				echo "<li><a href='details.php?siteId=$siteId'>" . $site_row["name"] . "</a></li>";
			}
				
			


			$stmt = $db->prepare("SELECT url FROM picture WHERE hotel_id=:siteId");
			$stmt->bindValue(':siteId', $siteId, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->bindColumn(1, $url);
			
			while ($stmt->fetch()) {
				echo "<li class='images'><img src='" . $url . "'></li>";
			}
	
			echo "</ul>";
			
			}
	}
	?>
</div>

</body>
</html>