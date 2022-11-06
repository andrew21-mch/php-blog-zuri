<?php
include './Connection.php';
include './Blog.php';
include './User.php';

$post = new Blog();
$user = new User();
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
        /* background-image:  */
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
    </style>
</head>

<body >
    <div class="container mt-5">
        <h1 class=""> Manage Posts</h1>
    
    <div class="table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="px-4 py-2" style="width: 5%">Id</th>
                    <th class="px-4 py-2" style="width: 20%">Title</th>
                    <th class="px-4 py-2" style="width: 30%">Content</th>
                    <th class="px-4 py-2" style="width: 15%">Author</th>
                    <th class="px-4 py-2" style="width: 15%">Created at</th>
                    <th class="px-4 py-2" style="width: 30%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $posts = $post->getPosts();
                foreach($posts as $blogpost){
                    // $user = $user->getUserById($post['author_id']);
                    ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $blogpost['postid']; ?></td>
                        <td class="border px-4 py-2"><?php echo $blogpost['title']; ?></td>
                        <td class="border px-4 py-2"><?php echo $blogpost['content']; ?></td>
                        <td class="border px-4 py-2"><?php echo $blogpost['userid']; ?></td>
                        <td class="border px-4 py-2"><?php echo $blogpost['date']; ?></td>
                        <td class="border px-4 py-2">
                            <a href="edit-blog.php?id=<?php echo $blogpost['postid']; ?>" class="btn btn-primary w-100">Edit</a>
                            <form action="./useraction.php" method="POST">
                                <input type="hidden" name="postid" value="<?php echo $blogpost['postid']; ?>">
                                <button type="submit" name="delete-submit" class="btn btn-danger w-100">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>