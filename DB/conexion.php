<?php

$host = "localhost";
$db = "test"; 
$user = "root";
$pass= "root";
$chrs = "utf8mb4";
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";
$opts= [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH, // BOTH ou ASSOC
];
try
{
    $pdo = new PDO ($attr, $user, $pass, $opts);

}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}



?>