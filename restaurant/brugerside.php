<?php
// Start en session
session_start();

// Tjekker om admin er logget ind. Redirecter til loginsiden, hvis ikke logget ind
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

//Opretter forbindelse til databasen
require_once "config.php";

//Setup af bestillinger, der bliver vist
$select = "select * from bestillinger ORDER BY id";
$query = $link->query($select);
$link->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant Trendsetter - Bestillinger</title>
  <link rel="stylesheet" href="main.css" />
</head>

<body>
  <header>
    <nav class="topnav">
      <ul>
        <li>Reservation: +45 00 00 00 00</li>
        <li>
          <a href="brugerlogin.php">
            <img src="images/brugerlogin-01.png" alt="login bruger ikon" width="30px" height="30px" />
          </a>
        </li>
        <li><a href="logout.php"> Log ud </a></li>
      </ul>
    </nav>

    <nav class="menu">
      <ul>
        <li><a href="menu.php">Menu</a></li>
        <li>
          <a href="index.php"><img src="images/logo.png" alt="logo" width="80px" height="80px" /></a>
        </li>
        <li><a href="booking.php">Book her</a></li>
      </ul>
    </nav>
  </header>


  <?php

  $num = mysqli_num_rows($query);
  if ($num > 0) {
    while ($result = mysqli_fetch_assoc($query)) {
      echo "<div class='row'>
      <div class='col'>
      <div class='cardbestil'>
        <p>Navn: " . $result["navn"] . "</p>
        <p>tlf: " . $result["tlf"] . "</p>
        <p>email: " . $result["email"] . "</p>
        <p>antal: " . $result["antal"] . "</p>
        <p>dato: " . $result["dato"] . "</p>
        <p>forret: " . $result["forret"] . "</p>
        <p>hovedret: " . $result["hovedret"] . "</p>
        <p>dessert: " . $result["dessert"] . "</p>
        <br>
        <br>
        </div>
        </div>
        </div>

    ";

    }
  }
  ?>

<footer>
    <div class="row-footer">
      <div class="col-footer">
        <ul>
          <li>
            <h3>Kontakt os</h3>
          </li>
          <li>Adresse: Fup 123, 7400 Herning</li>
          <li>Telefon: +45 00 00 00 00</li>
          <li>E-mail: info@R-Trendsetter.dk</li>
        </ul>
        <ul>
          <br />
          <li>
            <h4>Links</h4>
          </li>
          <li>Cookiepolitik</li>
          <li>Vilkår og betingelser</li>
        </ul>
      </div>
      <div class="col-footer">
        <img src="images/logo.png" alt="Restraurant Trendsetters logo" height="200px" width="200px" />
      </div>
      <div class="col-footer">
        <ul>
          <h3>Åbningstider</h3>
          <li>Mandag..........16:00-21:00</li>
          <li>Tirsdag...........16:00-21:00</li>
          <li>Onsdag...........16:00-21:00</li>
          <li>Fredag............16:00-21:00</li>
          <li>Lørdag............16:00-21:00</li>
          <li>Søndag...........16:00-21:00</li>
        </ul>
      </div>
    </div>
    <p>Dette site er kun til eksamensbrug</p>
  </footer>
  </div>

</body>

</html>