<?php
// Starter en session
session_start();
// Tjekker om admin er logget ind
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: brugerside.php");
  exit;
}

// Skaber forbindelse til databasen
require_once "config.php";

// Definition af værdierne, vi skal bruge
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Tager data fra FORMS
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Tjekker om der er indtastet brugernavn
  if (empty(trim($_POST["username"]))) {
    $username_err = "Indtast dit brugernavn";
  } else {
    $username = trim($_POST["username"]);
  }

  // Tjekker om der er indtastet password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Indtast din kode";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validerer loginoplysninger med serveren
  if (empty($username_err) && empty($password_err)) {
    $sql = "SELECT id, username, password FROM login WHERE username = ?";


    // anti sql-injection - Bruger prepared statements til at forhindre hackere
    if ($stmt = mysqli_prepare($link, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $username);

      if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_store_result($stmt);

        // Tjekker om brugernavnet eksisterer i databasen. Hvis ja - tjekker herefter password
        if (mysqli_stmt_num_rows($stmt) == 1) {

          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Starter en session, hvis alle oplysninger er rigtige
              session_start();

              // Lagre data i sessionen
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Sender admin til side med bestillinger
              header("location: brugerside.php");
            } else {
              // Fejlmeddelelse hvis password er forkert
              $login_err = "Forkert brugernavn eller password";
            }
          }
        } else {
          // Fejlmeddelelse hvis password er forkert
          $login_err = "Forkert brugernavn eller password";
        }
      } else {
        echo "Hov! Der er gået noget galt. Prøv igen senere.";
      }


      mysqli_stmt_close($stmt);
    }
  }

  //Lukker forbindelsen
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="dk">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant Trendsetter - Admin login</title>
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

  <section class="login">
    <div class="wrapper-brugerlogin">
      <div class="title"><span>Login til ansatte</span></div>

      <!-- php echo html specialchars, htmlspecialchars laver alle tegn om til en string = større forhindring af hackere + forhindre SQL injections-->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row-brugerlogin">
          <input type="text" placeholder="Brugernavn" required name="username" />
        </div>
        <div class="row-brugerlogin">
          <input type="password" placeholder="Adgangskode" required name="password" />
        </div>
        <div class="btn-log">
          <a href="brugerside.php"><input type="submit" value="Login" /></a>
        </div>
      </form>
    </div>
  </section>

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
</body>

</html>