<!DOCTYPE html>
<html>
<head>
	<title>Login Pasien</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/d.svg">
		</div>
		
		
		<div class="login-content">
			<form method="POST" action="login_pasien.php">
				<img src="img/p.svg">
				<h1 style="font-size:30px;">Welcome to Puskesmas</h1>
				<br>
				<br>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5 style="font-size:15px;">No Rekmed</h5>
						<input type="text" class="input" name="username" required autofocus>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5 style="font-size:15px;">Password</h5>
						<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
				<a href="index.php">Bukan pasien?</a>
				<br>
            	<button type="submit" class="btn" style="font-size:16px;">Login</button>
            </form>
        </div>
		
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>