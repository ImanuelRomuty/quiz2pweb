<?php
include 'config.php';
session_start();
if (isset($_COOKIE['no']) && isset($_COOKIE['name'])) {
	$id = $_COOKIE['no'];
	$key = $_COOKIE['name'];
	$result = mysqli_query($koneksi, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if ($password == $row["password"]) {
			$_SESSION["login"] = true;
			if (isset($_POST['remember'])) {
				setcookie('no', $row['id'], time()+60);
				setcookie('name', hash('sha256', $row['username']), time()+60);
			}
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>LOGIN</title>
		<style media="screen">
			.kotak1{
				width: 200px;
			}
		</style>
	</head>
	<body>
		<h1>Sign In</h1>
				<?php if(isset($error)) : ?>
				<p>Username atau Password yang anda masukkan salah</p>
				<?php endif; ?>
				<form action='' method="post">
					  <div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Username</label>
					    <input class="kotak1" type="text" name="username" placeholder="Username" required>

					  </div>
					  <div class="mb-3">
					    <label for="exampleInputPassword1" class="form-label">Password</label>
					    <input type="password" name="password" placeholder="Password" required>
					  </div>
					  <div class="mb-3 form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
					    <label class="form-check-label" for="exampleCheck1">Check me out</label>
					  </div>
					  <button type="submit" class="btn btn-primary" name='login'>Log In</button>

				</form>
				<br>
				<a href="register.php">Register</a>

	</body>
</html>
