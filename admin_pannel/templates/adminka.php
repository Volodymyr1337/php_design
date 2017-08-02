<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>(o_o#)</title>

<!-- Подрубка графика уникальных посещений -->
<?php
$select_hosts = mysql_query("SELECT *, DATE_FORMAT(date, '%b %Y') AS date FROM host_visitors  ORDER BY id DESC LIMIT 12 ", $db) or die("cannot connect to the database");
$result = array(12);
$i=0;
while ($res = mysql_fetch_array($select_hosts))
{
	$result[$i] = array($res["host_count"], $res["date"]);	
$i++;
}
for($i; $i < 12; $i++)
{
	$result[$i] = array(0, "none");
}

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable(
		[
		  ['Месяц/год', 'Уникальные посещения'],
          [<?php echo "'".$result[11][1]."', ".$result[11][0]; ?>],
          [<?php echo "'".$result[10][1]."', ".$result[10][0]; ?>],
          [<?php echo "'".$result[9][1]."', ".$result[9][0]; ?>],
          [<?php echo "'".$result[8][1]."', ".$result[8][0]; ?>],
		  [<?php echo "'".$result[7][1]."', ".$result[7][0]; ?>],
          [<?php echo "'".$result[6][1]."', ".$result[6][0]; ?>],
		  [<?php echo "'".$result[5][1]."', ".$result[5][0]; ?>],
          [<?php echo "'".$result[4][1]."', ".$result[4][0]; ?>],
          [<?php echo "'".$result[3][1]."', ".$result[3][0]; ?>],
          [<?php echo "'".$result[2][1]."', ".$result[2][0]; ?>],
		  [<?php echo "'".$result[1][1]."', ".$result[1][0]; ?>],
          [<?php echo "'".$result[0][1]."', ".$result[0][0]; ?>]
        ]);

        var options = 
		{
          title: 'Количество уникальных посещений за последние 12 месяцев.',
          curveType: 'function',
		  
		  pointSize: 10,
          pointShape: { type: 'star', sides: 5, dent: 0.8 },
		  crosshair: { trigger: 'both' },
		  titleTextStyle: {
			color: '#1e0740',
			fontSize: '16',
			},
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
	  $(window).resize(function(){
	  	drawChart();
	});
</script>

</head>

<body>

<div class="container">

    <header class="col-md-10 col-sm-9 col-xs-12">
        <h1 align="center">админ панелька</h1>
    </header>
        <div class="col-md-2 col-sm-3 col-xs-12 exit">
        <a class="exit" href="logout.php">Выход</a>
        </div>
<!-- top left col -->
    <div class="col-md-6 col-sm-6 col-xs-12 col_bg" style="float:left">
    <h3 align="center">контакты</h3>
    <form action="secret" method="post" id="phone_settings">
        <select class="col-md-3 col-sm-4 col-xs-12" name="phone" id="phones">
            <option class="select" value="kyivstar_phone">Kyivstar</option>
            <option class="select" value="life_phone">Life</option>
            <option class="select" value="mts_phone">MTC</option>
        </select>
        <input class="col-md-9 col-sm-8 col-xs-12 inputs" name="phonetxt" type="text" placeholder="phone">
        <input class="col-sm-4 col-xs-12 button " type="submit" value="Изменить">
    </form>
     <script>
	 var form = document.getElementById('phone_settings');
	 form.onsubmit = function() {
		 if (form.phonetxt.value == '')
		 {
			if (!confirm('Вы уверенны что хотите удалить этот номер?'))
				return false;
		 }
	 }
     </script>
     
    <form action="secret" method="post" id="main_phone">
		<p class="col-xs-12">Телефон отображающийся на всех страницах</p>
        <input class="col-xs-12 inputs" name="main_phone" type="text" placeholder="">
        <input class="col-sm-4 col-xs-12 button " type="submit" value="Изменить">
    </form>     
    <p class="col-xs-12">График работы:</p>
    <form action="secret" method="post" id="day_settings">
        <select class="col-md-3 col-sm-4 col-xs-12" name="days" id="days">
            <option class="select" value="mon_fr">пн - пт</option>
            <option class="select" value="saturday">суббота</option>
            <option class="select" value="sunday">воскресенье</option>
        </select>
        <input class="col-md-9 col-sm-8 col-xs-12 inputs" name="daytxt" type="text" placeholder="">
        <input class="col-sm-4 col-xs-12 button " type="submit" value="Изменить">
    </form>
     <script>
	 var form2 = document.getElementById('day_settings');
	 form2.onsubmit = function() {
		 if (form2.daytxt.value == '')
		 {
			if (!confirm('Вы уверенны что хотите оставить пустую строку?'))
				return false;
		 }
	 }
     </script>
	</div>
<!-- mid right col -->   
    <div class="col-md-6 col-sm-6 col-xs-12 col_bg" style="float:right">
    <h3 align="center">Прейскурант</h3>
	<form id="price" action="secret" method="post">
        <p class="col-xs-12">Домашние усилители</p>
        <textarea class="form-control" rows="2" name="price_home_usilitel"></textarea>
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Изменить" />
        <p class="col-xs-12">Автомобильные усилители</p>
        <textarea class="form-control" rows="2" name="price_auto_usilitel"></textarea>
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Изменить" />
        <p class="col-xs-12">Автомагнитолы</p>
        <textarea class="form-control" rows="2" name="price_auto_magnitola"></textarea>
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Изменить" />
        <p class="col-xs-12">DJ оборудование</p>
        <textarea class="form-control" rows="2" name="price_dj_devices"></textarea>
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Изменить" />
        <p class="col-xs-12">Гитарные усилители</p>
        <textarea class="form-control" rows="2" name="price_guitar_amplifier"></textarea>
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Изменить" />
        <p class="col-xs-12">Аналоговые микшерные пульты</p>
        <textarea class="form-control" rows="2" name="price_analog_miksher"></textarea>
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Изменить" />
    </form>
    </div>
<!-- mid left col -->
    <div class="col-md-6 col-sm-6 col-xs-12 col_bg" style="float:left">
	<form action="secret" method="post">
        <p class="col-xs-12">Актуальность ремонта</p>
        <textarea class="form-control" rows="3" name="actual_rem"></textarea>
        <button class="col-sm-4 col-xs-12 button ">Изменить</button>
    </form>
    <form action="secret" method="post">
        <p class="col-xs-12">Наш сервис</p>
        <textarea class="form-control" rows="4" name="nash_servis"></textarea>
        <button class="col-sm-4 col-xs-12 button">Изменить</button>
    </form>
    </div>
    
<!-- left bot col -->  
    <div class="col-md-6 col-sm-6 col-xs-12 col_bg" style="">
    <form enctype="multipart/form-data" method="post" action="putimg">
        <p class="col-xs-12">Фоновое изображение на главной:</p><input type="file" name="home_img" />
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Загрузить" />
    </form>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 col_bg" style="">
    <form enctype="multipart/form-data" method="post" action="putimg">
        <p class="col-xs-12">Фоновое изображение на авто:</p><input type="file" name="auto_img" />
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Загрузить" />
    </form>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 col_bg" style="">
    <form enctype="multipart/form-data" method="post" action="putimg">
        <p class="col-xs-12">Фоновое изображение на профессиональном:</p><input type="file" name="prof_img" />
        <input class="col-sm-4 col-xs-12 button" type="submit" value="Загрузить" />
    </form>
    </div>	
	<div id="curve_chart" class ="col-md-12 col-sm-12 col-xs-12 counter" style="width: 100%; min-height: 300;"></div>
    <div class="col-md-12 col-sm-12 col-xs-12 counter" style="">
	<?php
	$date = date("Y-m");
	$select_hosts = mysql_query("SELECT * FROM host_visitors WHERE DATE_FORMAT(`date`, '%Y-%m') = '$date'", $db) or die("cannot connect to the database");
	$select_all = mysql_query("SELECT * FROM counter WHERE id = 1", $db) or die("cannot connect to the database");
	$res_hosts = mysql_fetch_assoc($select_hosts);
	$res_all = mysql_fetch_assoc($select_all);
	//printf("<p>Уникальных посетителей в этом месяце: <span class=\"count\">".$res_hosts["host_count"]."</span></p>");
	printf("<p>Уникальных посетителей за все время:  <span class=\"count\">".$res_all["hosts"]."</span></p>");
	printf("<p>Общее количество посещений:  <span class=\"count\">".$res_all["visits"]."</span></p>");
	?>
    </div>
</div><!-- end of container -->
</body>
</html>