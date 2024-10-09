<?php
 session_start();
 $_SESSION["addEvent"]=true;
 if(isset($_POST["sendbuchbe"])){
    if(isset($_POST["searchId"])&&isset($_POST["namebe"])&&isset($_POST["autorbe"])&&isset($_POST["nummerbe"])&&isset($_POST["kategoriebe"])&&isset($_POST["katalogbe"])&&isset($_POST["zustandbe"])){
        
        $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
        $name = $_POST["namebe"];
        $autor = $_POST["autorbe"];
        $nummer = $_POST["nummerbe"];
        $kategorie = $_POST["kategoriebe"];
        $katalog = $_POST["katalogbe"];
        $zustand = $_POST["zustandbe"];
        $id = $_POST["searchId"];
        
        $select = $pdo->prepare("update buecher set kurztitle='$name', autor='$autor', nummer='$nummer', kategorie='$kategorie', katalog='$katalog', zustand='$zustand' where id='$id'");
        if($select->execute()&&$select->rowCount()!=0){
        $select->execute();
        
        $_SESSION["addBuecherSuccess"]=true;
        header('Location: ../HTML Dateien/buecher.php');
        } else{
            $_SESSION["addBuecherSuccess"]=false;
        header('Location: ../HTML Dateien/buecher.php');
        }
//
    } else {
        $_SESSION["addBuecherSuccess"]=false;
        header('Location: ../HTML Dateien/buecher.php');
    }
}
//

?>