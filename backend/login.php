<!-- html login page -->
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
<!-- bootstrap cdn -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <div class="row mt-4"> 

    <h1 class="text-center">
        Login
    </h1>
        <form action="useraction.php" method="post">
        <div>
        <?php 
            session_start();
            if(isset($_SESSION['error'])){ ?>
            <div>
                <span class="alert alert-danger">
                    <?php echo $_SESSION['error'] ;
                    unset($_SESSION['error']);
                    ?>
                </span>
            </div>
            <?php }
            ?>

        </div>
            <div class="form-group">
                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group text-center">
                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                <label for="remember"> Remember Me</label>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="reset.php
                            ">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
