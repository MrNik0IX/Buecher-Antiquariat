<?php
 session_start();
 $_SESSION["addEvent"]=true;
 if(isset($_POST["eksenden"])){
    if(isset($_POST["kundesearchid"])&&isset($_POST["ekvorname"])&&isset($_POST["ekname"])&&isset($_POST["ekmail"])&&isset($_POST["ekgeburtsdatum"])&&isset($_POST["ekgeschlecht"])&&isset($_POST["ekkontakt"])){
        
        $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
        $vorname = $_POST["ekvorname"];
        $name = $_POST["ekname"];
        $mail = $_POST["ekmail"];
        $geburtsdatum = $_POST["ekgeburtsdatum"];
        $geschlecht = $_POST["ekgeschlecht"];
        $kontakt = $_POST["ekkontakt"];
        $id = $_POST["kundesearchid"];
        
        
        $select = $pdo->prepare("update kunden set vorname='$vorname', name='$name', email='$mail', geburtstag='$geburtsdatum', geschlecht='$geschlecht', kontaktpermail='$kontakt' where kid='$id'");
        if($select->execute()&&$select->rowCount()!=0){
           
            $select->execute();
        
        $_SESSION["addBuecherSuccess"]=true;
        header('Location: ../HTML Dateien/kunden.php');
        } else{
            $_SESSION["addBuecherSuccess"]=false;
        header('Location: ../HTML Dateien/kunden.php');
        }
//
    } else {
        $_SESSION["addBuecherSuccess"]=false;
        header('Location: ../HTML Dateien/kunden.php');
    }
}
//

?>