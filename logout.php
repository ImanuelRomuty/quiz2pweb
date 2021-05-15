<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('no','', time()-3600);
setcookie('name', '', time()-3600);

header("Location: login.php");
exit;

?>
