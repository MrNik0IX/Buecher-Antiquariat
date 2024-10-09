<?php session_start(); 
if($_SESSION["loggedin"]==false){
  header('Location: ../HTML Dateien/index.php');
  $_SESSION["error"]="zugriff";
}
?> <!-- Starte die Session -->


<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
 
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Odor+Mean+Chey&display=swap" rel="stylesheet">
 
  <title>Kundenseite</title>
 
  <link rel="stylesheet" href="../Konfigurationen/style2.css"> <!-- Externe CSS-Datei -->
 
  <link rel="stylesheet" href="../Konfigurationen/style.css"> <!-- Externe CSS-Datei -->
</head>
 
<body>
<?php 
  if(isset($_SESSION["addEvent"])&&$_SESSION["addEvent"]==true){
    if($_SESSION["addSuccess"]==true){
    echo "<script>alert('Kundenänderung erfolgreich');</script>";
    $_SESSION["addEvent"]=false;
    } else {
      echo "<script>alert('Es ist ein Fehler aufgetretten(Falsche Daten, Nicht alles eingegeben oder Kunde nicht vorhanden!)');</script>";
      $_SESSION["addEvent"]=false;
    }
  }
  ?><?php if($_SESSION["loggedin"]==true){echo '
    <header>
      <div id="upperheader">
      <a href="index.php"><img src="../Images/logo.svg" id="logo" alt="Our beautiful logo"></a> <!-- Logo-Bild -->
      <form id="searchbar" action=\'buecher.php\' method=\'post\'>
        <input type="text" name="search" id="searchbox" placeholder="Titel, Autor*in, Stichwort, ISBN"> <!-- Sucheingabefeld -->
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
      <a href="index.php"><img src="../Images/logo.svg" id="logo" alt="Our beautiful logo"></a>  <!-- Logo-Bild -->
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
        <input type="text" name="username" class="dropdownfield"  id="username" maxlength="50" required>
        <br>
        <label for="email" class= "dropdownfieldtext">Email Adresse:</label>
        <br>
        <input type="text" name="email" class="dropdownfield"  id="email" maxlength="50" required>
        <br>
        <label for="password" class= "dropdownfieldtext">Passwort:</label> <br>
        <input type="password" name="password"  class="dropdownfield" id="password" maxlength="50" required>
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
 
    <!-- Hauptbereich der Bücherseite -->
  <main>
        <!-- Abschnitt zum Sortieren der Seite mit Logo und Text -->
        <div id="optionendar">
        <div id="sortieren">
            <div id="sortierabschnitt">
                <button id="sortierknopf"><img src="../Images/sort.png" id="sortierlogo" width="40px"></button>
                <h1 id="sortiertext">Kundendatenbank</h1>
        
            
            <!-- Formular zum Auswählen von Sortier- und Filterkriterien -->
            <form action="kunden.php" method="post" id="subcontent" class="subcontentk">
                <!-- Sortierabschnitt -->
                <div>
                <h2>Vorame</h2>
                    <label for="NA-Z">A-Z</label>
                    <input type="radio" name="sortk" id="NA-Z" class="sortierinputs" value="order by vorname ASC">
                    <br>
                    <label for="NZ-A">Z-A</label>
                    <input type="radio" name="sortk" id="NZ-A" class="sortierinputs" value="order by vorname DESC">
                    <br><br>
                    <h2>Name</h2>
                    <label for="aufsteigend">A-Z</label>
                    <input type="radio" name="sortk" id="aufsteigend" class="sortierinputs" value="order by name ASC">
                    <br>
                    <label for="absteigend">Z-A&nbsp;</label>
                    <input type="radio" name="sortk" id="absteigend" class="sortierinputs" value="order by name DESC">
                    <br><br>
                    <h2>Beitritt</h2>
                    <label for="AA-Z">Aufsteigend</label>
                    <input type="radio" name="sortk" id="AA-Z" class="sortierinputs" value="order by kunde_seit ASC">
                    <br>
                    <label for="AZ-A">Absteigend</label>
                    <input type="radio" name="sortk" id="AZ-A" class="sortierinputs" value="order by kunde_seit DESC">
                </div>
               
                <!-- Filterabschnitt -->
                <div>
                <h2>E-Mail</h2>
                    <label for="AA-Z">A-Z</label>
                    <input type="radio" name="sortk" id="AA-Z" class="sortierinputs" value="order by email ASC">
                    <br>
                    <label for="AZ-A">Z-A</label>
                    <input type="radio" name="sortk" id="AZ-A" class="sortierinputs" value="order by email DESC">
                    <br><br><br>
                    <h2>Kontakt per Mail</h2>
                    <label for="fkntpermail">Kontakt per Mail</label>
                    <select name="fkntpermail" id="fkntpermail" class="filtrierbox">
                        <option value=""></option>
                        <option value="and kontaktpermail=0">Nein</option>
                        <option value="and kontaktpermail=1">Ja</option>
                    </select>
                    <br><br><br>
                  
                    <input type="reset" value="Zurücksetzen">
                    <input type="submit" name="sortsubmitk" id="submit" value="Senden">
                </div>
            </form>
            </div>
        </div>
       

        <div>
          <form  action="kunden.php" method='post' id="searchbarkunden">  
      <input type="text" name="searchkunden" id="searchboxkunden" placeholder="Kundenname, Nachname, Mail eingeben"> <!-- Sucheingabefeld -->
      <input type="image" src="../Images/search.svg" id="searchlogokunden" width="20px" value='suchenkunden'> <!-- Suchsymbol -->
      </form>
</div>


<!-- "Bearbeiten"-Button -->
<div>
<button class="bearbeitenbuttonku" onclick="openPopup()">
  <img src="../Images/neu-laden.png" class="bearbeitenicon" alt="Bearbeiten"> <br>
  <p>Bearbeiten/Löschen</p>
</button>

<!-- Popup-Feld -->
<div class="popupContainer" id="mainPopup">
  <div class="popupContent">
    <span class="closeButton" onclick="closePopup('mainPopup')">&times;</span>
    <h2 style="font-family: Lato, sans-serif; font-weight: bold;">Bearbeitungsfenster</h2>
    <button class="popupButton" id="deleteButton" onclick="openDeleteForm()">Löschen</button>
    <button class="popupButton" id="editButton" onclick="editItem()">Ändern</button>
  </div>
</div>

<!-- Popup-Feld für Löschformular -->
<div class="popupContainer" id="deleteFormPopup">
  <div class="popupContent">
    <span class="closeButton" onclick="closePopup('deleteFormPopup')">&times;</span>
    <h2 style="font-family: Lato, sans-serif; font-weight: bold;">Löschen bestätigen</h2>
    <form id="deleteForm" method="post" action="../Konfigurationen/kundenlöschen.php" onsubmit="submitDeleteForm(event)">
      <p>Löschendes Element eingeben:</p>
      <input type="number" id="searchId" name="searchId" placeholder="ID eingeben" required>
      <button type="submit" class="popupButton" id="confirmDeleteButton" name="dksenden">Löschen</button>
      <button type="button" class="popupButton" id="cancelDeleteButton" onclick="closePopup('deleteFormPopup')">Abbrechen</button>
    </form>
  </div>
</div>


<!-- Bearbeitungsformular Popup-Div -->
<div class="popupContainer" id="editFormPopup">
  <div class="popupContent">
    <span class="closeButton" onclick="closePopup('editFormPopup')">&times;</span>
    <h2 style="font-family: Lato, sans-serif; font-weight: bold;">Bearbeitungsformular</h2>
    <form id="editForm" method="post" action="../Konfigurationen/kundenbearbeiten.php">
      <label for="id">ID:</label><br>
      <input type="text" id="id" name="kundesearchid" required><br>
      <label for="vorname">Vorname:</label><br>
      <input type="text" id="vorname" name="ekvorname" required><br>
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="ekname" required><br>
      <label for="email">Email-Adresse:</label><br>
      <input type="email" id="email" name="ekmail" required><br>
      <label for="geburtsdatum">Geburtsdatum:</label><br>
      <input type="date" id="geburtsdatum" name="ekgeburtsdatum" required><br>
      <label for="geschlecht">Geschlecht:</label><br>
      <select id="geschlecht" name="ekgeschlecht" required>
        <option value="M">Männlich</option>
        <option value="W">Weiblich</option>
        <option value="D">Divers</option>
      </select><br>
      <label for="kontakt">Kontakt per Mail:</label><br>
      <select id="kontakt" name="ekkontakt" required>
        <option value="1">Ja</option>
        <option value="0">Nein</option>
      </select><br>
      <input type="submit" name="eksenden" value="Senden">
    </form>
  </div>
</div>
</div>

<!--Hinzufügenbutton-->
<div id="hinzufuegen" class="kundenhinzufügen">
        <img src="../Images/hinzufugen-leer.png" alt="Bild" width="50">
        <p>Hinzufügen</p>
        <form id="box" method="post" action="../Konfigurationen/hinzufügenk.php">
            <div>
              <h3 class="form-label"><label for="name">Name:</label></h3>
              <input type="text" id="name" name="kname" class="form-field-name" required>
              <br>
              <h3 class="form-label"><label for="vorname">Vorname:</label></h3>
              <input type="text" id="vorname" name="kvorname" class="form-field-name" required>
              <br>
              <h3 class="form-label-emailtext"><label for="email">Email-Adresse:</label></h3>
              <input type="email" id="email" name="kemail" class="form-field-name" required>
              </div>
              
              <div>
              <h3 class="geburtstagtext"><label for="geburtsdatum">Geburtstag:</label></h3>
              <input type="date" id="geburtsdatum" name="kgeburtsdatum" class="form-field-geburtstag" required>
              <br><br><br>
              <h3 class="geburtstagtext"><label for="geschlecht">Geschlecht:</label></h3>
              <select id="geschlecht" name="kgeschlecht" class="form-field-geschlecht" required>
                <option value="männlich">Männlich</option>
                <option value="weiblich">Weiblich</option>
                <option value="divers">Divers</option>
              </select>
              <br><br>
              <h3 class="kontakttext"><label for="kontakt-ja">Kontakt per Email:</label></h3>
              <input type="radio" id="kontakt-ja" name="kkontakt" value="ja" checked>
              <label for="kontakt-ja">Ja</label>
              <input type="radio" id="kontakt-nein" name="kkontakt" value="nein">
              <label for="kontakt-nein">Nein</label>
           
            <div class="submit-buttonk">    
              <input type="submit" value="Einfügen" name="subaddk">
            </div>
</div>
          
        </form>
      </div>
  

</div>
<script>
    // JavaScript für die Funktionalität der Buttons
// Funktion zum Öffnen des Popups
function openPopup() {
  var popup = document.getElementById("mainPopup");
  popup.style.display = "block";
}

// Funktion zum Schließen des Popups
function closePopup(popupId) {
  var popup = document.getElementById(popupId);
  popup.style.display = "none";
}

// Funktion für den Lösch-Button
function openDeleteForm() {
  closePopup('mainPopup');
  var deleteFormPopup = document.getElementById("deleteFormPopup");
  deleteFormPopup.style.display = "block";
}


// Funktion für den "Ändern"-Button
function openEditForm() {
  closePopup('mainPopup');
  var editFormPopup = document.getElementById("editFormPopup");
  editFormPopup.style.display = "block";
}

// Binden der Funktion an den "Ändern"-Button
document.getElementById("editButton").addEventListener("click", openEditForm);


      </script>
        <!-- Eigenschaften und Überkategorien der Bücher -->
        <!-- Erster Abschnitt für das Bild -->
        <div id="kundeneigenschaften">
            <p>Kunden</p>
            <!-- Zweiter Abschnitt für die anderen schriftlichen Eigenschaften (keine Bilder) -->
            <div id="kundeneigenschaften2">
                <p>Vorame</p>
                <p class="nachname">Nachname</p>
                <p>Beitritt</p>
                <p class="mail">E-Mail</p>
                <p>Id</p>
                <p>Kontaktpermail</p>
</div>
</div>
        <!-- Abschnitt mit der Bücherliste (Datenbank mit PHP auslesen) -->
        <span id="bücherliste">
       
           <?php
           
            // Verbindung zur Datenbank herstellen.
            $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
            
            // Datensätze pro Seite  
            $DatensaetzePseite = 12;
           
            if (isset($_POST["searchkunden"])) {
             
              $_SESSION["ksuche"] = $_POST["searchkunden"];
              $_POST["searchkunden"] = null;
            }
              if(isset($_SESSION["ksuche"])||$_SESSION["ksuche"]!="") {          
         
             
              $searchk = "'%".trim($_SESSION["ksuche"])."%'";
             
            
              if (isset($_POST["sortsubmitk"])&&(isset($_POST["sortk"]))){
                $_SESSION["sortierenk"]=$_POST["sortk"];
              } elseif (isset($_POST["sortsubmitk"]) && !isset($_POST["sortk"])){
               $_SESSION["sortierenk"] = null;
              }
             
              
                if(isset($_SESSION['sortierenk'])){
                $sort = $_SESSION["sortierenk"];
               
               
                $select = $pdo->prepare("SELECT  * FROM kunden
                where (kunden.email like $searchk
                or kunden.vorname like $searchk
                or kunden.name like $searchk)
                $sort
                LIMIT :offset, :dseite");
             
              } else {
               
                $select = $pdo->prepare("SELECT * FROM kunden
                where (kunden.email like $searchk
                or kunden.vorname like $searchk
                or kunden.name like $searchk)
                                          LIMIT :offset, :dseite");
              }
                 
            // Anzahl der Datensätze ermitteln  
            $AnzahlDatensaetze = $pdo->query("SELECT COUNT(*) FROM kunden
            where (kunden.email like $searchk
                or kunden.vorname like $searchk
                or kunden.name like $searchk)")->fetchColumn(0);
     
            // Die Anzahl der Seiten ermitteln  
            $AnzahlSeiten = ceil($AnzahlDatensaetze / $DatensaetzePseite);
                  } else {
                   
                    if (isset($_POST["sortsubmitk"]) && isset($_POST["sortk"])){
                      $_SESSION["sortierenk"]=$_POST["sortk"];
                    } else {
                      $_SESSION = null;
                     }
                      if(isset($_SESSION['sortierenk'])){
                      $sort = $_SESSION["sortierenk"];
                      
                     
                     
                $select = $pdo->prepare("SELECT * FROM kunden  where 1=1 
            $sort
                                      LIMIT :offset, :dseite");
                      } else { 
                         $select = $pdo->prepare("SELECT * FROM kunden 
                                                  LIMIT :offset, :dseite");}
                       
 
             // Anzahl der Datensätze ermitteln  
            $AnzahlDatensaetze = $pdo->query("SELECT count(*) FROM kunden 
            ")->fetchColumn(0);
   
            // Die Anzahl der Seiten ermitteln  
            $AnzahlSeiten = ceil($AnzahlDatensaetze / $DatensaetzePseite);
                } 
               
            // Die aktuelle Seite ermitteln ?? Operator zum Erkennen ob es eine Seite gibt
            $AktuelleSeite = ($_GET["seite"] ?? 1);
 
         // Wert prüfen ob es eine Zahl ist, falls ja, dann Wert behalten, sonst den Wert 1 setzen
             $AktuelleSeite = ctype_digit((string) $AktuelleSeite) ? $AktuelleSeite : 1;
 
             // Den Versatz ermitteln (Offset, was übersprungen wird)
             $offset = $AktuelleSeite * $DatensaetzePseite - $DatensaetzePseite;
           
            /*Selectausgabe vorbereiten mit den benötigten Tabellen und where Klausen, um Kartesisches Produkt zu
            verhindern Limit mit Versatz und den Datensätze pro Seite, um das Blättern zu ermöglichen und nur
            12 Bücher pro Seite anzuzeigen
            $sql = "SELECT b.id AS book_id, b.*, z.*, k.*
        FROM buecher b
        LEFT JOIN zustaende z ON b.zustand = z.zustand
        LEFT JOIN kategorien k ON b.kategorie = k.id
        WHERE (b.kurztitle LIKE :search
               OR b.autor LIKE :search
               OR b.title LIKE :search)
               AND b.katalog LIKE :Katalog
               AND b.zustand LIKE :Zustand
               AND b.kategorie LIKE :Genre
        ORDER BY " . $filter['Sortieren'] . "
        LIMIT 18
        OFFSET :offset";*/
       
     
           
           
           
            // Prüfen ob aktuelle Seite kleiner als 1 ist oder größer als die Anzahl der Seiten, wenn ja, dann Wert 1 geben, sonst Wert behalten
            $AktuelleSeite = $AktuelleSeite < 1 || $AktuelleSeite > $AnzahlSeiten ? 1 : $AktuelleSeite;
 
           
 
            // Bindvalue, um eine Variable innerhalb einer Variable zu übergeben, mit dem Parameter Int, der oben verwendet wird
            $select->bindValue(':offset', $offset, PDO::PARAM_INT);
            $select->bindValue(':dseite', $DatensaetzePseite, PDO::PARAM_INT);
 
            // Ausgabe der betroffenen Zeilen
            $select->execute();
           
            // Speichern der Zeilen in einem Array (Fetch all, um alle zu nehmen, und FETCH_OBJ, um sie als Objekt zu holen)
            $kundendaten = $select->fetchAll(PDO::FETCH_OBJ);
 
           
            // Ausgabe der Daten
            echo "<div id='anzeigeBücher'>";
            // Für jede Buchdaten soll jeder Datensatz in buchdatensatz gespeichert werden
            foreach ($kundendaten as $kundendatensatz) {
                // Eigenes Div für das Design
                echo "<div class='buch'>";
                // Zuerst für jedes Buch das Buchlogo
                echo "<img src='../Images/book.png' width=130px id='buchlogo'>";
                // Ausgabe der einzelnen Spalten (Kurztitle, Kategorie, Katalog...)
                // Ermöglicht durch das Speichern als Objekt (->, um auf Attribute eines Objekts zuzugreifen (Methoden und Variablen))
                echo "<p class=vorname>" . $kundendatensatz->vorname . "</p>";
                echo "<p class='name'>" . $kundendatensatz->name . "</p>";
                echo "<p class='beitritt'>" . $kundendatensatz->kunde_seit . "</p>";
                echo "<p class='email'>" . $kundendatensatz->email . "</p>";
                echo "<p class='kid'>" . $kundendatensatz->kid. "</p>";
                echo "<p class='mailknt'>" . $kundendatensatz = $kundendatensatz->kontaktpermail == 1 ? "Ja":"Nein" . "</p>";
                echo "</div>";
               
            }
 
            echo "</div>";
 
 
 
// Bestehendes Pagination-Formular, das bereits in deinem Code vorhanden ist
echo '<form method="GET" autocomplete="off">';

// Start des Pagination-Wrappers
echo '<div id="pagination-wrapper">';

// "Zurück"-Button
echo (($AktuelleSeite - 1) > 0) ?
     '<a class="page-nav" href="?seite='.($AktuelleSeite - 1).'">Zurück</a>' :
     '<span class="page-nav disabled">Zurück</span>';

     echo ($AktuelleSeite != 1) ?
     '<a class="page-box first-page" href="?seite=1">1</a>' : // Wenn nicht auf Seite 1, zeige Link zur ersten Seite
     '<span class="page-box current first-page">-</span>'; // Wenn auf Seite 1, zeige einen Bindestrich

// Zweites Quadrat für die aktuelle Seite
echo '<span class="page-box current">'.$AktuelleSeite.'</span>';

// Drittes Quadrat als Button für die gewünschte Seitenzahl
echo '<button type="button" id="custom-page">...</button>';

// Verstecktes Eingabefeld innerhalb eines Modal-Popups
echo '<div id="custom-page-modal" class="modal">' .
     '<div class="modal-content">' .
     '<span class="close">&times;</span>' .
     '<form method="GET" autocomplete="off">' .
     '<label for="seite"></label>' .
     '<input type="number" id="seite" name="seite" min="1" max="'.$AnzahlSeiten.'" placeholder="1-271" required>' .
     '</form>' .
     '</div>' .
     '</div>';

  

// "Weiter"-Button
echo (($AktuelleSeite + 1) <= $AnzahlSeiten) ?
     '<a class="page-nav" href="?seite='.($AktuelleSeite + 1).'">Weiter</a>' :
     '<span class="page-nav disabled">Weiter</span>';

// Ende des Pagination-Wrappers
echo '</div>';


 
            ?>
        </span>

        
    </main>

 
 
 
 
   
 
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
 
 
   
 


<script>
// JavaScript für das Öffnen und Schließen des Modals
var modal = document.getElementById('custom-page-modal');
var btn = document.getElementById('custom-page');
var span = document.getElementsByClassName('close')[0];

btn.onclick = function() {
  modal.style.display = 'block';
}

span.onclick = function() {
  modal.style.display = 'none';
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}
</script>

</body>
 
</html>

