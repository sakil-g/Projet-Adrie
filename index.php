<?php session_start() ?>
<?php include_once('./config.php'); ?>
<?php include_once('./includes/header.php'); ?>
<?php include_once('./pages/loginform.php'); ?>
<br>
<?php include_once('./includes/footer.php'); ?>

<?php

// $month = "[".date("d")."/".date("m")."/".date("y")."]";
// $hour = "[".date("H").":".date("i").":".date("s")."]";
// $url = $_SERVER['REMOTE_ADDR']."connect to".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
// $reunion = $month.$hour.$url. "\n";
// echo $reunion;
// $files = fopen("logs.txt", "a+");
// fputs($files,$reunion);
// fclose($files);
error_log("hello, this is a test!");

?>