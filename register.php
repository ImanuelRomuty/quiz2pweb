
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <title>Hello, world!</title>
  </head>
  <body>
    <h1>Daftar</h1>
        <form action='' method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <input class="kotak1" type="text" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name='login'>Daftar</button>
        </form>
  </body>
</html>
<?php
include 'config.php';
if(isset($_POST['login'])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $tampil=mysqli_query($koneksi,"INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password');");
  if($tampil) header("Location: login.php");
}
?>
