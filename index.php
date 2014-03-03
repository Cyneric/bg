<?php include('auth.php'); ?>
<!DOCTYPE html>				
<html lang="de">															
<head>		
	<meta charset="utf-8">
	<title></title>	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="images/favicon.png" type="image/png" />
	<link rel="icon" href="images/favicon.png" type="image/png" />
</head>

<body>
	<nav class="navbar navbar-inverse" role="navigation" style="-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;">
  		<ul class="nav navbar-nav navbar-right" style="margin-right:20px;">
	    	<li class="dropdown">
		      	<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'] ?><b class="caret"></b></a>
		       	<ul class="dropdown-menu">
		        	<li><a href="logout.php">Abmelden</a></li>
		       	</ul>
	  		</li>
    	</ul>     
	</nav>
</body>
</html>​