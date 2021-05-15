<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

    function ambil_url($url){
        $client=curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response=curl_exec($client);
        return json_decode($response);
    }
    $url_kucing="https://thatcopy.pw/catapi/rest/";
    $result=ambil_url($url_kucing);
    $kucing=$result->url;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <title>KUCING HARI INI</title>
</head>
<body><center>
						<h3 class="text-center mb-4">KOCENG</h3>
            <div class="card" style="width: 18rem;">
          <img src="071191800_1604394716-shutterstock_281099804.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">LIHAT FOTO KUCING ANDA HARI INI</h5>
            <p class="card-text">Saat kamu bermain dengan kucing, otak akan melepaskan hormon oksitosin yang bisa membuat rileks sehingga menghilangkan stres.</p>
            <a href="<?= $kucing?>" class="btn btn-primary">KLIK ME!!!</a>
          </div>
        </div>
						<a href="logout.php" class="form-control btn btn-primary rounded submit px-3 " style="widht:200px"> <span>Logout</span> </a></center>
</body>
</html>
