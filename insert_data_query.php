<?php
    function insert_data_query() {
        require_once "http_get.php";
        require_once "transform_array_to_sql_query_insert.php";
        $query_1 = transform_array_to_sql_query_insert(http_get('https://jsonplaceholder.typicode.com/posts'),"test.posts",["int","id"],["varchar","title"],["text","body"]);
        $query_2 = transform_array_to_sql_query_insert(http_get('https://jsonplaceholder.typicode.com/comments'),"test.comments",["int","id"],["varchar","name"],["text","body"],["int","post_id"]);  
        $query = $query_1.$query_2;  
        return $query;
    }

?>