<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SECRET ROOM</title>
</head>

<body>
<h3>Регистрация на данный момент недоступна!</h3>
<h3><a href='login.php'>на главную</a></h3>
<!--
<form id = "registration" action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            Username: <input autofocus="" class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            Password: <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
	<div class="form-group">
            Confirm pass: <input class="form-control" name="confirm" placeholder="Password" type="password"/>
        </div>
	<div class="form-group">
            Code: <input class="form-control" name="code" placeholder="Code" type="password"/>
        </div>
        
	<div class="form-group">
            E-mail: <input class="form-control" name="email" placeholder="e-mail" type="text"/>
        </div>
        
        <img src = "captcha.php" />
        <div class="form-group">
        <input class="form-control" type="text" name="kapcha" />
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
        </div>
    </fieldset>
</form>
<div id="link">
    <p>or <a href="login.php">Log In</a></p>
</div>

<script>
	var form = document.getElementById('registration');
	var secret = '123qwe';
	
function isEmail() {
	var str = form.email.value;
    var re = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
    if (re.test(str))
		return true;
    else
		return false;
		
    if(isEmpty(str))
		return false;
   }
	
	form.onsubmit = function() {
	if (form.username.value == '')
	{
	    alert('clear username');
	    return false;
	}
	else if (form.username.value.length < 4 || form.username.value.length > 20)
	{
	    alert('имя должно быть в пределах от 4 до 20 символов');
	    return false;
	}
	else if (form.password.value == '')
	{
	    alert('clear password');
	    return false;
	}
		else if (form.password.value.length < 4 || form.password.value.length > 20)
	{
	    alert('пароль должен быть в пределах от 4 до 20 символов');
	    return false;
	}
	else if (form.confirm.value != form.password.value)
	{
	    alert('password do not match!');
	    return false;
	}
	else if (form.code.value != secret)
	{
	    alert('incorrect code, bitch ass!');
	    return false;
	}
	else if (!isEmail())
	{
	    alert('incorrect email, bitch ass!');
	    return false;
	}
	};
</script>
-->
</body>
</html>