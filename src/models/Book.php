<?php

class Book {
    private $id;
    private $title;
    private $author;
    private $year;
    private $isAvailable;
    private $borrowerId;
    private $userId;

    public function __construct($title, $author, $year = null, $isAvailable = true, $borrowerId = null, $userId = null) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setYear($year);
        $this->setIsAvailable($isAvailable);
        $this->setBorrowerId($borrowerId);
        $this->setUserId($userId);
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    public function getAuthor() { return $this->author; }
    public function setAuthor($author) { $this->author = $author; }
    public function getYear() { return $this->year; }
    public function setYear($year) { $this->year = $year; }
    public function getIsAvailable() { return $this->isAvailable; }
    public function setIsAvailable($isAvailable) { $this->isAvailable = $isAvailable; }
    public function getBorrowerId() { return $this->borrowerId; }
    public function setBorrowerId($borrowerId) { $this->borrowerId = $borrowerId; }
    public function getUserId() { return $this->userId; }
    public function setUserId($userId) { $this->userId = $userId; }
}
?> 