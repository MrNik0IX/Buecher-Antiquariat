<?php


// Verbindung zur Datenbank herstellen
$conn = new mysqli("localhost", "root","" , "book");



// Prüfen ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Benutzereingaben aus dem Formular abrufen
    $name = $_POST['name'] ?? null;
    $vorname = $_POST['vorname'] ?? null;
    $benutzername = $_POST['benutzername'] ?? null;
    $email = $_POST['email'] ?? null;
    $passwort = $_POST['passwort'] ?? null;

    // Prüfen ob alle Felder ausgefüllt sind
    if ($name && $vorname && $benutzername && $email && $passwort) {
        // Passwort verschlüsseln
        $passwort = password_hash($passwort, PASSWORD_DEFAULT);

        // SQLabfrage vorbereiten und ausführen
        $stmt = $conn->prepare("insert into benutzer (benutzername, name, vorname, passwort, email) values (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $benutzername, $name, $vorname, $passwort, $email);

        if ($stmt->execute()) {
            echo "<script>alert('Registrierung erfolgreich!'); window.location.href='index.php';</script>";
        } else {
            echo "Fehler: " . $stmt->error;
        }

        // Statement schließen
        $stmt->close();
    } else {
        echo "Bitte füllen Sie alle Felder aus.";
    }
} else {
    echo "Ungültige Anfrage.";
}

// Verbindung schließen
$conn->close();
?>
