<?php
// Starter en session
session_start();

// Fjerner alle sessionens variabler
$_SESSION = array();

// Ødelægger/slutter sessionen
session_destroy();

// Redirect til forsiden
header("location: index.php");
exit;
?>