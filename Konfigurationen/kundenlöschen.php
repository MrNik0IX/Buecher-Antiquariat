<?php
 session_start();
 $_SESSION["addEvent"]=true;
 if(isset($_POST["dksenden"])){
    if(isset($_POST["searchId"])){
        
        $pdo = new PDO('mysql:host=localhost;dbname=book;charset=utf8', 'root', '');
        $id = $_POST["searchId"];
        
        
        $select = $pdo->prepare("delete from kunden where kid='$id'");
        if($select->execute()==1&&$select->rowCount()!=0){
           
            $select->execute();
        
        $_SESSION["addSuccess"]=true;
        header('Location: ../HTML Dateien/kunden.php');
        } else{
            $_SESSION["addSuccess"]=false;
        header('Location: ../HTML Dateien/kunden.php');
        }
//
    } else {
        $_SESSION["addSuccess"]=false;
        header('Location: ../HTML Dateien/kunden.php');
    }
}
//

?>