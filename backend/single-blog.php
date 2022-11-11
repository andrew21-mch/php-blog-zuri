<!-- //not being used -->
<!DOCTYPE html>
<?php
include 'Connection.php';
include 'Blog.php';
// include 'User.php';

$post = new Blog();
   
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
     
    <title>dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
    body{
        background-image: linear-gradient(#7978FF, #C47AFF);
    }
    input{
        background-color: none;
    }
    .flex-container {		
            display: flex;
            background: #eee;
            }
            .item {
                padding: 10px;
            }
            .ml-auto {
                margin-left: auto;
        }
        .card{
            background-color: gray;
            color: white;
            padding: 40px;
            margin: 2%;
        }
        p {
            line-height: 1.6;
            text-align: justify;
        }

        img {
            width: 70%; 
            max-width: 500px; 
            margin: 0 auto;
        }
    </style>
</head>
<body >

<div class="flex-container">
        <div class="item"><a href="#">Bawash</a></div>
        <div class="item ml-auto"><a href="#"><h4 style="color:blue">
                <?php //session_start();
                if($_SESSION){
                    echo "Hi " . $_SESSION['username'];
                }
                ?>
            </h4></a></div>
    </div>
    
    <?php $blog = $post->getPost($_GET['postid']); ?>
    
    
    <h2 class="row justify-content-center mt-3"><?php echo $blog['title']; ?></h2>
    <div class="container">
        <div class="row justify-content-center m-3">
        <div class="col-1"></div>
            <div class="col-10">
            <img src="../images/<?php echo $blog['image'] ?>" alt="Image" >
                <p><?php echo $blog['content'] ?></p>
                
            </div>
            <div class="col-1"></div>
        </div>
    </div>

</body>
</html>