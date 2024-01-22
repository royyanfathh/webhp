<?php
include 'koneksi.php';
session_start();
if (isset($_POST['Login'])) {
	$username = $_POST['username'];
	$password = $_POST['pass'];

	if ($username != "" && $password != "") {
		$mysql = mysqli_query($koneksi, "select * from pembeli where username='$username' and password='$password'");
		if ($data = mysqli_fetch_array($mysql)) {
			$_SESSION['username'] = $data['username'];
			$_SESSION['password'] = $data['pass'];
			header('location:cart.php');
		} else {
			?>
			<?php $error = ""; ?> username atau password salah
			<?php header('location:login.php');
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div class="container" id="container">
		
		<div class="form-container sign-up-container">
			<form action="login.php" method="post">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input type="text" name="nama_pembeli" placeholder="Name" />
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="password" placeholder="Password" />
				<input type="submit" name="submit" value="Login">
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="login.php" method="post">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
					<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
					<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>or use your account</span>
				<input type="text" name="username" placeholder="Username" />
				<input type="password" name="pass" placeholder="Password" />
				<a href="#">Forgot your password?</a>
				<input type="submit" name="Login" value="Login">
			</form>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<p>
			Created with <i class="fa fa-heart"></i> by
			<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
			- Read how I created this and how you can join the challenge
			<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
		</p>
	</footer>
	<script src="js/login.js"></script>
	<?php
	include "koneksi.php";
	if (isset($_POST['submit'])) {
		$nama_pembeli = $_POST['nama_pembeli'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$result = mysqli_query($koneksi, "INSERT INTO pembeli(nama_pembeli,username,password)
  VALUES('$nama_pembeli','$username','$password')");
	}
	?>
</body>

</html>