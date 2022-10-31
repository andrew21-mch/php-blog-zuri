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

    <div class="row"> 
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#login-form" class="active" id="login-form-link" onclick="hideLogin()">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#register-form" id="register-form-link" onclick="showRegister()">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                        
                            <form id="login-form" action="useraction.php" method="post" role="form" style="display: block;">
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
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
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
                            <form id="register-form" class="form" action="useraction.php" method="post" role="form" style="display: none; ">
                                 <div class="form-group">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Full Name" value="">
                                </div>
    
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_repeat" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- bootstrap cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</body>

<script>
    function showRegister() {
        document.getElementById("register-form").style.display = "block";
        document.getElementById("login-form").style.display = "none";
        }

    function hideLogin() {
        document.getElementById("register-form").style.display = "none";
        document.getElementById("login-form").style.display = "block";
        }
</script>
