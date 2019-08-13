<?php

// Inialize session
session_start();

session_destroy ();

// Delete all session variables
// session_destroy();

// Jump to login page
header('Location: http://192.168.64.2/project/index.php');

?>