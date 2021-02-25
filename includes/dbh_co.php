<?php // connexion à la base de données
    $db_username = 'sql11394899';
    $db_password = 'g8H5UMKi9X';
    $db_name     = 'sql11394899';
    $db_host     = 'sql11.freesqldatabase.com';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
?>