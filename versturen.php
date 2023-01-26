<?php
include "data/private/DBconfig.php";

if (!empty($_POST["submit"]) == true) {
    $melding = "";
    $naam = htmlspecialchars($_POST['name']);
    $telefoon = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['mail']);
    $informatie = htmlspecialchars($_POST['information']);
    $lokatie = htmlspecialchars($_POST['location']);

    // Controleer of e-mail al bestaat (geen dubbele adressen)
    $sql = "SELECT * FROM data WHERE mail = ?";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array($email));
    $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($resultaat) {
        $melding = "Dit e-mailadres is al geregistreerd";
    } else {
        $sql = "INSERT INTO data (ID, `name`, mail, phone, information, `location`)
                            values (null,?,?,?,?,?)";
        // ID = null, de rest is ?
        $stmt = $verbinding->prepare($sql);
        try {
            $stmt->execute(
                array(
                    $naam,
                    $telefoon,
                    $email,
                    $informatie,
                    $lokatie
                )
            );

            $melding = "Vraag verstuurd!";
            header("location: Toevoegen.php");

        } catch (PDOException $e) {
            $melding = "Kon de vraag niet versturen." . $e->getMessage();
        }
        var_dump($sql);
        echo "<div id='melding'>" . $melding . "</div>";
        //  Bevestiging per e-mail

    }
    echo($melding);
}
?>