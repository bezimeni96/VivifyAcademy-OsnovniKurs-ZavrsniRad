<?php
    $server = '127.0.0.1';
    $dbname = 'blog';
    $username = 'root';
    $password = 'vivify';

    try {
        $connection = new PDO(
            "mysql:host=$server;
            dbname=$dbname",
            $username,
            $password
        );
    } catch (PDOException $e) {
        echo $e->getMEssage();
    }
?>