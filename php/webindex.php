<?php

session_start();
include_once 'database.php';

$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$game = $_SESSION['game'];

///$sql1 = "SELECT email FROM users WHERE email = $email";
//$query = mysqli_query($cxn, $sql) or die (mysqli_connect_error($result));


if(isset($_POST['play'])){
	$num1 = mysqli_real_escape_string($cxn, $_POST['num1']);

	if(empty($num1)){
		header('Location: webindex.php');
	}
		elseif(strlen($num1) > 3 ){
		header('Location: webindex.php');
	}
	
	
	
$sql = "INSERT INTO num_input(`email`,`phone`,`game_played`,`num1`) VALUES('".$email."','".$phone."','".$game."','".$num1."')";
$result = mysqli_query($cxn,$sql) or die (mysqli_connect_error($result));
if($result){
	header('Location: thankyou.php');
}
else{
	header('Location: webindex.php');
}


}



?>
<!DOCTYPE HTML>
<html>
<head>
<title>NumberGame | Play </title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/lightbox.css">

<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Titillium+Web:400,600,700,300' rel='stylesheet' type='text/css'>
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Game Spot Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  
</head>
<body>
<!-- header -->
<div class="banner">
	 <div class="container">
		 <div class="headr-right">
				<div class="details">
					<ul>
						<li><a href="mailto:@example.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>info(at)example.com</a></li>
						<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(+1)000 123 456789</li>
					</ul>
			  </div>
		 </div>
		 <div class="banner_head_top">
			  <div class="logo">
					 <h1><a href="index.html">Number<span class="glyphicon glyphicon-knight" aria-hidden="true"></span><span>Game</span></a></h1>
			 </div>	
			 <div class="top-menu">	 
			     <div class="content white">
					 <nav class="navbar navbar-default">
						 <div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				
						 </div>
						 <!--/navbar header-->		
						 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							 <ul class="nav navbar-nav">
								 <li class="active"><a href="index.html">Game</a></li>	
								 <li><a href="gallery.html">Welcome</a></li>
								 <li><a href="#"><?php echo $email; ?></li>
								 <li><a class="btn btn-danger" href="logout.php">Logout</a></li>
							 </ul>
							</div>
						  <!--/navbar collapse-->
					 </nav>
					  <!--/navbar-->
				 </div>
					 <div class="clearfix"></div>
					<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
			  </div>
				 <div class="clearfix"></div>
		  </div>
		  <div class="banner-info">
			<h2>Number<span class="glyphicon glyphicon-knight" aria-hidden="true"></span><span>Game</span></h2>
		  </div>
	 </div>	 
</div>
<!---->  
<form action="webindex.php" method="POST">
<div class="content">
	 <div class="container">
		  <div class="col-md-8 content-left">
			 <div class="information">
				 <h4>Your winning number</h4>
				 <div class="information_grids">
					 <div class="info">					 
						 <p>Enter your winning number</p><br/>
						 <input type="number" name="num1" placeholder="Play" href="about.html"/><br/>
					 </div>
					 <div class="info-pic">	
						 <img src="images/Die.png" class="img-responsive" alt=""/>
					 </div>
					 <div class="clearfix"></div>
				 </div>				 
			 </div>
			<input type="submit" class="btn btn-success btn-block btn-lg" value="Play all games!!" name="play">	<br/>	
		  </div>

			</form>
		  
		  <div class="col-md-4 content-right">
			  <!-- Nav tabs -->
               <!-- Tab panes -->
              <div class="tab-content">
						<div role="tabpanel" class="tab-pane active re-pad2" id="home">
				
								
						</div>
						<div role="tabpanel" class="tab-pane re-pad2" id="profile">
								<div class="clearfix"></div>
							</div>
						</div>                   
			 </div>
			 <!---->
	
			
	 </div>
</div>
<script src="js/lightbox-plus-jquery.min.js"></script>
<!---->
<div class="footer">
	<div class="container">
		<div class="footer-grids">
<div class="copywrite">
	 <div class="container">
		 <p> © 2017 NumberGame . All rights reserved <a href="#">NumberGame</a></p></a></p>
	 </div>
</div>
<!---->

</body>
</html>