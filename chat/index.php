<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>(o_o#)</title>


<script type="text/javascript">
//function sending message if Enter-key pressed
function input() {
			var text = $("textarea").val();
			if (text == '\n')
			{
				alert("Clean area!");
				$("textarea").val("");
			}
			else
			{	
				$.ajax({
					type: "POST",
					url: "action.php",
					data: {
						input_text: text
						},
					success: function() {
						$("textarea").val("");
						$("#otparea").scrollTop(1000000);
					}
					
					});
			}

}
				
$(document).ready(function() {
	
		//init send-button
		var button = $("button");
		
		//if Enter-key pressed...
		$("textarea").keyup(function(event) {
			if(event.keyCode==13)
			{
				input();
			}
	});
		//if Button-key pressed...
		button.click(function() {
			var text = $("textarea").val();
			if (text == "")
				alert("Clean area!");
			else
			{	
				$.ajax({
					type: "POST",
					url: "action.php",
					data: {
						input_text: text
						},
					success: function() {
						$("textarea").val("");
						$("#otparea").scrollTop(1000000); //auto scroll to last msg
					}
					});
			}
			});
			//update window every 5ms and scroll window to last msg
			window.setInterval(function() {
			$("#otparea").load("secret.php ul");
			$("#otparea").scrollTop(1000000);
			}, 500);
			

    });
</script>

</head>

<body>

<h1>chat_room</h1>

<div id="wrapper">
    <div id="chat_box">
    	<div id="otparea">
            <ul>
                <?
				$result = mysql_query("SELECT id, text, DATE_FORMAT(date,'%d %b %H:%i') AS date FROM chat ORDER BY id", $db);

				if (mysql_num_rows($result) > 0)
				{
					$arr = mysql_fetch_assoc($result);
					do
					{
						printf('<li id="%s"><span class="date">%s</span><br /><span class="text">%s</span></li>', $arr['id'], $arr['date'], $arr['text']);
					}
					while ($arr = mysql_fetch_assoc($result));
				}
				else
					echo "err";
				
                ?>                            
            </ul>
		</div>
        <div id="textarea">
            <textarea></textarea>
        	<button>send</button>
        </div>
    </div>
</div>

<a href="logout.php">Log Out</a>

</body>
</html>