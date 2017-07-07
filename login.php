<?php
require_once 'connect.php';
require_once 'hanshu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.main{
			width: 100%;
			height: 600px;
			background:url("login.jpg") center center no-repeat;
		}
		form{
			width: 300px;
			position: relative;
			top: 45%;
			left: 50%;
			text-align: center;

		}
		input:-webkit-autofill { 
			-webkit-box-shadow: 0 0 0px 1000px #fff inset; 
		}
		p{
			margin-left: -20px;
		}
		label{
			display: inline-block;
			width: 60px;
			text-align: right;
			padding-right:10px;
		}
		input{
			border-radius: 5px;
			height: 20px;
			width: 180px;
			background-color: #fff;
			border: none;
		}
		.botton{
			width: 60px;
			
		}
	</style>
</head>
<body>
<div class="main">
		<form  action="doLogin.php" method="post" >
			<p>
				<label for="username">用户名</label>
				<input type="text"  name="username"  >
			</p>
			<p>
				<label for="password">密码</label>
				<input type="password" name="password" >
			</p>	
			<input type="submit" class="botton" value="登陆" >
		</form>
	</div>

</body>
</html>
