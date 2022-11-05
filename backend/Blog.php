<?php

include_once './Connection.php';

class Blog {
    private $conn;
    private $title;
    private $content;
    private $author;
    private $image;
    private $slug;
    private $date;
    private $video_url;

    public function __construct()
    {
        $connection = connect();
        $this->conn = $connection;
    }

    public function create(){
        $title = $this->getTitle();
        $content = $this->getContent();
        $slug = $this->createSlug($this->getSlug());
        $video_url = $this->getVid();

        $sql = "INSERT INTO posts (title, content, video_url, slug ) VALUES ('$title', $content', '$video_url', '$slug')";
        if($this->conn->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }


    }


    public function createSlug($title){
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
        return $slug;
    }

     // setters and getters
     public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDate() {
        //return todays date
        return date("Y-m-d");
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }
    
    public function getVid(){
        return $this->video_url;
    }

    public function setVid($video_url){
        $this->video_url = $video_url;
    }

    public function setSlug($slug){
        $this->slug = $slug;
    }

    public function getSlug(){
        return $this->slug;
    }
    


}