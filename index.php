<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="style/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="script/script.js"></script>
	<script type="text/javascript" src="script/script-home.js"></script>
</head>

<body>

	<div class="nav" id="navig"></div><br />
	<div id="header">
		<div id="intro">Hello<?php
					// Make sure the user is logged in
					if (isset($_SESSION['username'])) {
						echo ', ' . $_SESSION['username'] . '!';
					} else {
						echo ' World!';
					}
			?>
		</div><br />
	
	
		<div id="typedIntro"></div>
		<div id="noGameIntro">Sarah Yoder's Portfolio</div>
		<br />
		<div id="choosePath">
			<a href="play-game">Play Game</a><span id="skip"> or <a href="#">Explore Portfolio</a></span>
		</div>
		<div id="portfolioIntro">Mouseover or click the images below to learn more about me!</div>
	</div> <!-- end header div -->
	<br />
	<div id="content">
		<div class="page">
			<div class="gallery">
				<div class="column">
					<a href="http://findingbulgaria.com/" target="_blank">
						<div class="image_holder">
							<img src="./img/finding-bulgaria.jpg" class="portfolio_image">
					  		<div class="overlay">
    							<div class="text">FindingBulgaria.com is built on PHP and utilitzes Bootstrap to make it fully responsive.</div>
  							</div>
						</div>
					</a>
					<a href="https://www.linkedin.com/in/sarahcyoder/" target="_blank"><img src="./img/linkedin.jpg" class="portfolio_image"></a>
				</div>			
				<div class="column">
					<a href="https://github.com/sarahcyoder/" target="_blank">
						<div class="image_holder">
							<img src="./img/github.jpg" class="portfolio_image">
					  		<div class="overlay">
    							<div class="text">View the code that powers this website and more!</div>
  							</div>
						</div>
					</a>
					<a href="http://riseandshinema.org/" target="_blank">
						<div class="image_holder">
							<img src="./img/rsma.jpg" class="portfolio_image">
					  		<div class="overlay">
    							<div class="text">I built riseandshinema.org on WordPress during my time at The Greater Boston Food Bank.</div>
  							</div>
						</div>
					</a>
				</div>
				<div class="column">
					<a href="/doc/SarahYoderResume.pdf" target="_blank"><img src="./img/resume.jpg" class="portfolio_image"></a>
					<a href="http://macostofhunger.org/" target="_blank">
						<div class="image_holder">
							<img src="./img/macostofhunger.jpg" class="portfolio_image">
					  		<div class="overlay">
    							<div class="text">This single page, scrolling WordPress site showcases a research study.</div>
  							</div>
						</div>
					</a>
				</div>
				<div class="column">
					<a href="about.html"><img src="./img/about-home.jpg" class="portfolio_image"></a>
					<a href="contact.html"><img src="./img/contact.jpg" class="portfolio_image"></a>
				</div>	
			</div>
		</div> <!-- end page div -->
	</div> <!-- end content div -->
</body>
</html>