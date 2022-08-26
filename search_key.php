<?php
    require "connection.php";
    header('Content-Type: application/json');
    $request_body = file_get_contents('php://input');
    $sql = 
    "SELECT posts.title,comments.body FROM test.posts AS posts
    INNER JOIN 
        test.comments AS comments ON posts.id = comments.post_id
    WHERE comments.body LIKE '%{$request_body}%';";
    $resultQuery = $connection->query($sql);
    $data = [];
    while($row = $resultQuery->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
?>