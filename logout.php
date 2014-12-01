<?php
session_start();
unset($_SESSION);
$_session= array();
define('TITLE', 'Logout');
session_destroy();
?>
<h2> You are now logged out.</h2>
<h3><a href="index.php">Back to the index.</a></h3>
