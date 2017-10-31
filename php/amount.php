
<?php
session_start();
include 'database.php';

if(isset($_POST['game'])){
   
    
    $game = $_POST['amount'];
    
    if($game){
        $phone;
        $email;
        $_SESSION['game'] = $game;
    header("Location: webindex.php");
    }

}

?>
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="../layout/styles/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed" rel="stylesheet">
    
    <title>NumberGame | Amount</title>  
</head>  
<style> 
    body{
        background-image: url("../images/demo/backgrounds/");
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
                    <form role="form" method="POST" action="amount.php">  
                        <fieldset>
                            <div class="form-group">  
                                Amount to Play <br/><input class="form-control" placeholder="Input Amount" name="amount" type="number" autofocus>  
                                <span class="text-danger"></span>
                            </div> 
                            
                            <input class="btn btn-lg btn-info btn-block" type="submit" value="Play" name="game" >  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
</html>  