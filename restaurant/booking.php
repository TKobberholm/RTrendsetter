<?php
//Tjekker om der kan indhentes data fra vores post/form
if (!empty($_POST['name'])) {
  include_once 'config.php'; //Inkluderer vores database forbindelsesoplysninger
  $navn = htmlspecialchars($_POST['name']);
  $tlf = htmlspecialchars($_POST['telefonnr']);
  $email = htmlspecialchars($_POST['email']);
  $antal = htmlspecialchars($_POST['antal']);
  $dato = htmlspecialchars($_POST['dato']);
  $forret = htmlspecialchars($_POST['forret']);
  $hovedret = htmlspecialchars($_POST['hovedret']);
  $dessert = htmlspecialchars($_POST['dessert']);

  //Sender data til databasen og forhindre SQL injections
  $sql = "INSERT INTO `bestillinger`(`navn`, `tlf`, `email`, `antal`, `dato`, `forret`, `hovedret`, `dessert`)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; //Dette er bestemt efter om values er strings, integers osv.

  $stmt = $link->prepare($sql);
  $stmt->bind_param("sisissss", $navn, $tlf, $email, $antal, $dato, $forret, $hovedret, $dessert);
  $stmt->execute();

  //Giver gæsten besked om, at reservationen er registreret
  echo '<script type="text/javascript">alert("Tak for din reservation. Vi ses!");
    window.location.href="index.php";
    </script>';

  //reloader og lukker forbindelsen til databasen - så kan der startes forfra med nye bestillinger
  $link->close();
}
?>

<!DOCTYPE html>
<html lang="dk">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant Trendsetter - Booking af bord</title>
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
          <a href="index.php"><img src="../images/logo.png" alt="logo" width="80px" height="80px" /></a>
        </li>
        <li><a href="booking.php">Book her</a></li>
      </ul>
    </nav>
  </header>

  <div class="booking">
    <form action="<?php $_PHP_SELF ?>" method="POST">
      <label for="fname">Navn:</label><br>
      <input type="text" id="name" name="name" required><br>
      <label for="telefonnr">Telefon nr:</label><br>
      <input type="tel" id="telefonnr" name="telefonnr" value="" required><br><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br><br>
      <label for="tel">Antal gæster:</label><br>
      <input type="number" min="1" id="antal" name="antal" value="" required><br><br>
      <label for="date">Dato + klokkeslæt for ankomst</label><br>
      <input type="datetime-local" id="dato" name="dato" value="" required><br><br>
      <!-- <--- Denne linje og linjen er for at vælge både dato og tidspunkt -->
      <label for="retter">Vælg forret:</label><br>
      <select id="forret" name="forret" type="text">
        <option value="tomatsalat">Tomatsalat.....75kr</option><br>
        <option value="græskarsuppe">Græskarsuppe.....75kr</option><br>
        <option value="nachos" selected>Nachos.....75kr</option><br>

      </select><br>
      <label for="retter">Vælg hovedret:</label><br>
      <select id="hovedret" name="hovedret" type="text">
        <option value="oksemørbrad">Oksemørbrad.....125kr</option><br>
        <option value="vegetariske-tortilias">Vegetariske tortilias.....105kr</option><br>
        <option value="asiatiske-kødboller" selected>Asiatiske kødboller.....75kr</option><br>
      </select><br>
      <label for="retter">Vælg dessert:</label><br>
      <select id="dessert" name="dessert" type="text">
        <option value="jordbæris">Jordbæris.....75kr</option><br>
        <option value="karamel-cheesecake">Karamel cheesecake.....85kr</option><br>
        <option value="cheeseboard" selected>Cheeseboard.....155kr</option><br><br>

      </select><br><br>
      <input type="submit" class="btn" value="Bestil">
    </form>
  </div>

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