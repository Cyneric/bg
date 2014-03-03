<?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      session_start();

      $username = $_POST['username'];
      $passwort = $_POST['passwort'];

      $hostname = $_SERVER['HTTP_HOST'];
      $path = dirname($_SERVER['PHP_SELF']);
     
     //check login data
      if ($username == 'test' && $passwort == 'test') {
       $_SESSION['angemeldet'] = true;

       // forwarding to index
       if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        if (php_sapi_name() == 'cgi') {
         header('Status: 303 See Other');
         }
        else {
         header('HTTP/1.1 303 See Other');
         }
        }

       header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php');
       exit;
       }
      }
?>

<form action="login.php" method="post">
   Username: <input type="text" name="username" /><br />
   Passwort: <input type="password" name="passwort" /><br />
   <input type="submit" value="Anmelden" />
</form>
