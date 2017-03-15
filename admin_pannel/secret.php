<link type="text/css" rel="stylesheet" href="css/adminka.css" />
<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
<?
	require("config.php");
	
	$db = mysql_connect(SERVER, USERNAME, PASSWORD);
	mysql_select_db(DATABASE, $db);
	/*чтобы корректно отображался русский контент
	 в базе даных нужно дописать
	 mysql_set_charset("utf8");
	 */
	
	
	$login = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
	foreach ($login as $mon)
	{
		$usr = $mon["username"];
	}
	if (strlen($usr) < 4)
	{
		redirect("login.php");
	}
	else
	{
		require("templates/adminka.php");
		
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (!empty($_POST['days']))
			{
				$day = $_POST['days'];
				$string = $_POST['daytxt'];
				$result = mysql_query("UPDATE content SET content = '$string', date = NOW() WHERE content_name = '$day'", $db);
				if (!$result)
						echo "failed!";
			}
			else if (!empty($_POST['phone']))
			{
				$phone = $_POST['phone'];
				$string = $_POST['phonetxt'];
				$result = mysql_query("UPDATE content SET content = '$string', date = NOW() WHERE content_name = '$phone'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['nash_servis']))
			{
				$text = $_POST['nash_servis'];
				$cont_name = "nash_servis";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
					if (!$result)
						echo "failed!";
			}
			else if (!empty($_POST['actual_rem']))
			{
				$text = $_POST['actual_rem'];
				$cont_name = "actual_rem";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['price_home_usilitel']))
			{
				$text = $_POST['price_home_usilitel'];
				$cont_name = "price_home_usilitel";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['price_auto_usilitel']))
			{
				$text = $_POST['price_auto_usilitel'];
				$cont_name = "price_auto_usilitel";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['price_auto_magnitola']))
			{
				$text = $_POST['price_auto_magnitola'];
				$cont_name = "price_auto_magnitola";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['price_dj_devices']))
			{
				$text = $_POST['price_dj_devices'];
				$cont_name = "price_dj_devices";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['price_guitar_amplifier']))
			{
				$text = $_POST['price_guitar_amplifier'];
				$cont_name = "price_guitar_amplifier";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['price_analog_miksher']))
			{
				$text = $_POST['price_analog_miksher'];
				$cont_name = "price_analog_miksher";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			else if (!empty($_POST['main_phone']))
			{
				$text = $_POST['main_phone'];
				$cont_name = "main_phone";
				$result = mysql_query("UPDATE content SET content = '$text', date = NOW() WHERE content_name = '$cont_name'", $db);
				if (!$result)
					echo "failed!";
			}
			
		}
		
	}
?>

