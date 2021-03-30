<?php

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'camisetas');

$connect = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS); 

