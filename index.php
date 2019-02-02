<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<meta charset="UTF-8" name="viewport" content="width=device-width"/>
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/js.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
	</div>
	<ul class="nav nav-tabs nav-justified">
		<li><a id="simple" href="#simple">Simple example</a></li>
		<li class="active"><a id="notsimple" href="#block_notsimple">Complex example</a></li>
	</ul>
</nav>
<div class="container">
	<div class="row">
		<?php include_once( "notsimple.php" ) ?>
		<?php include_once( "simple.php" ) ?>
	</div>
</div>
</div>
</body>
</html>