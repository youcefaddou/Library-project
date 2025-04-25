<?php

class Post extends PostRepository
{
    private $title;
    private $content;
    private $userId;

    public function setTitle($title) { $this->title = $title; }
    public function getTitle() { return $this->title; }

    public function setContent($content) { $this->content = $content; }
    public function getContent() { return $this->content; }

    public function setUserId($userId) { $this->userId = $userId; }
    public function getUserId() { return $this->userId; }
}