<?php
include 'php/database.php';
?>
<!DOCTYPE html>
<!--
Template Name: Nonuxor
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>NumberGame | Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/numm.jpg');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <h1><a href="index.html">Numbergame | Home</a></h1>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="php/login.php"><i class="fa fa-gamepad"></i> Play</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <!-- ################################################################################################ -->
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article class="introtxt">
      <h2 class="heading">Numbergame</h2>
      <p>Testing your skills through numbers</p>
      <footer><a class="btn btn-primary" href="php/login.php"><i class="fa fa-gamepad"> Play</i></a></footer>
    </article>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->



<div id="wrapper">
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
      <!-- ################################################################################################  -->
    <div class="group center">
      <article class="one_quarter first"><i class="icon fa fa-paypal"></i>
        <h4 class="font-x1"><a href="#">Paypal Integration</a></h4>
        <p>Fully supported with Paypal integration API to support your payment procedures in the game</p>
      </article>
      <article class="one_quarter"><i class="icon fa fa-gamepad"></i>
        <h4 class="font-x1"><a href="#">Ease of Play</a></h4>
        <p>It is very easy to play, fast and afffordable. Give it a try now</p>
      </article>
      <article class="one_quarter"><i class="icon fa fa-paper-plane"></i>
        <h4 class="font-x1"><a href="#">Fun</a></h4>
        <p>A game built with love, make money while having fun.</p>
      </article>
      <article class="one_quarter"><i class="icon fa fa-check"></i>
        <h4 class="font-x1"><a href="#">Trusted by users</a></h4>
        <p>It is trusted by users around the world, no illegal or fradulent activity is allowed</p>
      </article>
    </div>
    <!-- main body -->
    <div class="clear"></div>
  </main>
</div>
</div>
<?php
  $sql2 = "SELECT num1 FROM admin";
  $result2 = mysqli_query($cxn, $sql2);
  while($row = mysqli_fetch_array($result2)){
    $num = $row['num1'];
  

?>
<div class="wrapper row31">
  <section id="latest" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h1 class="heading">Last week's winning number</h2>
    </div>
    <div class="center btmspace-50">
      <h1><?php echo $num; ?></h1>
    </div>
  </section>
</div>
<?php
  }

?>





<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section id="latest" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h2 class="heading">Possible winning numbers</h2>
    </div>
    <ul class="nospace group">
<?php
  $sql = "SELECT num1,num2,num3,num4,num5,num6,num7 FROM hints";
  $result = mysqli_query($cxn, $sql);
  
?>

<table>
    <tr>
    <th>First Hint</th>
	  <th>Second Hint</th>
	  <th>Third Hint</th>
	  <th>Fourth Hint</th>
	  <th>Fifth Hint</th>
	  <th>Sixth Hint</th>
	  <th>Seventh Hint</th>
  </tr>
  <tr>
  <?php
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){

?>

    <td><?php echo $row['num1'];  ?></td>
	  <td><?php echo $row['num2']; ?></td>
	  <td><?php echo $row['num3']; ?></td>
	  <td><?php echo $row['num4']; ?></td>
	  <td><?php echo $row['num5']; ?></td>
	  <td><?php echo $row['num6']; ?></td>
	  <td><?php echo $row['num7']; ?></td>
  </tr>
</table>
    </ul>
  </section>
</div>
  <?php
  }
}

?>

<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved | <a href="#">NumberGame</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>