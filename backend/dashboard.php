<?php 
include_once './Connection.php';
include_once './User.php';
include_once './Blog.php';

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
    </style>
</head>
<body>

<div class="flex-container">
        <div class="item "><a href="#">Bawash</a></div>
        <div class="item ml-auto d-flex"><a href="#"><h4 style="color:blue">
                <?php 
                if(isset($_SESSION['username'])){
                    echo "Hi " . $_SESSION['username'];
                }
                else{
                    echo "You are not logged in";
                }
                ?>
            </h4></a>

            <form action="useraction.php" method="post">
              <?php  if(isset($_SESSION['username'])){?>
                <button style="border-style: none; color: blue" type="submit" name="logout-submit">Logout</button>
                <?php }
                else{?>
                    <button style="border-style: none; color: blue" type="submit" name="login-submit">Login</button>
   
               <?php }?>
            </form>
        </div>
    </div>
    
    <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success">
            <span>Post Successfully uploaded</span>
        </div>
        <?php } 
        
        if(isset($_SESSION['success'])){
            echo "Hi ". $_SESSION['success'];
        }
        
        
        ?>

    <div class="">
        <?php  if(isset($_SESSION['deleted'])){ ?>
        <span class="alert alert-success">
            <?php 
                echo $_SESSION['deleted'];
                unset($_SESSION['deleted']);
                ?>
            
            </span>
        </span>
        <?php } ?>
        
        <?php  if(isset($_SESSION['not_deleted'])){ ?>
        <span class="alert alert-danger">
            <?php 
                echo $_SESSION['not_deleted'];
                unset($_SESSION['not_deleted']);
                ?>
            
            </sapn>
        </span>
        <?php } ?>
    </div>
    
    
<!-- design dashboard -->
<div class="container m-auto" style="text-align: center;">
    <div class="row">
        <div class="col-md-5 ">
            <h1 class="text-center" style="text-align: center;">Dashboard</h1>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h3>Total Users</h3>
                    <h1>
                        <?php 

                        $user = new User();
                        echo count($user->getUsers());
                        ?>
                    
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <a class="card-body text-white" href="all-posts.php">
                    <h3>Total Posts</h3>
                    <h1>
                        <?php 

                        $posts = new Blog();
                        echo count($posts->getPosts());
                        ?>
                    
                    </h1>
                </a>
            </div>
        </div>
    </div>
</div>
<div class='row justify-content-center'>
         <?php
         if(isset($_SESSION['username'])){?> <a class='btn btn-primary m-3' style='width: 200px' href='../index.php'>
         Go To Website</a>
           <a class='btn btn-primary m-3' style='width: 200px' href='./addblog.php'>Add Blog</a>
           <?php }?>
       </div>

       <div class="">
        <?php  if(isset($_SESSION['deleted'])){ ?>
        <span class="alert alert-success">
            <?php 
                echo $_SESSION['deleted'];
                unset($_SESSION['deleted']);
                ?>
            
            </span>
        </span>
        <?php } ?>

</body>
</html>

