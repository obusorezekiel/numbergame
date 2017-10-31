<?php

session_start();
include 'database.php';

$email = $_SESSION['email'];

if(isset($_POST['hint'])){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];
    $num4 = $_POST['num4'];
    $num5 = $_POST['num5'];
    $num6 = $_POST['num6'];
    $num7 = $_POST['num7'];

$sql = "UPDATE hints SET `num1` = '$num1', `num2` = '$num2', `num3` = '$num3', `num4` = '$num4', `num5` = '$num5', `num6` = '$num6', `num7` = '$num7'  WHERE `id` = '1'";

$result = mysqli_query($cxn, $sql) or die(mysqli_connect_error($cxn));
if ($result){
    header("Location: hintsupload.php");
}
else{
    header("Location: adminindex.php");
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
                    <center><h4><?php echo $email;   ?></h4></center>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" enctype="multipart/form-data" action="hints.php">  
                        <fieldset>
            
                            
                            <div class="form-group">  
                                First Hint <br/><input class="form-control" placeholder="first hint" name="num1" type="number" autofocus> 
                                <span class="text-danger"></span> 
                            </div>  
                            <div class="form-group">  
                                Second Hint <br/><input class="form-control" placeholder="second hint" name="num2" type="number" autofocus>
                                <span class="text-danger"></span>  
                            </div> 
                            <div class="form-group">  
                                Third Hint <br/><input class="form-control" placeholder="third hint" name="num3" type="number" autofocus> 
                                <span class="text-danger"></span> 
                            </div> 
                            <div class="form-group">  
                                Fourth Hint <br/><input class="form-control" placeholder="fourth hint" name="num4" type="number" autofocus>  
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">  
                                Fifth Hint <br/><input class="form-control" placeholder="fifth hint" name="num5" type="number" autofocus>  
                                <span class="text-danger"></span>
                            </div> 
                            <div class="form-group">  
                                Sixth Hint <br/><input class="form-control" placeholder="sixth hint" name="num6" type="number" autofocus>  
                                <span class="text-danger"></span>
                            </div> 
                            <div class="form-group">  
                                Seventh Hint <br/><input class="form-control" placeholder="seventh hint" name="num7" type="number" autofocus>  
                                <span class="text-danger"></span>
                            </div> 
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Upload Hint" name="hint" >  
                        </fieldset>  
                    </form> 
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  