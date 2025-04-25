<!-- CREATE TABLE Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    year INT(4) NOT NULL,
    isAvailable TINYINT NOT NULL DEFAULT 0,
    user_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
); -->

<?php

abstract class BookRepository extends Db {
    public static function getAllBooks() {
        $db = self::getInstance();
        $query = "SELECT * FROM books ORDER BY title";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBookById($id) {
        $db = self::getInstance();
        $query = "SELECT * FROM books WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->execute([':id' => $id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertBook(Book $book) {
        $db = self::getInstance();
        $query = "INSERT INTO books (title, author, isAvailable) VALUES (:title, :author, :isAvailable)";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':title' => $book->getTitle(),
            ':author' => $book->getAuthor(),
            ':isAvailable' => $book->getIsAvailable()
        ]);
    }

    public static function updateBook(Book $book) {
        $db = self::getInstance();
        $query = "UPDATE books SET title = :title, author = :author, isAvailable = :isAvailable, borrower_id = :borrowerId WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':id' => $book->getId(),
            ':title' => $book->getTitle(),
            ':author' => $book->getAuthor(),
            ':isAvailable' => $book->getIsAvailable(),
            ':borrowerId' => $book->getBorrowerId()
        ]);
    }

    public static function deleteBook($id) {
        $db = self::getInstance();
        $query = "DELETE FROM books WHERE id = :id";
        $statement = $db->prepare($query);
        return $statement->execute([':id' => $id]);
    }

    public static function borrowBook($bookId, $userId) {
        $db = self::getInstance();
        $query = "UPDATE books SET isAvailable = 0, borrower_id = :userId WHERE id = :bookId AND isAvailable = 1";
        $statement = $db->prepare($query);
        return $statement->execute([
            ':bookId' => $bookId,
            ':userId' => $userId
        ]);
    }

    public static function returnBook($bookId) {
        $db = self::getInstance();
        $query = "UPDATE books SET isAvailable = 1, borrower_id = NULL WHERE id = :bookId";
        $statement = $db->prepare($query);
        return $statement->execute([':bookId' => $bookId]);
    }
}



