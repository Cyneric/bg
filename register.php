<?php ?>
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
<body>
	<div class="container">   	
		<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        	<div class="panel panel-info" style="border-color:black">
            	<div class="panel-heading" style="background-color:black;color:white;border-color:black">
                	<div class="panel-title">Registrieren:</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Einloggen</a></div>
                </div>  
                <div class="panel-body" >
                	<form action="login.php" id="signupform" class="form-horizontal" role="form">          
	               		<div id="signupalert" style="display:none" class="alert alert-danger">
	                    	<p>Error:</p>
	                         <span></span>
	                    </div>     
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
	                        	<input type="password" class="form-control" name="pass" placeholder="Passwort">
	                        </div>
	                    </div>
	                    <div class="form-group">                                     
	                    	<div class="col-md-offset-3 col-md-9">
	                        	<button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Registrieren</button>
	                        </div>
	                    </div>       
               		</form>
            	</div>
        	</div>              
    	</div> 
    </div>	
</body>    