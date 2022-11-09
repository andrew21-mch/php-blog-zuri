<?php

session_start();

include_once './Connection.php';
include_once './User.php';
include_once './Blog.php';

$user  = new User();
$blog = new Blog();


if(isset($_POST['login-submit'])){
    $password = $_POST['password'];
    $username = $_POST['username'];
    if($user->login($username, $password)){
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        return header("location: ./dashboard.php");
    }else{
        $_SESSION['error'] = "Invalid username or password";
        header("Location: ./login.php");
    }
}

elseif(isset($_POST['register-submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
    if($user->passwordMatch($password, $password_repeat)){
        
        // user mutators
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        if($user->save()){
            $username = $user->getEmail();
            $_SESSION['username'] = $email;
            return header("location: ./dashboard.php");
        }else{
            $_SESSION['error'] = "Invalid username or password";
            header("Location: ./register.php");
        }
    }
    else{
        $_SESSION['passwordValidation'] = "Passwords do not match!";
        header("location: ./register.php");
    }
    
}

elseif(isset($_POST['logout-submit'])){
    $user->logout();
}

elseif(isset($_POST['blog-submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $video_url = $_POST['url'];
    $image = $_POST['image'];

    $blog->setTitle($title);
    $blog->setContent($content);
    $blog->setVid($video_url);
    $blog->setImage($image);

    // echo $blog->getImage()
    if($filename = $blog->upload($image)){
        if($blog->create($filename)){

            $_SESSION['created'] = "Post successfully Added";
            header("Location: ./addblog.php");
        }
        else{
            $_SESSION['not_created'] = "Post not Added";
            header("Location: ./addblog.php");
        }
    }
}


elseif(isset($_POST['delete-submit'])){
    $id = $_POST['postid'];
    // $blog->setId = $id;
    if($blog->deletePost($id)){
        $_SESSION['deleted'] = "Post successfully deleted";
        header("Location: ./dashboard.php");
    }
    else{
        $_SESSION['not_deleted'] = "Post not deleted";
        header("Location: ./dashboard.php");
    }
}

elseif(isset($_POST['edit-blog-submit'])){
   
    $title = $_POST['title'];
    $content = $_POST['content'];
    $video_url = $_POST['url'];
    $id = $_POST['id'];


    if($blog->update($id, $title, $content, $video_url)){
        $_SESSION['created'] = "Post successfully Edited";
        header("Location: ./edit-blog.php?id=$id");
    }
    else{
        $_SESSION['not_created'] = "Post not Edit";
        header("Location: ./edit-blog.php?id=$id");
    }


}
elseif(isset($_GET['blog-single'])){
    $id = $_GET['postid'];
    return header("Location: ../single-blog.php?postid=$id");
}
// else{
//     return header("Location: ./unauthorized.php?error=unauthorized");
// }

else{
    header("Location: ./");
}