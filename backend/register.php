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
        Register
    </h1>

    <form class="form" action="useraction.php" method="post">
            <div class="form-group">
            <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Full Name" required>
        </div>

        <div class="form-group">
            <input type="email" 
            name="email" id="email" tabindex="1" 
            class="form-control" placeholder="Email Address" value="" required> 
        </div>
        <div class="form-group">
            <input type="password" 
            name="password" id="password" tabindex="2" 
            class="form-control" placeholder="Password" required>
        </div>
        <?php 
        session_start();
        if(isset($_SESSION['passwordValidation'])){ ?>
        <div class="alert alert-danger">
            <span><?php echo $_SESSION['passwordValidation'] ?></span>
        </div>

        <?php
        unset($_SESSION['passwordValidation']);
        } ?>
        <div class="form-group">
            <input type="password" 
            name="password-repeat" id="password-repeat" tabindex="2" 
            class="form-control" placeholder="Repeat Password">
        </div>
        <?php 
        if(isset($_SESSION['passwordValidation'])){ ?>
        <div class="alert alert-danger">
            <span><?php echo $_SESSION['passwordValidation'] ?></span>
        </div>

        <?php
        unset($_SESSION['passwordValidation']);
        } ?>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                </div>
            </div>
        </div>
    </form>
</body>
</html>