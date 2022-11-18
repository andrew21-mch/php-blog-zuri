<?php
session_start();
include_once 'Connection.php';

class Blog {
    private $conn;
    private $title;
    private $content;
    private $slug;
    private $video_url;
    private $id;
    private $image;

    public function __construct()
    {
        $connection = connect();
        $this->conn = $connection;
    }

    public function create($filename){
        $title = $this->getTitle();
        $content = $this->getContent();
        $slug = $this->createSlug($this->getTitle());
        $video_url = $this->getVid();
        $userid = isset($_SESSION['loggedInUser']) ? $_SESSION['loggedInUser'] : NULL;


        $sql = "INSERT INTO posts (`title`, `content`, `slug`, `video_url`, `date`, `userid`, `image`) VALUES ('$title', '$content', '$slug', '$video_url', NOW(), '$userid', '$filename')";
        if($this->conn->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }


    }

    public function getPosts(){
        $sql = "SELECT id as postid, `title`, `content`, `userid`, `slug`,  `date` FROM posts";
        $result = $this->conn->query($sql);
        $posts = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
            return $posts;
        }
        else{
            return false;
        }
    }

    public function deletePost($id) {
        $sql = "DELETE FROM posts WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getPost($id){
        $sql = "SELECT * FROM posts WHERE id='$id'";
        $result = $this->conn->query($sql);
        $post = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $post = $row;
            }
            return $post;
        }
        else{
            return false;
        }
    }

    public function update($id, $title, $content, $video_url){
        $slug = $this->createSlug($title);
        $sql = "UPDATE posts SET title='$title', content='$content', video_url='$video_url', slug='$slug' WHERE id='$id'";
        if($this->conn->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    public function getLoggedInUserId(){
        if(isset($_SESSION['id'])){
            return $_SESSION['id'];
        }
        else{
            return false;
        }

    }


    public function upload($file){
        if(is_array($file)){
            if(is_array($file['type'], array('image/jpeg', 'image/png', 'image/gif'))){
                if($file['size'] <= 2000000){
                    $filename = time(). '_'.$file['name'];
                    $path = '../images/'.$filename;
                    if(move_uploaded_file($file['tmp_name'], $path)){
                        return $filename;
                    }
                }
            }
        }
    }


    // public function update(){
    //     $title = $this->getTitle();
    //     $content = $this->getContent();
    //     $slug = $this->createSlug($this->getTitle());
    //     $video_url = $this->getVid();
    //     $id = $this->setId($this->getId());


    //     $sql = "UPDATE posts SET title='$title', content='$content', video_url='$video_url', slug='$slug' WHERE id='$id'";
    //     if($this->conn->query($sql) === TRUE){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    //}


    // public function delete(){
    //     $id = $this->getId();
    //     $sql = "DELETE FROM posts WHERE id='$id'";
    //     if ($this->conn->query($sql) === TRUE) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

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

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    

}
