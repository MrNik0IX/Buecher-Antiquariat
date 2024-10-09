<?php
session_start();

if (!isset($_SESSION["used"])) {
  $_SESSION["loggedin"] = false;
  $_SESSION["suche"] = "";
  $_SESSION["ksuche"] = "";
  $_SESSION["loginevent"] = false;
  $_SESSION["error"] = ""; // Korrigiert
}
$_SESSION["used"] = true;
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Odor+Mean+Chey&display=swap" rel="stylesheet">
  <title>Startseite</title>
  <link rel="stylesheet" href="../Konfigurationen/style.css"> <!-- Externe CSS-Datei -->
</head>
<body>
<?php
// Setze den Schlüssel "error" auf einen Standardwert, wenn er nicht existiert
if (!isset($_SESSION["error"])) {
  $_SESSION["error"] = "";
}

if ($_SESSION["error"] == "zugriff") {
  echo "<script>alert('Du hast keinen Zugriff auf diese Seite')</script>";
  $_SESSION["error"] = ""; // Fehler zurücksetzen
}

if (isset($_SESSION["loginevent"]) && $_SESSION["loginevent"] == true) {
  if ($_SESSION["logsuc"] == true) {
    echo "<script>alert('Login Erfolgreich');</script>";
    $_SESSION["loginevent"] = false;
  } else {
    echo "<script>alert('Es ist ein Fehler aufgetreten beim Login (Falsche Daten, Nicht alles eingegeben oder Account nicht vorhanden!)');</script>";
    $_SESSION["loginevent"] = false;
  }
}
?>

