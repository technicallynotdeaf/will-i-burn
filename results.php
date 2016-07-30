<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Will I Burn? Govhack 2016">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png"> 

    <title>Will I Burn? | Govhack Unleashed 2016</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
         File Not included in version of bootstrap downloaded?
    <link href="bootstrap-3.3.7-dist/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.7-dist/css/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7-dist/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php include 'navbar.php' ?>
    <div class="container">

      <div class="starter-template">
	    <?php include 'query_fns.php'?>
	    <h1>Results Page </h1>
            <p class="lead"> Please wait while this loads... </p>

	    <?php 

               $required_fields_present = true;
               // Argument validation... 
               if(isset($_GET["region"]))
			$region = $_GET["region"];
		else
		{
			$region = 0;
			$required_fields_present = false;
		}	
               //$region = $_GET["region"];

               //$month = $_GET["month"];
               if(isset($_GET["month"]))
			$month = $_GET["month"];
		else
		{
			$month = 0;
			$required_fields_present = false;
		}	

               //$temp = $_GET["temp"];
               $backburning = isset($_GET["backburning"]) ? $_GET["backburning"] : 0;

               $hot_days = isset($_GET["hot_days"]) ? $_GET["hot_days"] : 0;
               //$hot_days = $_GET["hot_days"];

               //$backburning = $_GET["backburning"];
               $backburning = isset($_GET["backburning"]) ? $_GET["backburning"] : 0;

               echo "<p> Region: "+get_region_name($region)+" </p>";
               echo "<p> Month: $month </p>";
               echo "<p> Month: $temp </p>";
               echo "<p> # of hot days: $hot_days </p>";
               echo "<p> Backburning: $backburning </p>";

		if(!required_fields_present)
		{
			echo "<h1> <span class=\"label label-warning\">";
			echo "Required fields missing, couldn't model data. Try again?";
		}
		else
		{
		       $historical_odds = chance_of_fire($region, $month, $temp, $hot_days, $backburning);
	       echo "<h1> Chance of fire: </h1>";
	       echo "<h1> <span class=\"label label-danger\"> $historical_odds % </span> </h1>";
		}
	    ?>

      </div>

	<?php include 'input_form.php' ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-3.3.7-dist/js/jquery.min.js"><\/script>')</script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


