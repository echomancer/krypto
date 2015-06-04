<?php
/*
File: index.php
Programmer: Jason Perkins
Purpose: Display text input form which then submits back to this page the text. 
Then it converts it to hex and displays each hex character as box with lines for each side.
*/

require_once("functions.php");  // Contains all functions needed for conversion
$input = isset($_REQUEST['text-input']) ? $_REQUEST['text-input'] : ''; // Set up the input from the form
$hex = strToHex($input);        // Convert it into a hex string
$output = convert($hex);        // Convert the hex string into div representations
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Krypto the wonder program</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="content">
        <form id="text-form" name="text-form" action="index.php" method="post" role="form">
          <div class="form-group">
            <label for="text-input">Text to Convert</label>
            <textarea id="text-input" name="text-input" class="form-control"><?php echo $input ?></textarea>
          </div>
          <button type="submit" id="submit-button" name="submit-button" class="btn btn-primary btn-large">Kryptonize</button>
          <button type="button" id="clear" name="clear" class="btn btn-default btn-large">Clear</button>
        </form>
        </br>
        <div id="output-content">
          <?php echo $output; ?>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        var height = $(".container").width()/12;
        //height = 100;
        //var heightStr = height+"px";
        $(".box").each(function(){
          $(this).height(height);
        });
        $("#clear").on("click", clear);
      });

      function clear(){
        $("#text-input").html("");
      }
    </script>
  </body>
</html>