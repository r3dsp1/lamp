<?php
echo '<link href="css/styles.css" rel="stylesheet" type="text/css" />';
echo "<center><h3><br />Hellow World! I am Apache2 with PHP and CSS </h3></center><br />";
echo"<br />";

#$string = substr(rand(), 0, 8);
#echo hash('sha1',$string);


echo "<br />";
echo "<br />";

echo "This is your HTTP_CLIENT_IP IP Address - ".$_SERVER['HTTP_CLIENT_IP'];
echo "<br />";
echo "<br />";
echo "This is your HTTP_X_FORWARDED_FOR IP Address - ".$_SERVER['HTTP_X_FORWARDED_FOR'];
echo "<br />";
echo "<br />";
echo "This is your HTTP_X_FORWARDED IP Address - ".$_SERVER['HTTP_X_FORWARDED'];
echo "<br />";
echo "<br />";
echo "This is your HTTP_X_CLUSTER_CLIENT_IP IP Address - ".$_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
echo "<br />";
echo "<br />";
echo "This is your HTTP_FORWARDED_FOR IP Address - ".$_SERVER['HTTP_FORWARDED_FOR'];
echo "<br />";
echo "<br />";
echo "This is your HTTP_FORWARDED IP Address - ".$_SERVER['HTTP_FORWARDED'];
echo "<br />";
echo "<br />";
echo "This is your REMOTE_ADDR IP Address - ".$_SERVER['REMOTE_ADDR'];
echo "<br />";
echo "<br />";
echo "This is your HTTP_VIA IP Address - ".$_SERVER['HTTP_VIA'];
echo "<br />";
echo "<br />";
echo "<center>";
echo "<br /><b>Your IP Address has be logged into our database!<br />";
echo "<br />";
echo "*****************************";
echo "<br />";
echo "IP Address history for this site:</b> <br /><br />";
// Get User IP

#$client_IP = $_SERVER['HTTP_X_FORWARDED_FOR'];

// Get Random ID

#$randnum = substr(md5(rand()), 0, 8);

#echo $client_IP;
#echo $randnum;

include("rds_write.php");
echo "</center>";
#phpinfo();

?>
