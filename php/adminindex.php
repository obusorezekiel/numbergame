
<?php
session_start();
include 'database.php';
$email = $_SESSION['email'];

if(isset($_POST['conditional'])){

$num1 = $_POST['num1'];

$sql = "UPDATE admin SET `email` = '$email', `num1` = '$num1', spin = 'conditional' WHERE `id` = '1'";
$result = mysqli_query($cxn, $sql);
	if($result){
	$_SESSION['num1'] = $num1;
	header('Location: conditional.php');
}
	else{
	header('Location: adminindex.php');
}

}



if(isset($_POST['normal'])){
$sql_ = "SELECT num1,num2,num3,num4,num5,num6,num7 FROM hints";
$result_ = mysqli_query($cxn, $sql_);
if(mysqli_num_rows($result_) > 0){
	while($row = mysqli_fetch_array($result_)){
  
$num1 = $row['num1'];
$num2 = $row['num2'];
$num3 = $row['num3'];
$num4 = $row['num4'];
$num5 = $row['num5'];
$num6 = $row['num6'];
$num7 = $row['num7'];



$normal = array($num1,$num2,$num3,$num4,$num5,$num6,$num7);
$rand_num = array_rand($normal,3);
$print = $normal[$rand_num[0]];

	}
}
$sql1 = "UPDATE admin SET `email` = '$email', `num1` = '$print', spin = 'normal' WHERE `id` = '1'";;
$result1 =  mysqli_query($cxn, $sql1);
	if($result1){
	$_SESSION['num1'] = $print;
	header('Location: normal.php');
}
	else{
	header('Location: adminindex.php');
}

}


if(isset($_POST['export'])){
	$fileName = "users";
	$sql2 = "SELECT * FROM num_input";
	$result2 = mysqli_query($cxn,$sql2) or die("Error");
	
	$file = fopen($fileName.".csv", 'w');


	$fdata = "";

	while($row = mysqli_fetch_array($result2)){
		$email = $row['email'];
		$phone = $row['phone'];
		$game = $row['game_played'];
		$number = $row['num1'];
		$fdata = $fdata.$email ."," . $phone ."," . $game ."," . $number ."\n";

	} 
		fwrite($file, "Email, Phone, Game, Number " . "\n".$fdata);
		fclose($file);
	
}
		echo "<p><a href=users.csv>Click Here to download</a></p>"; 




?>
<!DOCTYPE HTML>
<html>
<head>
<title>NumberGame | Admin </title>

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
						<li></li>
						<li></li>
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
								 <li><a href="#"><?php echo $email; ?></li>
								 <li><a class="btn btn-danger btn-sm" href="adminlogout.php">Logout</a></li>
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
<form action="adminindex.php" method="POST">
			<div class="information">
				<h4>Generate weekly random number Week <?php echo date('W');  ?> </h4>
				<input type="submit" class="btn btn-info" value="Normal spin" name="normal">
				<input type="submit" class="btn btn-default" value="Export" name="export"><br/>
				<div class="information_grids">
					<div class="info">					 
						<p>Conditional Spin</p>
						<input type="number" name="num1" placeholder="Play" href="about.html"/><br/>
					<div class="clearfix"></div>
				</div>	
			</div>
			<a href="hints.php" class="btn btn-primary">Weekly hints</a>
			<input type="submit" class="btn btn-success" value="Conditional spin" name="conditional"><br/>
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
		 <p> © 2017 NumberGame . | All Rights Reserved <a href="#">NumberGame</a></p></p>
	 </div>
</div>
<!---->

</body>
</html>