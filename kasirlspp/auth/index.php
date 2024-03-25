<?php
session_start();

if (isset($_SESSION['level'])) {
	if ($_SESSION['level'] != "") {
		header("location:../dashboard");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->

</head>

<body>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #fff;
			}

			.limiter {
				display: flex;
				justify-content: center;
				align-items: center;
				min-height: 100vh;
			}

			.container-login100 {
				justify-content: center;
				display: flex;
				width: 35%;
				padding: 50px;
				background-color: #000;
				border-radius: 10px;
				box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
				overflow: hidden;
			}

			.wrap-login100 {
				width: 100%;
				max-width: 380px;
				text-align: center;
			}

			.login100-form-title {
				font-size: 24px;
				color: #fff;
				margin-bottom: 30px;
				display: block;
			}

			.wrap-input100 {
				position: relative;
				margin-bottom: 30px;
			}

			.input100 {
				width: 85%;
				padding: 15px;
				border: 1px solid #ccc;
				border-radius: 5px;
				outline: none;
				color: #000;
				/* Set text color to black */
			}

			.focus-input100::before {
				content: attr(data-placeholder);
				position: absolute;
				left: 15px;
				top: 50%;
				transform: translateY(-50%);
				color: #999;
				transition: 0.3s ease-out;
				z-index: -1;
			}

			.input100:focus+.focus-input100::before {
				top: 5px;
				font-size: 12px;
				color: #333;
			}

			.btn-show-pass {
				position: absolute;
				right: 15px;
				top: 40%;
				transform: translateY(-50%);
				cursor: pointer;
			}

			.container-login100-form-btn {
				margin-top: 30px;
			}

			.login100-form-btn {
				width: 100%;
				padding: 15px;
				background-color: #333;
				border: none;
				border-radius: 5px;
				color: #fff;
				cursor: pointer;
				transition: background-color 0.3s ease-out;
			}

			.login100-form-btn:hover {
				background-color: #555;
			}
		</style>
	</head>

	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form" action="cek_login.php" method="post">
						<span class="login100-form-title p-b-47">
							<h1>LOGIN</h1>
							<h5>isi username dan password</h5>
						</span>

						<div class="wrap-input100">
							<input class="input100" type="text" name="username" placeholder="Username" data-placeholder="Username">
						</div>

						<div class="wrap-input100">
							<input class="input100" type="password" name="password" id="password" placeholder="Password" data-placeholder="Password">
							<span class="btn-show-pass" onclick="togglePassword()">
								<i class="zmdi zmdi-eye" id="eye"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" type="submit" name="login">
									MASUK
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script>
			function togglePassword() {
				var passwordField = document.getElementById("password");
				var eyeIcon = document.getElementById("eye");

				if (passwordField.type === "password") {
					passwordField.type = "text";
					eyeIcon.classList.remove("zmdi-eye");
					eyeIcon.classList.add("zmdi-eye-off");
				} else {
					passwordField.type = "password";
					eyeIcon.classList.remove("zmdi-eye-off");
					eyeIcon.classList.add("zmdi-eye");
				}
			}
		</script>

		<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>

	</body>

	</html>