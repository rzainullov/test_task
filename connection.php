<?php

    define("DB_NAME","test");
    define("DB_USER","root");
    define("DB_PSWD","root");
    define("DB_HOST","localhost");

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME,3306);

    if(!$connection) {
        die('Ошибка соединения c БД');
    } else {
        echo "Соединение с БД прошло успешно ";
    }

?>