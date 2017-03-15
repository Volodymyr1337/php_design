<?php
	require("config.php");

	$db = mysql_connect(SERVER, USERNAME, PASSWORD);
	mysql_select_db(DATABASE, $db);
	// Проверяем пришел ли файл
	if( !empty( $_FILES['home_img']['name'] ) ) 
	{
		// Проверяем, что при загрузке не произошло ошибок
		if ( $_FILES['home_img']['error'] == 0 ) 
		{
			// Если файл загружен успешно, то проверяем - графический ли он
			if( substr($_FILES['home_img']['type'], 0, 5)== 'image' ) 
			{
				// Читаем содержимое файла
				$image = file_get_contents( $_FILES['home_img']['tmp_name'] );
				// Экранируем специальные символы в содержимом файла
				$image = mysql_escape_string( $image );
				// Формируем запрос на добавление файла в базу данных
				$cont_name = "home_bg_img";
				$result = mysql_query("UPDATE images SET content = '$image' WHERE img_name = '$cont_name'", $db);
			}
		}
	}
	else if( !empty( $_FILES['auto_img']['name'] ) ) 
	{
		// Проверяем, что при загрузке не произошло ошибок
		if ( $_FILES['auto_img']['error'] == 0 ) 
		{
			// Если файл загружен успешно, то проверяем - графический ли он
			if( substr($_FILES['auto_img']['type'], 0, 5)== 'image' ) 
			{
				// Читаем содержимое файла
				$image = file_get_contents( $_FILES['auto_img']['tmp_name'] );
				// Экранируем специальные символы в содержимом файла
				$image = mysql_escape_string( $image );
				// Формируем запрос на добавление файла в базу данных
				$cont_name = "auto_bg_img";
				$result = mysql_query("UPDATE images SET content = '$image' WHERE img_name = '$cont_name'", $db);
			}
		}
	}
	else if( !empty( $_FILES['prof_img']['name'] ) ) 
	{
		// Проверяем, что при загрузке не произошло ошибок
		if ( $_FILES['auto_img']['error'] == 0 ) 
		{
			// Если файл загружен успешно, то проверяем - графический ли он
			if( substr($_FILES['prof_img']['type'], 0, 5)== 'image' ) 
			{
				// Читаем содержимое файла
				$image = file_get_contents( $_FILES['prof_img']['tmp_name'] );
				// Экранируем специальные символы в содержимом файла
				$image = mysql_escape_string( $image );
				// Формируем запрос на добавление файла в базу данных
				$cont_name = "prof_bg_img";
				$result = mysql_query("UPDATE images SET content = '$image' WHERE img_name = '$cont_name'", $db);
			}
		}
	}
	redirect("secret.php");
?>