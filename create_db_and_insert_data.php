<?php
    function create_db_and_insert_data() {
        require_once "connection.php";
        require_once "init_query.php";
        require_once "insert_data_query.php";
        return mysqli_multi_query($connection,init_query().insert_data_query());
    }
?>