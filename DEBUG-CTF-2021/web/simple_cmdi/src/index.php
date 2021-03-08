<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>welcome!</title>
  </head>
  <body>
    <h1>PLZ..attack me</h1>
    <div>
	<form class="form-inline" action="" method="GET">
		<h5>$ ls -l</h5>
		<div class="form-group mb-2">
			<input type="text" class="form-control" name="cmd" required>
		</div>
		<button type="submit" class="btn btn-primary mb-2">cmd</button>
	</form>
    </div>


  </body>
</html>


<?php
//debugCTF{C0MM@ND_1NJ3CT10N_1S_S0_C001}
//
//
$cmd = "";
$ip = $_GET['cmd'];
if(preg_match("/cat|bin|\\\|\||&|more|nl|tail|head|\^|flag|index|php|less|ls|\*|<|>|\\$|`/i", $ip)){
	echo "no Hack";
	exit(1);
}
if(isset($_GET['cmd'])) {
	$cmd = system('ls -l '.$_GET['cmd']);
}
echo $cmd;
?>
