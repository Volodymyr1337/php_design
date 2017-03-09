﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php

	$name = $_POST["name"];
	$phone = $_POST["phone"];
	
	$REMOTE_ADDR = $_POST['REMOTE_ADDR'];


	if (!preg_match("~(?:^[а-яё]+[\-]?[а-яё]+$)|(\s)|(?:^[a-z]+[\-\`]?[a-z]+$)|(?:^[абвгґдеєжзиіїйклмнопрстуфхцчшщьюя]+[\-\`]?[абвгґдеєжзиіїйклмнопрстуфхцчшщьюя]+$)~iu", $name))
	{
		echo "<center><b>Некорректный ввод имени.<p>";
		echo "<a href=index.html>Вернуться и правильно заполнить форму.</a>";
		exit;
	}
	if (isset ($name))
	{
		$name = substr($name,0,20); //Не может быть более 20 символов
	if (empty($name))
	{
		echo "<center><b>Укажите пожалуйста Ваше имя.<p>";
		echo "<a href=index.html>Вернуться и правильно заполнить форму.</a>";
		exit;
	}
	}
	else
	{
		$name = "не указано";
	}
	if (!preg_match("/^(\+?\d+)?\s*(\(\d+\))?[\s-]*([\d-]*)$/", $phone))
	{
		echo "<center><b>Укажите номер телефона, по которому можно с Вами связаться.<p>";
		echo "<a href=index.html>Вернуться и правильно заполнить форму.</a>";
		exit;
	}
	if (isset ($phone))
	{
		$email = substr($phone,0,20); //Не может быть более 20 символов
	if (empty($phone))
	{
		echo "<center><b>Укажите номер телефона, по которому можно с Вами связаться.<p>";
		echo "<a href=index.html>Вернуться и правильно заполнить форму.</a>";
		exit;
	}
	}
	else
	{
		$phone = "не указано";
	}
	
	$i = "не указано";
	if ($name == $i AND $phone == $i)
	{
		echo "Произошла ошибка! Вы не заполнили поля заказа!";
		echo "<a href=index.html>Вернуться и правильно заполнить форму.</a>";
		exit;
	}

	$to = "qwerty@gmail.com";
	$subject = "Сообщение с сайта http://qwerty.com.ua/";
	$message = "Имя заказчика: $name .\nТелефон: $phone .\nIP-адрес: $_SERVER[REMOTE_ADDR]";
	mail ($to,$subject,$message,"Content-type:text/plain; charset = utf-8") or print "Не могу отправить письмо !";
	echo "<center><b>Спасибо за заказ.<br><br>В ближайшее время Вы обязательно получите ответ.<br><br>
	<a href=index.html>Вернуться на сайт.</a>";
	exit;
?> 

</body>
</html>