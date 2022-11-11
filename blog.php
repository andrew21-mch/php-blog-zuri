<?php
include 'backend/Connection.php';
include "backend/Blog.php";

$blogpost = new Blog();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bawash Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap cdn -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- bootstrap 4 cdn -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl. .min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        button{
            background: none;
        	color: inherit;
        	border: none;
        	padding: 0;
        	font: inherit;
        	cursor: pointer;
        	outline: inherit;
        	text-decoration: underline;
        }
        #blog a{
            text-decoration: underline;
        }
    </style>
  </head>
  <body>

  	<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 align-items-center">
						<p class="mb-0 phone pl-md-2">
							<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a> 
							<a href="#"><span class="fa fa-paper-plane mr-1"></span> info@bawash.org</a>
						</p>
					</div>
					<div class="col-md-6 justify-content-md-end">
						<div class="social-media">
			    		<p class="mb-0 d-flex">
			    			<a href="https://www.facebook.com/237bawash/" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
			    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
			    			<a href="https://www.instagram.com/invites/contact/?i=3vbekpiik1jj&utm_content=p25ws9e/" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
			    		</p>
		        </div>
					</div>
				</div>
			</div>
		</div>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Organisation</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Our Blog</h1>
          </div>
        </div>
      </div>
</section>

<section class="ftco-section">
      <div class="container">
		<div class="row justify-content-center">
			<h1>Recent Blog Posts</h1>
			<?php $posts = $blogpost->getPosts() 
			
			
			?>

		</div>

		<div class="row" id="blog">
			<?php 

			if(count($posts) > 0) { 

			foreach($posts as $post){ ?>
			<div class="col-md-4 ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_3.jpg');">
	              </a>
	              <div class="meta text-center mb-2 align-items-center justify-content-center">
                	<div>
						<?php

						$date = strtotime($post['date']);
						 $day = date('d', $date);
						 $month = date('M', $date);
						 $year = date('Y', $date);

						 

						?>
                		<span class="day"><?php echo $day;?></span>
                		<span class="mos"><?php echo $month ?></span>
                		<span class="yr"><?php echo $year ?></span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="backend/useraction.php?blog-single=&postid=<?php echo $post['postid']; ?>"><?php echo $post['title'] ?></a></h3>
                <p><?php echo substr($post['content'], 0, 70) ?></p>
				<form action="./backend/useraction.php" method="GET">
					<input type="hidden" value="<?php echo $post['postid']; ?>" name="postid">
					<button type="submit" name='blog-single' class="btn btn-secondary" style="color: white; text-decoration: none"> View More</button>
				</form>
              </div>
            </div>
        </div>
			<?php }
			
			?>
          
		
		<?php

			}else{
			echo "NO POST FOUND";
		} ?>
		</div>
        <!-- <div class="row" id="blog">
          <div class="col-md-4 ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_3.jpg');">
	              </a>
	              <div class="meta text-center mb-2 align-items-center justify-content-center">
                	<div>
                		<span class="day">18</span>
                		<span class="mos">April</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
        </div>
          <div class="col-md-4 ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_2.jpg');">
	              </a>
	              <div class="meta text-center mb-2 align-items-center justify-content-center">
                	<div>
                		<span class="day">18</span>
                		<span class="mos">April</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_1.jpg');">
	              </a>
	              <div class="meta text-center mb-2 align-items-center justify-content-center">
                	<div>
                		<span class="day">18</span>
                		<span class="mos">April</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a mb-3></h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>              
							</div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.php" class="block-20 img" style="background-image: url('images/image_2.jpg');">
	              </a>
	              <div class="meta text-center mb-2 align-items-center justify-content-center">
                	<div>
                		<span class="day">18</span>
                		<span class="mos">April</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">Social Media Risks To Mental Health</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
        </div> -->
    </section>	


   
	<footer class="ftco-footer m-auto">
		<div class="container">
		  <div class="row mb-5">
			<div class="col-sm-12 col-md">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2 logo"><a href="#">projects</a></h2>
				<p>We are currently constructing deep, narrow wells that tap into naturally occurring underground water. These boreholes will be used as supplies of clean water to inhabitants of the community. To support us make clean water accessible for the rural communities, you can make a donation in the donations tab.Our aim for  this project is to make good drinking water accessible to every household in the community at very cheap rates. Having a constant flow of water in every home goes a long way to facilitate the day-to-day running of the household chores.</p>
				<div class="row">
				  <ul class="ftco-footer-social list-unstyled mt-2">
				  <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
				  <li class="ftco-animate"><a href="https://www.facebook.com/237bawash"><span class="fa fa-facebook"></span></a></li>
				  <li class="ftco-animate"><a href="https://www.instagram.com/invites/contact/?i=3vbekpiik1jj&utm_content=p25ws9e/"><span class="fa fa-instagram"></span></a></li>
				</ul>
			  </div>
				  
				
			  </div>
			</div>
			<div class="col-sm-12 col-md">
			  <div class="ftco-footer-widget mb-4 ml-md-4">
				<h2 class="ftco-heading-2">Legal</h2>
				<ul class="list-unstyled">
				  <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>Join us</a></li>
				  <!--<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>-->
				  <li><a href="about.php"><span class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
				  <li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Terms &amp; Conditions</a></li>
				</ul>
			  </div>
			</div>
			<div class="col-sm-12 col-md">
			   <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2">Organisation</h2>
				<ul class="list-unstyled">
				  <li><a href="about.php"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
				  <li><a href="projects.php"><span class="fa fa-chevron-right mr-2"></span>projects</a></li>
				  <li><a href="blog.php"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
				  <li><a href="contact.php"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
				</ul>
			  </div>
			</div>
			<div class="col-sm-12 col-md">
			  <div class="ftco-footer-widget mb-4">
				  <h2 class="ftco-heading-2">Have a Question?</h2>
				  <div class="block-23 mb-3">
					<ul>
					<li><span class="icon fa fa-map marker"></span><span class="text">BAWASH REGISTRATION number.<br>

Reg No:014/RDA/E.13/067/ALPAS</span></li>
					  <li><span class="icon fa fa-map marker"></span><span class="text">Bafanji, Ndop. Bamenda NW, Cameroon</span></li>
					  <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+237 661173322</span></a></li>
					  <!-- <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">Reg No: No041/RDA/J04/SAAJP</span></a></li> -->
					  <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@bawash.org</span></a></li>
					</ul>
				  </div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="container-fluid px-0 py-5 bg-black">
			<div class="container">
				<div class="row">
				<div class="col-md-12">
				  <p class="mb-0" style="color: rgba(255,255,255,.5); text-align: center;">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | skye8
					</p>
				</div>
			  </div>
			</div>
		</div>
	  </footer>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>