<?php
    $init_query = "
    CREATE SCHEMA IF NOT EXISTS test;
    CREATE TABLE IF NOT EXISTS test.posts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(100) NOT NULL,
        body TEXT NOT NULL
    );
    CREATE TABLE IF NOT EXISTS test.comments(
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        body TEXT NOT NULL,
        post_id INT NOT NULL,
        FOREIGN KEY (post_id) REFERENCES test.posts(id)
    );
    ";
?>