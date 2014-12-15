<?php
session_start();
unset($_SESSION);
$_session= array();
define('TITLE', 'Logout');
session_destroy();

header ("Location: index.php");
?>


