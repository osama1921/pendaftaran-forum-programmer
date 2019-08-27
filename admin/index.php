<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="navbar">
	<div class="logo">
	<p><a href="#">Asosiasi Programmer</a></p>
	</div>
	<div class="btn">
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>
<div class="header" style="height: 100vh;">
		<div class="content">
			<h1>Login</h1>
			<div class="border"></div>
			<form class="content-form" action="proses_login.php" method="POST">
				<input type="text" name="nik" class="content-form-text" placeholder="NIK">
				<input type="password" name="password" class="content-form-text" placeholder="Password">
				<input type="submit" name="login" class="content-form-submit" value="Login">

			</form>
		</div>
</div>


<script type="text/javascript">
	$(".btn").on("click",function(){
		$('.menu').toggleClass("show");
	});
</script>
</body>
</html>