<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$error = FALSE;
	$success = FALSE;

	if(!empty($_POST['user']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['pass'])){
		
		$insert = TRUE;
		
		$con = mysqli_connect("localhost","root","root","browsergame");
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$user = mysqli_real_escape_string($con, $_POST['user']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$first_name = mysqli_real_escape_string($con, $_POST['firstname']);
		$last_name = mysqli_real_escape_string($con, $_POST['lastname']);
		$pass = mysqli_real_escape_string($con, $_POST['pass']);
		
		if (strlen($_POST['user'])>10 || strlen($_POST['user'])<3){
			$insert = FALSE;
			$error = TRUE;
			$reason = "Der Benutzername muss zwischen 3 und 10 Zeichen lang sein!";
		}
		
		if (strlen($_POST['firstname'])>15 || strlen($_POST['firstname'])<3){
			$insert = FALSE;
			$error = TRUE;
			$reason = "Der Vorname muss zwischen 3 und 15 Zeichen lang sein!";
		}
		
		if (strlen($_POST['lastname'])>15 || strlen($_POST['lastname'])<3){
			$insert = FALSE;
			$error = TRUE;
			$reason = "Der Nachname muss zwischen 3 und 15 Zeichen lang sein!";
		}
		
		if(preg_match("/[^a-zA-Z0-9]/",$_POST['user'])) {
			$insert = FALSE;
			$error = TRUE;
			$reason = "Der Benutzername darf nur Buchstaben und Zahlen enthalten!";
		}
		
		if(!preg_match("/[@]/",$_POST['email'])) {
			$insert = FALSE;
			$error = TRUE;
			$reason = "Bitte geben sie eine g&uuml;ltige Email-Adresse ein!";
		}
		
		if (strlen($_POST['pass'])>16 || strlen($_POST['pass'])<6){
			$insert = FALSE;
			$error = TRUE;
			$reason = "Das Passwort muss zwischen 6 und 16 Zeichen lang sein!";
		}
		
		//check if user already exist
		$result = mysqli_query($con,"SELECT * FROM account WHERE username = '$user'");
		
		while($row = mysqli_fetch_array($result)){
			if(!empty($row['username'])){
				$error = TRUE;
				$insert = FALSE;
				$reason = "Benutzername wird bereits verwendet!";
			}
		}
		
		if($insert == TRUE){
			mysqli_query($con,"INSERT into account (username, password, email, first_name, last_name) VALUES ('$user', '$pass', '$email', '$first_name', '$last_name')");
			$success = TRUE;
		}
		
		mysqli_close($con);
		
	}
	else{
		$error = TRUE;
		$reason = "Bitte alle Felder ausf&uuml;llen!";
	}

}
?>
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
	<style>
		a:link { color: grey; } 
		a:visited { color: grey; } 
		a:hover { color: grey; } 
		a:active { color: grey; } 
	</style>
</head>
<?php if($success == FALSE){ ?>
<body>
	<div class="container" style="margin-top:10%;">   	
		<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        	<div class="panel panel-info" style="border-color:black">
            	<div class="panel-heading" style="background-color:black;color:white;border-color:black">
                	<div class="panel-title">Registrieren:</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Einloggen</a></div>
                </div>  
                <div class="panel-body">
                	<form action="register.php" method="post" id="signupform" class="form-horizontal" role="form">          
	               		<?php if($error == TRUE){ echo"
	               		<div id='signupalert' class='alert alert-danger'>
	                    	<p>Fehler: ".$reason."</p>
	                         <span></span>
	                    </div>";
						}?>
						<?php if($success == TRUE){ echo"
	               		<div id='signupalert' class='alert alert-success'>
	                    	<p>Benutzer wurde erstellt, sie k&ouml;nnen sich jetzt anmelden!</p>
	                         <span></span>
	                    </div>";
						}?>
	                    <div class="form-group">
	                    	<label for="email" class="col-md-3 control-label">Benutzername</label>
	                        <div class="col-md-9">
	                        	<input type="text" class="form-control" name="user" placeholder="Benutzername">
	                        </div>
	                   	</div>                
	                    <div class="form-group">
	                    	<label for="email" class="col-md-3 control-label">Email</label>
	                        <div class="col-md-9">
	                        	<input type="text" class="form-control" name="email" placeholder="Email Addresse">
	                        </div>
	                   	</div>               
	                    <div class="form-group">
	                    	<label for="firstname" class="col-md-3 control-label">Vorname</label>
	                        <div class="col-md-9">
	                        	<input type="text" class="form-control" name="firstname" placeholder="Vorname">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                       <label for="lastname" class="col-md-3 control-label">Nachname</label>
	                    	<div class="col-md-9">
	                        	<input type="text" class="form-control" name="lastname" placeholder="Nachname">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                    	<label for="password" class="col-md-3 control-label">Passwort</label>
	                        <div class="col-md-9">
	                        	<input type="text" class="form-control" name="pass" placeholder="Passwort">
	                        </div>
	                    </div>
	                    <div class="form-group">                                     
	                    	<div class="col-md-offset-3 col-md-9">
	                        	<button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Registrieren</button>
	                        </div>
	                    </div>       
               		</form> 
            	</div>
        	</div>              
    	</div> 
    </div>
</body>    
<?php } ?>
<?php if($success == TRUE){ ?>
<meta http-equiv="refresh" content="10; URL=login.php">
<style>
		a:link { color: #31CDF5; } 
		a:visited { color: #31CDF5; } 
		a:hover { color: #31CDF5; } 
		a:active { color: #31CDF5; } 
</style>
<body>
	<div class="container" style="margin-top:20%;">   
		<div id='signupalert' class='alert alert-success'>
			<p align="center">Benutzer wurde erstellt, sie k&ouml;nnen sich jetzt anmelden!</p>
			<br>
			<p align="center">Klicken sie <a href="login.php">hier</a>, oder warten sie bis sie automatisch weitergeleitet werden.</p>
			<span></span>
		</div>
	</div>
</body>		
<?php } ?>