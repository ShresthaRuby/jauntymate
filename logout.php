<?php
require_once("functions.php");?>
<?php 
//find the session
session_start();
// unset all session variable
$_SESSION=array();
//destroy session cookie
if(isset($_COOKIE[session_name()]))
{
    setcookie(session_name(),'',time()-42000,'/');
}
//destroy the session
session_destroy();

redirect_to("index.php");


?>