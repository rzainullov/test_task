<?php
    function create_db() {
        require_once "connection.php";
        require_once "init_query.php";
        $results = mysqli_multi_query($connection,$init_query);
        echo $results;
    }
    create_db();
?>