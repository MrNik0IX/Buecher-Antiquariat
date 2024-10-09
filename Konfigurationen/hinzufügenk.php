<?php
session_start();
$_SESSION["addEvent"]=true;
if(isset($_POST["subaddk"])){
      
   if(isset($_POST["kname"])&&isset($_POST["kvorname"])&&isset($_POST["kemail"])&&isset($_POST["kgeburtsdatum"])&&isset($_POST["kgeschlecht"])&&isset($_POST["kkontakt"])){
    $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
       $kidcmd = $pdo->query("select max(kid) from kunden")->fetchColumn(0);
       ++$kidcmd;
       $kid = $kidcmd;
       $name = $_POST["kname"];
       $vorname = $_POST["kvorname"];   
       $email = $_POST["kemail"];
       $geburtstag = $_POST["kgeburtsdatum"];
       $geschlecht = $_POST["kgeschlecht"];
       $kntpermail = $_POST["kkontakt"]=="Ja"?1:0;
       $kundeseit = date('Y-m-d');
       
      
       $select = $pdo->prepare("insert into kunden(kid, name, vorname, email, geburtstag ,geschlecht, kontaktpermail, kunde_seit) values('$kid', '$name', '$vorname', '$email', '$geburtstag', '$geschlecht', '$kntpermail', '$kundeseit')");
       $select->execute();
       $_SESSION["addSuccess"]=true;
      header('Location: ../HTML Dateien/kunden.php');
//
   } else {
       $_SESSION["addSuccess"]=false;
      header('Location: ../HTML Dateien/kunden.php');
   }
}
//

?>