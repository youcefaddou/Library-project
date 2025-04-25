<?php

class Book {
    private $id;
    private $title;
    private $author;
    private $isAvailable;
    private $borrowerId;

    public function __construct($title, $author, $isAvailable = true, $borrowerId = null) {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setIsAvailable($isAvailable);
        $this->setBorrowerId($borrowerId);
    }

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getTitle() { return $this->title; }
    public function setTitle($title) { $this->title = $title; }
    public function getAuthor() { return $this->author; }
    public function setAuthor($author) { $this->author = $author; }
    public function getIsAvailable() { return $this->isAvailable; }
    public function setIsAvailable($isAvailable) { $this->isAvailable = $isAvailable; }
    public function getBorrowerId() { return $this->borrowerId; }
    public function setBorrowerId($borrowerId) { $this->borrowerId = $borrowerId; }
}
?> 