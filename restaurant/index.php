<!DOCTYPE html>
<html lang="dk">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant Trendsetter</title>
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

  <section class="hero">
    <p>Velkommen til</p>
    <h1>Restaurant Trendsetter</h1>
    <button class="btn"><a href="booking.php">Bestil bord</a></button>
  </section>

  <section class="focusedmeals">
    <h2>Vores speciale retter</h2>
    <div class="row">
      <div class="col">
        <div class="card">
          <h3>Forret</h3>
          <a href="menu.php"><img src="images/luisa-brimble-vIm26fn_QKg-unsplash-min.png"
              alt="forret af tomatsalat" /></a>
          <h4>Tomatsalat</h4>
          <p>
            Lækker tomatsalat med mozarella og brød croutaner, krydret i ens
            let peber/citrondressing og frisk basillikum
          </p>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <h3>Hovedret</h3>
          <a href="menu.php"><img src="images/eugene-Xk0jQPZseMk-unsplash-min.png" alt="hovedret af oksemørbrad" /></a>
          <h4>Oksemørbrad</h4>
          <p>
            Oksemørbrad på panderistet sæson grønsager, med to purer af
            gulerod og rødbeder
          </p>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <h3>Dessert</h3>
          <a href="menu.php"><img src="images/aliona-gumeniuk-GAauSStia3s-unsplash-min.png"
              alt="dessert af karamel cheesecake" /></a>
          <h4>Karamel cheesecake</h4>
          <p>
            Karamel cheesecake med bund af digestivekiks, serveres med en
            hjemmelavet rumkaramelsovs og revet chokolade 70%.
          </p>
        </div>
      </div>
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