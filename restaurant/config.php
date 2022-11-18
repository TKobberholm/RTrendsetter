<?php
/* Database oplysninger */
define('DB_SERVER', 'mysql26.unoeuro.com');
define('DB_USERNAME', 'kobberholmdesign_dk');
define('DB_PASSWORD', 'RgdkpcaD94yH');
define('DB_NAME', 'kobberholmdesign_dk_db_restaurant');
 
/* Prøv og connect til databasen */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Tjek om vi er connected
if($link === false){
    die("ERROR: Kunne ikke connecte. " . mysqli_connect_error());
}
?>
