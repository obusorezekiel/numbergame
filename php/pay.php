<?php
include 'database.php';
session_start();


if(isset($_POST['login'])){
    $user_email = mysqli_real_escape_string($cxn, $_POST['email']);
    $user_pass = mysqli_real_escape_string($cxn, $_POST['password']);
    
    $cryptpass = md5($user_pass);
    
    $check_user= "SELECT * FROM users WHERE email = '$user_email' AND password = '$cryptpass'";
    $run = mysqli_query($cxn, $check_user);
    
    if(mysqli_num_rows($run) > 0){
        $_SESSION['email'] = $user_email;
        header("Location: webindex.php");
    }
    else{
        header("Location: login.php");
    }

}



?>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="../layout/styles/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    
    <title>NumberGame | Pay</title>  
</head>  
<style> 
    body{
        background-image: url("../images/demo/backgrounds/pay.jpg");
    } 
    .login-panel {  
        margin-top: 150px;  
    }
    .header
    {
    background: #4682b4;
    height:70px;
    }
    .logo
    {
    font-family:'typo';
    font-size:35px;
    color:#fff;;
    margin:15px;
    }

    .title1{
    font: 16px "Century Gothic", "Times Roman", sans-serif;
    color: #fff;
    }
    .title2{
    font-family: 'Ubuntu', sans-serif;
    font-size:20px;
}
    center h1{
        font-family: 'Saira Semi Condensed', sans-serif;
    }
</style>  
<body> 
    
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <center><img src="../images/demo/backgrounds/paypal.jpg" </center>  
                </div>  
                <div class="panel-body">  
                    <center>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="JWYKHSKTCVUML">
                <table>
                    <tr><td><input type="hidden" name="on0" value="Input your game amount">Input your game amount</td></tr><tr><td><input class="form-control"  type="text" name="os0" maxlength="200"></td></tr>
                </table>
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form> 
        <center>
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  