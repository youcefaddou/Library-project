<?php

abstract class PostRepository extends Db {
    
    public static function insertPost($post) {
        $query = "INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)";
        $statement = self::getInstance()->prepare($query);
        return $statement->execute([
            ':title' => $post->getTitle(),
            ':content' => $post->getContent(),
            ':user_id' => $post->getUserId()
        ]);
    }

    public static function getAllPosts() {
        $db = self::getInstance();
        $query = "SELECT posts.*, user.firstName, user.lastName FROM posts INNER JOIN user ON posts.user_id = user.id ORDER BY created_at DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPostById($id) {
        $db = self::getInstance();
        $query = "SELECT * FROM posts WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute([':id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function updatePost($id, $title, $content) {
        $db = self::getInstance();
        $query = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':title' => $title,
            ':content' => $content,
            ':id' => $id
        ]);
    }

    public static function deletePost($id) {
        $db = self::getInstance();
        $query = "DELETE FROM posts WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute([':id' => $id]);
    }
}





// CREATE TABLE posts (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(255) NOT NULL,
//     content TEXT NOT NULL,
//     user_id INT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP NULL DEFAULT NULL,
//     FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
// );

?>

