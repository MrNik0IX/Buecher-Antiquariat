<!--Insert into buecher(kurztitel, autor, nummer, kategorie, katalog, zustand) values("test")-->
<?php session_start(); ?>
<body>
<?php 
  if(isset($_SESSION["addEvent"])&&$_SESSION["addEvent"]==true){
    if($_SESSION["addBuecherSuccess"]==true){
    echo "<script>alert('Bücheränderung erfolgreich');</script>";
    $_SESSION["addEvent"]=false;
    } else {
      echo "<script>alert('Es ist ein Fehler aufgetretten(Falsche Daten, Nicht alles eingegeben oder Buch nicht vorhanden!)');</script>";
      $_SESSION["addEvent"]=false;
    }
  }
  ?>
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
 
  <title>Bücherseite</title>
 
  <link rel="stylesheet" href="../Konfigurationen/style2.css"> <!-- Externe CSS-Datei -->
  <link rel="stylesheet" href="../Konfigurationen/style.css"> <!-- Externe CSS-Datei -->
 
</head>
 
<body>
<?php if($_SESSION["loggedin"]==true){echo '
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
    <a href="index.php"><img src="../Images/logo.svg" id="logo" alt="Our beautiful logo"></a> <!-- Logo-Bild -->
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
 
    <!-- Hauptbereich der Bücherseite -->
  <main>
        <!-- Abschnitt zum Sortieren der Seite mit Logo und Text -->
       <div id="optionendar">
        <div id="sortieren">
            <div id="sortierabschnitt">
                <button id="sortierknopf"><img src="../Images/sort.png" id="sortierlogo" width="40px"></button>
                <h1 id="sortiertext">Alle Antiquariat-Bücher</h1>
</div>
            <!-- Formular zum Auswählen von Sortier- und Filterkriterien -->
            <form action="buecher.php" method="post" id="subcontent">
                <!-- Sortierabschnitt -->
                <div>
                    <h2>Name</h2>
                    <label for="NA-Z">A-Z</label>
                    <input type="radio" name="sort" id="NA-Z" class="sortierinputs" value="order by kurztitle ASC">
                    <br>
                    <label for="NZ-A">Z-A</label>
                    <input type="radio" name="sort" id="NZ-A" class="sortierinputs" value="order by kurztitle DESC">
                    <br><br>
                    <h2>Nummer</h2>
                    <label for="aufsteigend">aufsteigend</label>
                    <input type="radio" name="sort" id="aufsteigend" class="sortierinputs" value="order by nummer ASC">
                    <br>
                    <label for="absteigend">absteigend&nbsp;</label>
                    <input type="radio" name="sort" id="absteigend" class="sortierinputs" value="order by nummer DESC">
                    <br><br>
                    <h2>Autor</h2>
                    <label for="AA-Z">A-Z</label>
                    <input type="radio" name="sort" id="AA-Z" class="sortierinputs" value="order by autor ASC">
                    <br>
                    <label for="AZ-A">Z-A</label>
                    <input type="radio" name="sort" id="AZ-A" class="sortierinputs" value="order by autor DESC">
                </div>
               
                <!-- Filterabschnitt -->
                <div>
                    <h2>Katalog</h2>
                    <label for="fkatalog">Katalog</label>
                    <select name="fkatalog" id="fkatalog" class="filtrierbox">
                        <option value=""></option>
                        <option value="">10</option>
                        <option value="">11</option>
                    </select>
                    <br><br><br>
                    <h2>Kategorie</h2>
                    <label for="fkategorie">Kategorie</label>
                    <select name="fkategorie" id="fkategorie" class="filtrierbox" >
                    <option value=""></option>
                        <option value="1">Bibeln, Klassische Autoren in den Originalsprachen</option>
                        <option value="2">Geographie und Reisen</option>
                        <option value="3">Geschichtswissenschaften</option>
                        <option value="4">Naturwissenschaften</option>
                        <option value="5">Kinderbücher</option>
                        <option value="6">Moderne Literatur und Kunst</option>
                        <option value="7">Moderne Kunst und Künstlergraphik</option>
                        <option value="9">Kunstwissenschaften</option>
                        <option value="10">Architektur</option>
                        <option value="11">Technik</option>
                        <option value="12">Naturwissenschaften - Medizin</option>
                        <option value="13">Ozeanien</option>
                        <option value="14">Afrika</option>
                    </select>
                    <br><br><br>
                    <h2>Autor</h2>
                    <label for="fzustand">Zustand</label>
                    <select name="fzustand" id="fzustand" class="filtrierbox">
                        <option value=""></option>
                        <option value="">Schlecht</option>
                        <option value="">Mittel</option>
                        <option value="">Gut</option>
                    </select>
                    <input type="reset" value="Zurücksetzen">
                    <input type="submit" name="sortsubmit" id="submit" value="Senden">
                </div>
            </form>
          </div>

                <!-- "Bearbeiten"-Button -->
           <?php 
           if($_SESSION["loggedin"]==true){
            echo'     
<div>                
      <button class="bearbeitenbutton" onclick="openPopup()">
  <img src="../Images/neu-laden.png" class="bearbeitenicon" alt="Bearbeiten"> <br>
 <p>Bearbeiten/Löschen</p>
</button>

<!-- Popup-Feld -->
<div class="popupContainer" id="mainPopup">
  <div class="popupContent">
    <span class="closeButton" onclick="closePopup(\'mainPopup\')">&times;</span>
    <h2 style="font-family: Lato, sans-serif; font-weight: bold;">Bearbeitungsfenster</h2>
    <button class="popupButton" id="deleteButton" onclick="openDeleteForm()">Löschen</button>
    <button class="popupButton" id="editButton" onclick="editItem()">Ändern</button>
  </div>
</div>

<!-- Popup-Feld für Löschformular -->
<div class="popupContainer" id="deleteFormPopup">
  <div class="popupContent">
    <span class="closeButton" onclick="closePopup(\'deleteFormPopup\')">&times;</span>
    <h2 style="font-family: Lato, sans-serif; font-weight: bold;">Löschen bestätigen</h2>
    <form id="deleteForm" method="post" action="../Konfigurationen/bücherlöschen.php" onsubmit="submitDeleteForm(event)">
      <p>Löschendes Element eingeben:</p>
      <input type="number" id="searchId" name="searchId" placeholder="ID eingeben" required>
      <button type="submit" class="popupButton" name="delconfirm" id="confirmDeleteButton">Löschen</button>
      <button type="button" class="popupButton" id="cancelDeleteButton" onclick="closePopup(\'deleteFormPopup\')">Abbrechen</button>
    </form>
  </div>
</div>

<!-- Bearbeitungsformular Popup-Div -->
<div class="popupContainer" id="editFormPopup">
  <div class="popupContent">
    <span class="closeButton" onclick="closePopup(\'editFormPopup\')">&times;</span>
    <h2 style="font-family: Lato, sans-serif; font-weight: bold;">Bearbeitungsformular</h2>
    <form id="editForm" method="post" action="../Konfigurationen/buecherbearbeiten.php">
    <label for="id">ID des Datensatzes:</label><br>
      <input type="number" id="id" name="searchId" required><br>
      <label for="name">Name:</label><br>
      <input type="text" id="name" name="namebe" required><br>
      <label for="autor">Autor:</label><br>
      <input type="text" id="autor" name="autorbe" required><br>
      <label for="nummer">Nummer:</label><br>
      <input type="text" id="nummer" name="nummerbe" required><br>
      <label for="kategorie">Kategorie:</label><br>
  <select id="kategorie" name="kategoriebe" required>
                        <option value="1">Bibeln, Klassische Autoren in den Originalsprachen</option>
                        <option value="2">Geographie und Reisen</option>
                        <option value="3">Geschichtswissenschaften</option>
                        <option value="4">Naturwissenschaften</option>
                        <option value="5">Kinderbücher</option>
                        <option value="6">Moderne Literatur und Kunst</option>
                        <option value="7">Moderne Kunst und Künstlergraphik</option>
                        <option value="9">Kunstwissenschaften</option>
                        <option value="10">Architektur</option>
                        <option value="11">Technik</option>
                        <option value="12">Naturwissenschaften - Medizin</option>
                        <option value="13">Ozeanien</option>
                        <option value="14">Afrika</option>
    <!-- Füge weitere Optionen hinzu, wie benötigt -->
  </select><br>
  <label for="katalog">Katalog:</label><br>
  <select id="katalog" name="katalogbe" required>

                        <option value="10">10</option>
                        <option value="11">11</option>
    <!-- Füge weitere Optionen hinzu, wie benötigt -->
  </select><br>
  <label for="katalog">Zustand:</label><br>
  <select id="katalog" name="zustandbe" required>
                        <option value="S">Schlecht</option>
                        <option value="M">Mittel</option>
                        <option value="G">Gut</option>
    <!-- Füge weitere Optionen hinzu, wie benötigt -->
  </select><br>
  <input type="submit" value="Senden" name="sendbuchbe">
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
  closePopup(\'mainPopup\');
  var deleteFormPopup = document.getElementById("deleteFormPopup");
  deleteFormPopup.style.display = "block";
}


// Funktion für den "Ändern"-Button
function openEditForm() {
  closePopup(\'mainPopup\');
  var editFormPopup = document.getElementById("editFormPopup");
  editFormPopup.style.display = "block";
}

// Binden der Funktion an den "Ändern"-Button
document.getElementById("editButton").addEventListener("click", openEditForm);


      </script>
</div>
          <!--Hinzufügenbutton-->
<div id="hinzufuegen" class="buecherhinzufügen">
          <img src="../Images/hinzufugen-leer.png" alt="Bild" width="50">
          <p>hinzufügen</p>
          <form id="box" method="post" class="boxbuecher" action="../Konfigurationen/hinzufügen.php">
          <div id="hinzufügenform">
              <div>
                  <h3 class="form-label"><label for="name">Name:</label></h3>
                  <input type="text" id="name" name="addname" class="form-field" maxlength="50" required>
                  <br>
                  <h3 class="form-label"><label for="autor">Autor:</label></h3>
                  <input type="text" id="autor" name="addautor" class="form-field" maxlength="50">
                  <br>
                  <h3 class="form-label"><label for="nummer">Nummer:</label></h3>
                  <input type="number" id="nummer" name="addnummer" class="form-nummer" maxlength="50" required>
              </div>
            <div>
            <h3 class="form-label"><label for="addbkategorie">Kategorie:</label></h3>
            <select name="addbkategorie" id="addbkategorie" class="filtrierboxadd" required>
              
                        <option value="1">Bibeln, Klassische Autoren in den Originalsprachen</option>
                        <option value="2">Geographie und Reisen</option>
                        <option value="3">Geschichtswissenschaften</option>
                        <option value="4">Naturwissenschaften</option>
                        <option value="5">Kinderbücher</option>
                        <option value="6">Moderne Literatur und Kunst</option>
                        <option value="7">Moderne Kunst und Künstlergraphik</option>
                        <option value="9">Kunstwissenschaften</option>
                        <option value="10">Architektur</option>
                        <option value="11">Technik</option>
                        <option value="12">Naturwissenschaften - Medizin</option>
                        <option value="13">Ozeanien</option>
                        <option value="14">Afrika</option>
                    </select>
                    <br><br><br>
                    <h3 class="form-label"><label for="addbkatalog">Katalog:</label></h3>
                    <select name="addbkatalog" id="addbkatalog" class="filtrierboxadd" required>
                       
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                    <br><br><br>
                    <h3 class="form-label"><label for="addbzustand">Zustand:</label></h3>
                    <select name="addbzustand" id="addbzustand" class="filtrierboxadd" required>
                        <option value="S">Schlecht</option>
                        <option value="M">Mittel</option>
                        <option value="G">Gut</option>
</select>
        </div>
        <div class = "submit-button">  <input type="submit" name="subaddb" value="Einfügen"></div>     
        </form>
        </div>
        ';}
        ?>
      </div>
      
      </div>
   
  
        
        <!-- Eigenschaften und Überkategorien der Bücher -->
        <!-- Erster Abschnitt für das Bild -->
        <div id="bucheigenschaften">
            <p>Bücher</p>
            <!-- Zweiter Abschnitt für die anderen schriftlichen Eigenschaften (keine Bilder) -->
            <div id="bucheigenschaften2">
                <p>Name</p>
                <p>Kategorie</p>
                <p>Katalog</p>
                <p>Autor</p>
                <p>Nummer</p>
                <p>Zustand</p>
</div>
</div>
        <!-- Abschnitt mit der Bücherliste (Datenbank mit PHP auslesen) -->
        <span id="bücherliste">
       
           <?php
           
            // Verbindung zur Datenbank herstellen.
            $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
 
            // Datensätze pro Seite  
            $DatensaetzePseite = 12;
            
            if (isset($_POST["search"])) {
              $_SESSION["suche"] = $_POST["search"];
              $_POST["search"] = null;
             
            }
              if(isset($_SESSION["suche"])||$_SESSION["suche"]!="") {          
                
              
              $search = "'%".trim($_SESSION["suche"])."%'";
             
            
              if (isset($_POST["sortsubmit"]) && isset($_POST["sort"])){
                $_SESSION["sortieren"]=$_POST["sort"];
              } elseif (isset($_POST["sortsubmit"]) && !isset($_POST["sort"])){
               $_SESSION["sortieren"] = null;
              }
             
              
                if(isset($_SESSION['sortieren'])){
                $sort = $_SESSION["sortieren"];
               
               
                $select = $pdo->prepare("SELECT  * FROM buecher, kategorien, zustaende
                where kategorien.id = buecher.kategorie
                and zustaende.zustand = buecher.zustand
                and  (buecher.kurztitle like $search
                or buecher.autor like $search
                or buecher.title like $search)
                $sort
                LIMIT :offset, :dseite");
             
              } else {
               
                $select = $pdo->prepare("SELECT  * FROM buecher, kategorien, zustaende
                where kategorien.id = buecher.kategorie
                and zustaende.zustand = buecher.zustand
                and  (buecher.kurztitle like $search
                or buecher.autor like $search
                or buecher.title like $search)
     
                                          LIMIT :offset, :dseite");
              }
                 
            // Anzahl der Datensätze ermitteln  
            $AnzahlDatensaetze = $pdo->query("SELECT COUNT(*) FROM buecher, kategorien, zustaende
            where kategorien.id = buecher.kategorie
            and zustaende.zustand = buecher.zustand
            and  (buecher.kurztitle like $search
            or buecher.autor like $search
            or buecher.title like $search)")->fetchColumn(0);
     
            // Die Anzahl der Seiten ermitteln  
            $AnzahlSeiten = ceil($AnzahlDatensaetze / $DatensaetzePseite);
                  } else {
                   
                    if (isset($_POST["sortsubmit"]) && isset($_POST["sort"])){
                      $_SESSION["sortieren"]=$_POST["sort"];
                    } else {
                      $_SESSION = null;
                     }
                      if(isset($_SESSION['sortieren'])){
                      $sort = $_SESSION["sortieren"];
                     
                     
                $select = $pdo->prepare("SELECT * FROM buecher, kategorien, zustaende
            where kategorien.id = buecher.kategorie
            and zustaende.zustand = buecher.zustand
            $sort
                                      LIMIT :offset, :dseite");
                      } else { 
                         $select = $pdo->prepare("SELECT * FROM buecher, kategorien, zustaende
                        where kategorien.id = buecher.kategorie
                        and zustaende.zustand = buecher.zustand
                                                  LIMIT :offset, :dseite");}
                       
 
             // Anzahl der Datensätze ermitteln  
            $AnzahlDatensaetze = $pdo->query("SELECT count(*) FROM buecher, kategorien, zustaende
            where kategorien.id = buecher.kategorie
            and zustaende.zustand = buecher.zustand")->fetchColumn(0);
   
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
            $buchdaten = $select->fetchAll(PDO::FETCH_OBJ);
 
           
            // Ausgabe der Daten
            echo "<div id='anzeigeBücher'>";
            // Für jede Buchdaten soll jeder Datensatz in buchdatensatz gespeichert werden
            foreach ($buchdaten as $buchdatensatz) {
                // Eigenes Div für das Design
                echo "<div class='buch'>";
                // Zuerst für jedes Buch das Buchlogo
                echo "<img src='../Images/book.png' width=130px id='buchlogo'>";
                // Ausgabe der einzelnen Spalten (Kurztitle, Kategorie, Katalog...)
                // Ermöglicht durch das Speichern als Objekt (->, um auf Attribute eines Objekts zuzugreifen (Methoden und Variablen))
                echo "<p class=buchtitel>" . $buchdatensatz->kurztitle . "</p>";
                echo "<p class='kategorie'>" . $buchdatensatz->kategorie . "</p>";
                echo "<p class='katalog'>" . $buchdatensatz->katalog . "</p>";
                echo "<p class='autor'>" . $buchdatensatz->autor . "</p>";
                echo "<p class='nummer'>" . $buchdatensatz->nummer . "</p>";
                echo "<p class='zustand'>" . $buchdatensatz->beschreibung . "</p>";
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

