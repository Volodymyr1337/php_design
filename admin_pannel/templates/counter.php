<?php

$db = mysql_connect("localhost", "...", "...");
mysql_select_db("soundlab", $db);

	
setcookie("count", "$count", time() + 2592000);
$count = $_COOKIE['count'];

if (!isset($count))
	$count = 0;
else
	$count++;

setcookie("count", "$count", time() + 2592000);



if($count == 1)
{
	$result = mysql_query("UPDATE counter SET visits = visits + 1, hosts = hosts + 1 WHERE id = 1", $db);
	
	// checking table with current data in the database
	$date = date("Y-m");
	$check = mysql_query("SELECT * FROM host_visitors WHERE DATE_FORMAT(`date`, '%Y-%m') = '$date'", $db) or die("cannot connect to the database");	
	// creating table with new month
	if (mysql_num_rows($check) === 0)
	{
		$date0 = date("Y-m-d");
		$new_month = mysql_query("INSERT INTO host_visitors SET host_count = 1, `date` = '$date0'", $db);
	}
	else
	{
		$add_hosts = mysql_query("UPDATE host_visitors SET host_count = host_count + 1 WHERE DATE_FORMAT(`date`, '%Y-%m') = '$date'", $db);
	}
}
else
{
	$result = mysql_query("UPDATE counter SET visits = visits + 1 WHERE id = 1", $db);
}

?>