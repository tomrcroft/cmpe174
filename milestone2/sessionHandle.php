<?php
include 'DBconstants.php';
  
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

 $username = $_SESSION['username'];
 //echo "before username:" . $username;
 
 session_write_close();

		
	session_set_save_handler("open", "close", "read", "write", "destroy", "garbage");
	
	function open($path, $name) {
    global $con;
	global $username;
 
    $sql = "INSERT INTO session SET session_id ='$username', session_data='' ON DUPLICATE KEY UPDATE session_lastaccesstime = NOW();";

    $result = mysqli_query($con, $sql);   
}

function read($sessionId) { 
    global $con;
	global $username;
 
    $sql = "SELECT session_data FROM session where session_id ='$username';";
    $result = mysqli_query($con, $sql);
    $resultArray = mysqli_fetch_array($result, MYSQLI_BOTH);
 
    return $resultArray[0];
}

function write($sessionId, $data) { 
    $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
	global $username;
 
    $sql = "INSERT INTO session SET session_id ='$username', session_data ='$data' ON DUPLICATE KEY UPDATE session_data ='$data';";
    $result = mysqli_query($con, $sql);
}

function close() {
    //nothing
}

function destroy($sessionId) {
    //nothing
}

function garbage($lifetime) {
    //nothing
}

session_start();
?>
