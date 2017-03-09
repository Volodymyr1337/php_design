<?

require("config.php");

	$text = $_POST['input_text'];
	
	$result = query("INSERT INTO chat (text) VALUES(?)", $text);

?>