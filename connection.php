<?php


    define("DB_USER","root");
    define("DB_PSWD","root");
    define("DB_HOST","localhost");

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PSWD);

    if(!$connection) {
        die('Ошибка соединения c БД');
    } 


?>