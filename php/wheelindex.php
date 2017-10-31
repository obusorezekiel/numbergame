

<html>
    <head>
        <title>HTML5 Canvas Winning Wheel</title>
        <link rel="stylesheet" href="main.css" type="text/css" />
        <script type="text/javascript" src="Winwheel.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    </head>
    <body>
        <div align="center">
            <h1>Winwheel.js example wheel - basic code wheel</h1>
            <p>Here is an example of a basic code drawn wheel which spins to a stop with the prize won alerted to the user.</p>
            <br />
            <p>Choose a power setting then press the Spin button. You will be alerted to the prize won when the spinning stops.</p>
            <br />
            <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td>
                    <div class="power_controls">
                        <br />
                        <br />
                        <table class="power" cellpadding="10" cellspacing="0">
                            <tr>
                                <th align="center">Power</th>
                            </tr>
                            <tr>
                                <td width="78" align="center" id="pw3" onClick="powerSelected(3);">High</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw2" onClick="powerSelected(2);">Med</td>
                            </tr>
                            <tr>
                                <td align="center" id="pw1" onClick="powerSelected(1);">Low</td>
                            </tr>
                        </table>
                        <br />
                        <img id="spin_button" src="spin_off.png" alt="Spin" onClick="startSpin();" />
                        <br /><br />
                        &nbsp;&nbsp;<a href="#" onClick="resetWheel(); return false;">Play Again</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(reset)
                    </div>
                </td>
                <td width="438" height="582" class="the_wheel" align="center" valign="center">
                    <canvas id="canvas" width="434" height="434">
                        <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
                    </canvas>
                </td>
            </tr>
        </table>
        <script>
            <?php
  include 'database.php';
  $sql = "SELECT num1,num2,num3,num4,num5,num6,num7 FROM hints";
  $result = mysqli_query($cxn, $sql);
  
?>
  <?php
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){

?>
            // Create new wheel object specifying the parameters at creation time.
            var theWheel = new Winwheel({
                'numSegments'  : 7,     // Specify number of segments.
                'outerRadius'  : 212,   // Set outer radius so wheel fits inside the background.
                'textFontSize' : 28,    // Set font size as desired.
                'segments'     :        // Define segments including colour and text.
                [
                   {'fillStyle' : '#eae56f', 'text' : '<?php echo $row['num1']; ?>'},
                   {'fillStyle' : '#89f26e', 'text' : '<?php echo $row['num2']; ?>'},
                   {'fillStyle' : '#7de6ef', 'text' : '<?php echo $row['num3']; ?>'},
                   {'fillStyle' : '#e7706f', 'text' : '<?php echo $row['num4']; ?>'},
                   {'fillStyle' : '#eae56f', 'text' : '<?php echo $row['num5']; ?>'},
                   {'fillStyle' : '#89f26e', 'text' : '<?php echo $row['num6']; ?>'},
                   {'fillStyle' : '#7de6ef', 'text' : '<?php echo $row['num7']; ?>'},
                ],
                'animation' :           // Specify the animation to use.
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,     // Duration in seconds.
                    'spins'    : 8,     // Number of complete spins.
                    'callbackFinished' : 'alertPrize()'
                }
            });
            <?php
              
              $num1 = $row['num1'];
              $num2 = $row['num2'];
              $num3 = $row['num3'];
              $num4 = $row['num4'];
              $num5 = $row['num5'];
              $num6 = $row['num6'];
              $num7 = $row['num7'];

              $sql2 = "SELECT num1 FROM admin";
              $result2 = mysqli_query($cxn, $sql);
            if($num1 == $result2){
                echo "<script> var stop = 52 </script>";
            }
            elseif ($num2 == $result2) {
                echo "<script> var stop = 104 </script>";
            }
            elseif ($num3 == $result2) {
                echo "<script> var stop = 156; </script>";
            }
            elseif ($num4 == $result2) {
                echo "<script> var stop = 208; </script>";
            }
            elseif ($num5 == $result2) {
                echo "<script> var stop = 260; </script>";
            }
            elseif ($num6 == $result2) {
                echo "<script> var stop = 312; </script>";
            }
            elseif ($num7 == $result2) {
                echo "<script> var stop = 364; </script>";
            }
              
            ?>
            <?php
  }
}

