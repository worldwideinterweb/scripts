<?php
mysql_connect('10.1.1.35','joomla_user','CHu=ukaW?a_w');
mysql_select_db('joomla_db');

$sqltz = "SET time_zone = '+00:00';";
mysql_query($sqltz);

$sql = "
SELECT modified,publish_up,publish_down,date_sub(now(),interval 1 MINUTE) as timenow 
FROM jom17_k2_items
WHERE modified > date_sub(now(),interval 30 MINUTE) 
#OR publish_up > date_sub(now(),interval 1 MINUTE) 
#OR publish_down > date_sub(now(),interval 1 MINUTE) 
LIMIT 1";

$results = mysql_query($sql);

while ($data = mysql_fetch_object($results)) {
	$ch = curl_init("http://www.worldwideinterweb.com/flush/");
	curl_exec($ch);
	curl_close($ch);
	echo "
clearing cache on: {$data->timenow } for one of the following\n
modified date of: {$data->modified}\n
publish_up date of {$data->publish_up}\n
publish_down date of {$data->publish_down}\n";
}
?>
