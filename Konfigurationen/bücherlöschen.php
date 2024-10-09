<?php
 session_start();
 $_SESSION["addEvent"]=true;
 if(isset($_POST["delconfirm"])){
    if(isset($_POST["searchId"])){
        
        $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
        

        $id = $_POST["searchId"];
        
        $select = $pdo->prepare("delete from buecher where id='$id'");
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