?>

            
            // Vars used by the code in this page to do power controls.
            var wheelPower    = 0;
            var wheelSpinning = false;


            function calculatePrice2(){
                    var stopAt = stop;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
            /*
            function calculatePrice3(){
                    var stopAt = 10;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
            function calculatePrice3(){
                    var stopAt = 10;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
            function calculatePrice4(){
                    var stopAt = 10;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
            function calculatePrice5(){
                    var stopAt = 10;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
            function calculatePrice6(){
                    var stopAt = 10;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
            function calculatePrice7(){
                    var stopAt = 10;
                    myWheel.animation.stopAngle = stopAt;
                    myWheel.startAnimation();
            }
                */

            
            // -------------------------------------------------------
            // Function to handle the onClick on the power buttons.
            // -------------------------------------------------------
            function powerSelected(powerLevel)
            {
                // Ensure that power can't be changed while wheel is spinning.
                if (wheelSpinning == false)
                {
                    // Reset all to grey incase this is not the first time the user has selected the power.
                    document.getElementById('pw1').className = "";
                    document.getElementById('pw2').className = "";
                    document.getElementById('pw3').className = "";
                    
                    // Now light up all cells below-and-including the one selected by changing the class.
                    if (powerLevel >= 1)
                    {
                        document.getElementById('pw1').className = "pw1";
                    }
                        
                    if (powerLevel >= 2)
                    {
                        document.getElementById('pw2').className = "pw2";
                    }
                        
                    if (powerLevel >= 3)
                    {
                        document.getElementById('pw3').className = "pw3";
                    }
                    
                    // Set wheelPower var used when spin button is clicked.
                    wheelPower = powerLevel;
                    
                    // Light up the spin button by changing it's source image and adding a clickable class to it.
                    document.getElementById('spin_button').src = "spin_on.png";
                    document.getElementById('spin_button').className = "clickable";
                }
            }
            
            // -------------------------------------------------------
            // Click handler for spin button.
            // -------------------------------------------------------
            function startSpin()
            {
                // Ensure that spinning can't be clicked again while already running.
                if (wheelSpinning == false)
                {
                    // Based on the power level selected adjust the number of spins for the wheel, the more times is has
                    // to rotate with the duration of the animation the quicker the wheel spins.
                    if (wheelPower == 1)
                    {
                        theWheel.animation.spins = 3;
                    }
                    else if (wheelPower == 2)
                    {
                        theWheel.animation.spins = 8;
                    }
                    else if (wheelPower == 3)
                    {
                        theWheel.animation.spins = 15;
                    }
                    
                    // Disable the spin button so can't click again while wheel is spinning.
                    document.getElementById('spin_button').src       = "spin_off.png";
                    document.getElementById('spin_button').className = "";
                    
                    // Begin the spin animation by calling startAnimation on the wheel object.
                    theWheel.startAnimation();
                    
                    // Set to true so that power can't be changed and spin button re-enabled during
                    // the current animation. The user will have to reset before spinning again.
                    wheelSpinning = true;
                }
            }
            
            // -------------------------------------------------------
            // Function for reset button.
            // -------------------------------------------------------
            function resetWheel()
            {
                theWheel.stopAnimation(false);  // Stop the animation, false as param so does not call callback function.
                theWheel.rotationAngle = 0;     // Re-set the wheel angle to 0 degrees.
                theWheel.draw();                // Call draw to render changes to the wheel.
                
                document.getElementById('pw1').className = "";  // Remove all colours from the power level indicators.
                document.getElementById('pw2').className = "";
                document.getElementById('pw3').className = "";
                
                wheelSpinning = false;          // Reset to false to power buttons and spin can be clicked again.
            }
            
            // -------------------------------------------------------
            // Called when the spin animation has finished by the callback feature of the wheel because I specified callback in the parameters.
            // -------------------------------------------------------
            function alertPrize()
            {
                // Get the segment indicated by the pointer on the wheel background which is at 0 degrees.
                var winningSegment = theWheel.getIndicatedSegment();
                
                // Do basic alert of the segment text. You would probably want to do something more interesting with this information.
                alert("You have won " + winningSegment.text);
            }
        </script>
    </body>
</html>