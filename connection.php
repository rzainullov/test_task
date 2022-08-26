<?php


    define("DB_USER","root");
    define("DB_PSWD","root");
    define("DB_HOST","localhost");

    $connection = new mysqli(DB_HOST,DB_USER,DB_PSWD);

    if(!$connection) {
        die('Ошибка соединения c БД');
    } 


?>