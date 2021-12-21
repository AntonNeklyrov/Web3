<?php

require_once 'config.php';

function connect(){
    try {
        $dsn = "pgsql:host=localhost;port=5432;dbname=films;";
        $pdo = new PDO($dsn, 'postgres', '1111', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    return $pdo;
}


