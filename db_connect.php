db_connect.php

<?php 
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$db_name = 'note45'; 

$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));