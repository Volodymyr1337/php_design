<?php
	require("config.php");

	$db = mysql_connect(SERVER, USERNAME, PASSWORD);
	mysql_select_db(DATABASE, $db);
	
	if ( isset( $_GET['id'] ) ) {
	// Здесь $id номер изображения
	$id = (int)$_GET['id'];
	if ( $id > 0 )
	{
    // Выполняем запрос и получаем файл
	$res = mysql_query("SELECT content FROM images WHERE id = '$id'", $db);
	if ( mysql_num_rows( $res ) == 1 ) 
	{
		$image = mysql_fetch_array($res);
		// Отсылаем браузеру заголовок, сообщающий о том, что сейчас будет передаваться файл изображения
		header("Content-type: image/*");
		
		// И  передаем сам файл
		echo $image['content'];
    }
  }
}
?>