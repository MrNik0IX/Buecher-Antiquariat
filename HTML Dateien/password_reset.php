<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de"></html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="icon" type="image/icon" href="./image/isoklib.svg">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Odor+Mean+Chey&display=swap" rel="stylesheet">

  <title>Dokument</title>

  <link rel="stylesheet" href="../Konfigurationen/passwortreset.css"> <!-- Externe CSS-Datei -->
  
  <link rel="stylesheet" href="../Konfigurationen/style.css"> <!-- Externe CSS-Datei -->

</head>
<body>
  
</body>
</html>

</head>
 
<body>
<?php if($_SESSION["loggedin"]==true){echo '
  <header>
    <div id="upperheader">
    <a href="index.php"><img src="../Images/logo.svg" id="logo" alt="Our beautiful logo"></a> 
    <div id="searchbar">
      <input type="text" name="search" id="searchbox" placeholder="Titel, Autor*in, Stichwort, ISBN"> <!-- Sucheingabefeld -->
      <img src="../Images/search.svg" alt="" id="searchlogo" width="37px"> <!-- Suchsymbol -->
    </div>
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
  dropdownLinks.style.display = dropdownLinks.style.display === \'none\' ? \'block\' : \'none\';
}


</script>















  </div>


  
  </header>

  



  <script>
// JavaScript-Code zum Ein- und Ausblenden des Dropdown-Divs
function toggleDropdown() {
  var dropdown = document.getElementById("myDropdown");
  if (dropdown.style.display === "none") {
    dropdown.style.display = "block";
  } else {
    dropdown.style.display = "none";
  }
}
</script>
';} else{ echo '
  <header>
    <div id="upperheader">
    <img src="../Images/logo.svg" id="logo" alt="Our beautiful logo"> <!-- Logo-Bild -->
    <form id="searchbar" action="buecher.php" method=\'post\'>
      <input type="text" name="search" id="searchbox" placeholder="Titel, Autor*in, Stichwort, ISBN"> <!-- Sucheingabefeld -->
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
    <label for="username" class= "dropdownfieldtext">Benutzername:</label>
      <br>
      <input type="text" name="username" class="dropdownfield"  id="username" required>
      <br>
      <label for="email" class= "dropdownfieldtext">Email Adresse:</label>
      <br>
      <input type="text" name="email" class="dropdownfield"  id="email" required>
      <br>
      <label for="password" class= "dropdownfieldtext">Passwort:</label> <br>
      <input type="password" name="password"  class="dropdownfield" id="password" required>
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


<script>function toggleDropdown() {
    var dropdown = document.getElementById("myDropdown");
    if (dropdown.style.display === "none") {
      dropdown.style.display = "block";
    } else {
      dropdown.style.display = "none";
    }
  }</script>
  <div id="lowerheader">
<h2 class="navelements"><a href="../HTML Dateien/buecher.php" class="navelements">Bücher</a></h2> <!-- Navigationslink -->
<h2 class="navelements"><a href="" class="navelements">E-Books</a></h2> <!-- Navigationslink -->
  </div>
  </header>
';}
?>


  <body>

  

  <?php


// Verbindung zur Datenbank herstellen
$conn = new mysqli("localhost", "root", "", "book");

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if (isset($_POST['resetpw'])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];

        // Altes Passwort prüfen
        $stmt = $conn->prepare("SELECT passwort FROM benutzer WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($db_old_password);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($old_password, $db_old_password)) {
            // Neues Passwort hashen und speichern
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt_update = $conn->prepare("UPDATE benutzer SET passwort = ? WHERE id = ?");
            $stmt_update->bind_param("si", $new_password_hashed, $user_id);
            if ($stmt_update->execute()) {
                echo '<script>alert("Passwort erfolgreich geändert.");</script>';
            } else {
                echo '<script>alert("Fehler beim Ändern des Passworts.");</script>';
            }
            $stmt_update->close();
        } else {

            echo '<script>alert("Altes Passwort ist falsch.");</script>';
        } 
    } else {
        echo '<script>alert("Benutzer nicht angemeldet.");</script>';
    }
}

$conn->close();
?>













<div class="passwortändernbox">
  <h2 class="passtitle">Passwort ändern</h2>
  <form action="password_reset.php" method="POST">
      <label for="old_password" class="passtext">Altes Passwort:</label>
      <input type="password" id="old_password" class="passfield" name="old_password" required>
      <br>
      <label for="new_password" class="passtext">Neues Passwort:</label>
      <input type="password" id="new_password" class="passfield" name="new_password" required>
      <br>
      <input type="submit" name="resetpw" value="Ändern" class="andernbutton">
  </form>
  <form action="password_reset.php" method="POST">
      <input type="hidden" name="reset" value="true">
      <input type="submit" value="Zurücksetzen" class="zuruckbutton">
      <a href="index.php" class="password-reset-link2">Konto anmelden</a>
  </form>
</div>










  </body>