<?php
session_start();
$_SESSION["loginevent"] = true;
if (isset($_POST["einloggen"])) {
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $pdo = new PDO('mysql:host=localhost;dbname=book', 'root', '');

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Überprüfe die maximale Länge der Eingabefelder
        if (strlen($username) > 50 || strlen($email) > 50 || strlen($password) > 50) {
            // Hier kannst du eine Fehlermeldung ausgeben oder andere Aktionen durchführen
            // Zum Beispiel: echo "Die Eingabe darf maximal 50 Zeichen lang sein.";
        } else {
            $stmt = $pdo->prepare("SELECT passwort FROM benutzer WHERE benutzername = :username");
            $stmt->execute(['username' => $username]);
            $Dbpw = $stmt->fetchColumn(0);

            $stmt = $pdo->prepare("SELECT email FROM benutzer WHERE benutzername = :username");
            $stmt->execute(['username' => $username]);
            $Dbmail = $stmt->fetchColumn(0);

            $stmt = $pdo->prepare("SELECT benutzername FROM benutzer WHERE benutzername = :username");
            $stmt->execute(['username' => $username]);
            $Dbuser = $stmt->fetchColumn(0);

            if (password_verify($password, $Dbpw) && $email == $Dbmail && $Dbuser == $username) {
                $_SESSION["logsuc"] = true;
                $_SESSION["loggedin"] = true;
                $stmt = $pdo->prepare("SELECT id FROM benutzer WHERE benutzername = :username");
                $stmt->execute(['username' => $username]);
                $_SESSION["user_id"] = $stmt->fetchColumn(0);
                header('Location: ../HTML Dateien/index.php');
            } else {
                $_SESSION["logsuc"] = false;
                header('Location: ../HTML Dateien/index.php');
            }
        }
    }
}
?>
