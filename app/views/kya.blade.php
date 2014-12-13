<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	<div class="welcome">
		<h1>Kyaa</h1>
	</div>
	<?php echo Form::open(array('url' => '/login', 'class' => 'box login')); ?>
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" tabindex="1" name="username" required>
	  <label>
	  <a href="#" class="rLink" tabindex="5">Forget your password?</a>Password
	  </label>
	  <input type="password" name="password" tabindex="2" required>
	</fieldset>
	<footer>
	  <label><input type="checkbox" name="persist" tabindex="3">Remember me</label>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
	</form>
</body>
</html>
