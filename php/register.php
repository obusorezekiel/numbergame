<?php
include 'database.php';
session_start();
if (isset($_POST['register'])){
    $name = mysqli_real_escape_string($cxn, $_POST['name']);
    $user_email = mysqli_real_escape_string($cxn, $_POST['email']);
    $phone = mysqli_real_escape_string($cxn, $_POST['phone']);
    $password = mysqli_real_escape_string($cxn, $_POST['password']);
    $dob = mysqli_real_escape_string($cxn, $_POST['dateofbirth']);
    $cryptpass = md5($password);
    
    if($cryptpass == ""){
        header("Location: register.php");
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        header("Location: register.php");
    }
        else{
        $sql =  "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($cxn, $sql);
    
            if(mysqli_num_rows($result) > 0){ 
            header("Location: register.php");
    }
    }

     $query = "INSERT INTO users(`name`, `email`, `phone`, `password`, `category`) VALUES('".$name."', '".$user_email."', '".$phone."', '".$cryptpass."', 'users')";
     $result2 = mysqli_query($cxn, $query);
     if($result2){
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $user_email;
            header("Location: amount.php");
     }
     
}
 

?>



<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="../layout/styles/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    
    <title>NumberGame | Signup</title>  
</head>  
<style> 
    body{
        background-image: url("../images/demo/backgrounds/ugur.jpg");
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
                    <form role="form" method="post" enctype="multipart/form-data" action="register.php">  
                        <fieldset>
            
                            
                            <div class="form-group">  
                                Name* <br/><input class="form-control" placeholder="Full Name(Surname first)" name="name" type="text" autofocus> 
                                <span class="text-danger"></span> 
                            </div>  
                            <div class="form-group">  
                                Email* <br/><input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                                <span class="text-danger"></span>  
                            </div> 
                            <div class="form-group">  
                                Phone Number* <br/><input class="form-control" placeholder="Phone Number" name="phone" type="number" autofocus> 
                                <span class="text-danger"></span> 
                            </div> 
                            <div class="form-group">  
                                Password* <br/><input class="form-control" placeholder="Password" name="password" type="password" autofocus>  
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">  
                                Date of Birth* <br/><input class="form-control" placeholder="Date of Birth" name="dateofbirth" type="date" autofocus>  
                                <span class="text-danger"></span>
                            </div> 
                            
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Register" name="register" >  
                        </fieldset>  
                    </form>  
                    <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  