<?php if ($_SESSION["loggedin"] == true) {
  echo '
  <header>
    <div id="upperheader">
    <img src="../Images/logo.svg" id="logo"> <!-- Logo-Bild -->
    <form id="searchbar" action="buecher.php" method="post">
        <input type="text" name="search" id="searchbox" placeholder="Titel, Autor*in, Stichwort, ISBN" maxlength="50"> <!-- Sucheingabefeld -->
        <img src="../Images/search.svg" alt="" id="searchlogo" width="37px"> <!-- Suchsymbol -->
      </form>
    <div id="options">
      <div id="optionimages">
    <img src="../Images/building.svg" width="50px" class="optionimage"> <!-- Optionsbild -->
    <img src="../Images/telephone.svg" width="50px" class="optionimage"> <!-- Optionsbild -->
    <img src="../Images/person.svg" width="50px" class="optionimage"> <!-- Optionsbild -->
    </div>
    <div id="optiontexts">
      <h2 class="optiontext">Über Uns</h2> <!-- Optionstext -->
      <h2 class="optiontext">Kontakt</h2> <!-- Optionstext -->
      <h2 class="optiontext" onclick="toggleDropdown()">Konto</h2> <!-- Optionstext -->
      <div class="dropdownabmeldung" id="myDropdown"> 
      <form action="../Konfigurationen/logout.php" method="post" >
      <input value="Abmelden" type="submit" class="kontohover" id="logout">
      </form>
      <a href="password_reset.php" class="kontohover">Passwort ändern</a>
      </div>
    </div>
  </div>
  </div>
  <div id="lowerheader">
<h2 class="navelements"><a href="../HTML Dateien/buecher.php" class="navelements">Bücher</a></h2> <!-- Navigationslink -->
<h2 class="navelements"><a href="" class="navelements">E-Books</a></h2> <!-- Navigationslink -->
<h2 class="navelements">
  <a href="#" class="admineditbutton" onclick="DropdownBearbeiten()">Bearbeiten</a> 
  <!-- Dropdown-Links -->
  <div id="dropdownLinks" style="display: none;">
    <a href="#">Admin</a>
    <a href="kunden.php">Kunden</a>
    <a href="buecher.php">Bücher</a>
  </div>
</h2>
<script>
// Funktion zum Umschalten der Dropdown-Links
function DropdownBearbeiten() {
  var dropdownLinks = document.getElementById("dropdownLinks");
  dropdownLinks.style.display = dropdownLinks.style.display === "none" ? "block" : "none";
}
</script>
  </div>
  </header>
  <script>
// JavaScript-Code zum Ein- und Ausblenden des Dropdown-Divs
function toggleDropdown() {
  var dropdown = document.getElementById("myDropdown");
  dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
}
</script>
'; } else { echo '
  <header>
    <div id="upperheader">
    <img src="../Images/logo.svg" id="logo" alt="Our beautiful logo"> <!-- Logo-Bild -->
    <form id="searchbar" action="buecher.php" method="post">
      <input type="text" name="search" id="searchbox" placeholder="Titel, Autor*in, Stichwort, ISBN" maxlength="50"> <!-- Sucheingabefeld -->
      <img src="../Images/search.svg" alt="Searchlogo" id="searchlogo" width="37"> <!-- Suchsymbol -->
    </form>
    <div id="options">
      <div id="optionimages">
    <img src="../Images/building.svg" width="50" class="optionimage" alt="Buildingimage"> <!-- Optionsbild -->
    <img src="../Images/telephone.svg" width="50" class="optionimage" alt="Phoneimage"> <!-- Optionsbild -->
    <img src="../Images/person.svg" width="50" class="optionimage" alt="Personimage"> <!-- Optionsbild -->
      </div>
    <div id="optiontexts">
      <h2 class="optiontext">Über Uns</h2> <!-- Optionstext -->
      <h2 class="optiontext">Kontakt</h2> <!-- Optionstext -->
      <h2 class="optiontext" onclick="toggleDropdown()">Einloggen</h2> <!-- Optionstext -->
      <div class="dropdown-content" id="myDropdown">
        <!-- Inhalt des Dropdown-Divs -->
        <h2 class="kontoanmeldungtext">Konto Anmeldung</h2> <!-- Optionstext -->
        <form action="../Konfigurationen/login.php" method="post">
          <label for="username" class="dropdownfieldtext">Benutzername:</label>
          <br>
          <input type="text" name="username" class="dropdownfield" id="username" required maxlength="50">
          <br>
          <label for="email" class="dropdownfieldtext">Email Adresse:</label>
          <br>
          <input type="text" name="email" class="dropdownfield" id="email" required maxlength="50">
          <br>
          <label for="password" class="dropdownfieldtext">Passwort:</label>
          <br>
          <input type="password" name="password" class="dropdownfield" id="password" required maxlength="50">
          <br>
          <a href="password_reset.php" class="password-reset-link">Passwort vergessen?</a>
          <br>
          <input type="submit" value="Anmelden" class="anmeldenbutton" name="einloggen">
          <br>
          <a href="Registrieren.html" class="password-reset-link2">Konto anlegen</a>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script>
  function toggleDropdown() {
    var dropdown = document.getElementById("myDropdown");
    dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
  }
  </script>
  <div id="lowerheader">
    <h2 class="navelements"><a href="../HTML Dateien/buecher.php" class="navelements">Bücher</a></h2> <!-- Navigationslink -->
    <h2 class="navelements"><a href="" class="navelements">E-Books</a></h2> <!-- Navigationslink -->
  </div>
  </header>
'; }
?>
<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="../Images/THE DUC PROJECT1.png" style="width:100%"> <!-- Slideshow-Bild -->
  </div>
  <div class="mySlides fade">
    <img src="../Images/THE DUC PROJECT2.png" style="width:100%"> <!-- Slideshow-Bild -->
  </div>
  <div class="mySlides fade">
    <img src="../Images/THE DUC PROJECT4.png" style="width:100%"> <!-- Slideshow-Bild -->
  </div>
  <div class="navigation-controls">
    <a class="prev" onclick="plusSlides(-1)">
      <img src="../Images/pfeillinks.png" alt="Vorheriges Bild">
    </a>
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <a class="next" onclick="plusSlides(1)">
      <img src="../Images/pfeil.png" alt="Nächstes Bild">
    </a>
  </div>
</div>

<script src="../Konfigurationen/slideshow.js"></script> <!-- Externe JavaScript-Datei -->

<div class="Knopf">
<button class="square-button">Nun erhältlich</button> <!-- Button-Element -->
</div>

<h2 class="lato-bold-text">
  Unsere ausgefallensten Exemplare
</h2>

<div class="packungbook">
  <div class="circle circleleft"><span class="arrow">&lt;</span></div> 
  <div class="book">
    <div class="book-cover">
      <img src="../Images/DAS BUCH.png" alt="Suche"> <!-- Buchcover-Bild -->
    </div>
    <div class="book-title">Das Buch</div> <!-- Buchtitel -->
  </div>
  <div class="book">
    <div class="book-cover">
      <img src="../Images/DAS BUCH2.png" alt="Suche"> <!-- Buchcover-Bild -->
    </div>
    <div class="book-title">Das Buch TWO</div> <!-- Buchtitel -->
  </div>
  <div class="book">
    <div class="book-cover">
      <img src="../Images/DAS BUCH 3.png" alt="Suche"> <!-- Buchcover-Bild -->
    </div>
    <div class="book-title">Das Buch 3</div> <!-- Buchtitel -->
  </div>
  <div class="book">
    <div class="book-cover">
      <img src="../Images/DAS BUCH4.png" alt="Suche"> <!-- Buchcover-Bild -->
    </div>
    <div class="book-title">Das Buch 4</div> <!-- Buchtitel -->
  </div>
  <div class="circle circleright"><span class="arrow">></span></div> <!-- Rechter Kreis mit Pfeil -->
</div>

<div class="full-width-box">
  <div class="title-container">
    <h2 class="lato-bold-text2">Was wir zu bieten haben</h2>
  </div>
  <div class="circle-container">
    <div class="circlebig">
      <img src="../Images/service-workers-svgrepo-com (3).svg" alt="Icon 1">
      <p class="circle-text">24/7 Kundenservice</p>
    </div>
    <div class="circlebig">
      <img src="../Images/bookcase-svgrepo-com.svg" alt="Icon 2">
      <p class="circle-text">Enormes Sortiment!</p>
    </div>
    <div class="circlebig">
      <img src="../Images/recycling-symbol-svgrepo-com.svg" alt="Icon 3">
      <p class="circle-text">Nachhaltigkeit!</p>
    </div>
    <div class="circlebig">
      <img src="../Images/minimalistic-magnifer-zoom-in-svgrepo-com.svg" alt="Icon 4">
      <p class="circle-text">Garantierte Qualität!</p>
    </div>
  </div>
</div>

<footer class="footer">
  <div class="footer-section">
    <ul>
      <li>Apps</li>
      <li>Software</li>
      <li>Whispersync for Voice</li>
      <li>Hilfe</li>
      <li>Facebook</li>
      <li>Twitter</li>
      <li>Audible Magazin</li>
      <li>Presse</li>
      <li>Mobile Site</li>
    </ul>
  </div>
  <div class="footer-section">
    <ul>
      <li>Gutschein einlösen</li>
      <li>Geschenke</li>
      <li>Jobs</li>
      <li>Partnerprogramm</li>
      <li>Kontakt</li>
    </ul>
  </div>
  <div class="footer-section">
    <ul>
      <li>Bestseller</li>
      <li>Neue Hörbücher</li>
      <li>Audible Originals</li>
      <li>Hörbuch-Serien</li>
      <li>Hörspiele</li>
    </ul>
  </div>
  <div class="footer-bottom">
    <p>© Copyright 1997 - 2024 isoklib GMBH AGB Datenschutzerklärung Impressum Cookies</p>
    <p>Alle Preise inklusive der gesetzlichen Mehrwertsteuer.</p>
  </div>
</footer>
</body>
</html>
