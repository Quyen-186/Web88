<?php
session_start();

// Unset all of the session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to login page or any other page after logout
header("location: index.php");
exit();
?>
