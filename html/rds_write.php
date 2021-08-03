<?php


// RDS configuration
  $rdsURL = "rm-3ns81h5d3h366xqbu89.mysql.rds.aliyuncs.com";
  $rdsDB = "rdsmysql";
  $rdsUser = "mysqluser";
  $rdsPwd = "Beluga2021!!";

// Connect to the RDS database
  $mysqli = new mysqli($rdsURL, $rdsUser, $rdsPwd, $rdsDB);

// Set mysql connection character set
  if (!$mysqli->set_charset('utf8')) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
  }

// Get User IP

  $HTTP_CLIENT_IP = $_SERVER['HTTP_CLIENT_IP'];

// Get User IP

  $HTTP_X_FORWARDED_FOR = $_SERVER['HTTP_X_FORWARDED_FOR'];

// Get User IP

  $HTTP_X_FORWARDED = $_SERVER['HTTP_X_FORWARDED'];

// Get User IP

  $HTTP_X_CLUSTER_CLIENT_IP = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];

// Get User IP

  $HTTP_FORWARDED_FOR = $_SERVER['HTTP_FORWARDED_FOR'];

// Get User IP

  $HTTP_FORWARDED = $_SERVER['HTTP_FORWARDED'];

// Get User IP

  $REMOTE_ADDR = $_SERVER['REMOTE_ADDR'];

// Get User IP

  $HTTP_VIA = $_SERVER['HTTP_VIA'];

// Get Random ID

  $randnum = substr(md5(rand()), 0, 8); 

// Pre-Query
$presql = "SELECT id, HTTP_X_FORWARDED_FOR, reg_date FROM `ip_log`";
$result = $mysqli->query($presql);

if ($result->num_rows > 0) {
	// output data of each row
	echo "<table>";
	echo "<tr><td><center> ID:</center>" . "</td><td><center> IP Address:</center>" . "</td><td><center> DATETIME:</center>" . "</td></tr>";
while($row = $result->fetch_assoc()) {
	$getIP = $row["HTTP_X_FORWARDED_FOR"];
	$maskedIP = preg_replace('/\d+$/', '***', $getIP);
    echo " <tr><td> " . $row["id"]. " </td><td> " . $maskedIP . " </td><td> " . $row["reg_date"]. "</td></tr>";
	}
} else {
  echo "0 results";
}
echo "</table>";

// Insert data into ec2_metadata tbale in RDS

if (!empty($HTTP_X_FORWARDED_FOR)){

  $sql = "INSERT INTO `ip_log` (HTTP_CLIENT_IP,HTTP_X_FORWARDED_FOR,HTTP_X_FORWARDED,HTTP_X_CLUSTER_CLIENT_IP,HTTP_FORWARDED_FOR,HTTP_FORWARDED,REMOTE_ADDR,HTTP_VIA,reg_date)
        VALUES ('$HTTP_CLIENT_IP','$HTTP_X_FORWARDED_FOR','$HTTP_X_FORWARDED','$HTTP_X_CLUSTER_CLIENT_IP','$HTTP_FORWARDED_FOR','$HTTP_FORWARDED','$REMOTE_ADDR','$HTTP_VIA', NOW())";
  if (!$mysqli->query( $sql))
    echo "<div>Error: " . $sql . "<br>" . $mysqli->error . "</div>";
}

 $mysqli->close();
?>
