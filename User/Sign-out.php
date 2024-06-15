<?php
session_start();

// Unset all of the session variables
$_SESSION = [];

// Free all session variables
session_unset();

// Finally, destroy the session
session_destroy();

// Redirect to login page or any other page after logout
header("location: index.php");
exit();
?>