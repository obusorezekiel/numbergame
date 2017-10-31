<?php
session_start();
include 'database.php';

if(isset($_POST['adminlogin'])){
$admin_email = mysqli_real_escape_string($cxn, $_POST['admin_email']);
$admin_pass = mysqli_real_escape_string($cxn, $_POST['admin_pass']);
$cryptpass = md5($admin_pass);

$sql = "SELECT * FROM users WHERE email = '$admin_email' AND password = '$cryptpass' AND category = 'admin'";
$result = mysqli_query($cxn, $sql);
if(mysqli_num_rows($result) > 0){
    $_SESSION['email'] = $admin_email;
    header('Location: adminindex.php');
}
else{
    header('Location: adminlogin.php');
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
        background-image: url("../images/demo/backgrounds/num3.jpg");
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
                    <center><h1><b>NumberGame</b></h1></center>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" enctype="multipart/form-data" action="adminlogin.php">  
                        <fieldset>
             
                            <div class="form-group">  
                                Admin Email* <br/><input class="form-control" placeholder="Email" name="admin_email" type="email" autofocus>
                                <span class="text-danger"></span>  
                            </div> 
                            <div class="form-group">  
                                Admin Password* <br/><input class="form-control" placeholder="Password" name="admin_pass" type="password" autofocus>  
                                <span class="text-danger"></span>
                            </div>
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Admin Login" name="adminlogin" >  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  