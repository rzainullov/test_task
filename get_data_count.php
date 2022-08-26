<?php
    function get_data_count() {
        require "connection.php";
        $sql_posts = "SELECT COUNT(*) AS count  FROM test.posts";
        $sql_comments = "SELECT COUNT(*) AS count FROM test.comments";
        $result_query_posts = $connection->query($sql_posts);
        $result_query_comments = $connection->query($sql_comments);
        $posts_count = ($result_query_posts->fetch_assoc())['count']; 
        $commments_count = ($result_query_comments->fetch_assoc())['count']; 
        return "'Загружено {$posts_count} записей и {$commments_count} комментариев'";
    }
?>