<?php 
include 'database.php';
session_start();


if(isset($_POST['check'])){
    $user_email = mysqli_real_escape_string($cxn, $_POST['email']);
    $user_pass = mysqli_real_escape_string($cxn, $_POST['password']);
    
    $cryptpass = md5($user_pass);
    
    $check_user= "SELECT * FROM users WHERE email = '$user_email' AND password = '$cryptpass'";
    $run = mysqli_query($cxn, $check_user);
    
    if(mysqli_num_rows($run) > 0){
        $_SESSION['email'] = $user_email;
        header("Location: wheelindex.php");
    }
    else{
        header("Location: check.php");
    }

}

?>




<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="../layout/styles/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    
    <title>NumberGame | Login</title>  
</head>  
<style> 
    body{
        background-image: url("../images/demo/backgrounds/num4.jpg");
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
                    <center><h1><b>Check Result</b></h1></center>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" enctype="multipart/form-data" action="check.php">  
                        <fieldset>
             
                            <div class="form-group">  
                                Email* <br/><input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                                <span class="text-danger"></span>  
                            </div> 
                            <div class="form-group">  
                                Password* <br/><input class="form-control" placeholder="Password" name="password" type="password" autofocus>  
                                <span class="text-danger"></span>
                            </div>
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Check Results" name="check" >  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  