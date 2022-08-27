<?php


    define("DB_USER","root");
    define("DB_PSWD","root");
    define("DB_HOST","localhost");

    $connection = new mysqli(DB_HOST,DB_USER,DB_PSWD);
    $connection->set_charset("utf8mb4");
    if(!$connection) {
        die('Ошибка соединения c БД');
    } 


?>