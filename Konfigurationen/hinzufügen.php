<?php
 session_start();
 $_SESSION["addEvent"]=true;
 if(isset($_POST["subaddb"])){
    if(isset($_POST["addname"])&&isset($_POST["addnummer"])&&isset($_POST["addbkategorie"])&&isset($_POST["addbkatalog"])&&isset($_POST["addbzustand"])){
        $name = $_POST["addname"];
        $autor = $_POST["addautor"];   
        $nummer = $_POST["addnummer"];
        $kategorie = $_POST["addbkategorie"];
        $katalog = $_POST["addbkatalog"];
        $zustand = $_POST["addbzustand"];
        
        $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');

        $select = $pdo->prepare("insert into buecher(kurztitle, autor, nummer, kategorie, katalog, zustand) values('$name', '$autor', '$nummer', '$kategorie', '$katalog', '$zustand')");
        $select->execute();
        $_SESSION["addBuecherSuccess"]=true;
        header('Location: ../HTML Dateien/buecher.php');
//
    } else {
        $_SESSION["addBuecherSuccess"]=false;
        header('Location: ../HTML Dateien/buecher.php');
    }
}
//

?>