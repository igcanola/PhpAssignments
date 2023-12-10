<?php
define('DBSERVER','localhost');
define('DBUSERNAME','root');
define('DBPASSWORD','');
define('DBNAME','personadb');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if ($db === false){
    die("Error: conection error." . mysqli_connect_error());
}

?>

<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "personadb";

try {
  $conn = new PDO(
    "mysql:host=$server; dbname=$dbname",
    "$username", "$password"
  );
}
catch(PDOException $e) {
  die('Unable to connect with the database');
}

?>