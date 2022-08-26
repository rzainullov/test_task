<?php
    function create_db_and_insert_data() {
        require "connection.php";
        require_once "init_query.php";
        require_once "insert_data_query.php";
        return $connection->multi_query(init_query().insert_data_query());
    }
?>