<?php
// Voeg de database-gegevens
require('config.php');

// Maak de $dsn oftewel de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    // Maak een nieuw PDO object zodat je verbinding hebt met de mysql database
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        // Maak een update query voor het updaten van een record
        $sql = "UPDATE Persoon
                SET Voornaam = :Voornaam,
                    Tussenvoegsel = :Tussenvoegsel,
                    Achternaam = :Achternaam,
                    Telefoonnummer = :Telefoonnummer,
                    straatnaam = :straatnaam,
                    huisnummer = :huisnummer,
                    woonplaats = :woonplaats,
                    postcode = :postcode,
                    landnaam = :landnaam,
                WHERE Id = :Id";

        // Roep de prepare-method aan van het PDO-object $pdo
        $statement = $pdo->prepare($sql);

        // We moeten de placeholders een waarde geven in de sql-query
        $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
        $statement->bindValue(':Voornaam', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':Tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
        $statement->bindValue(':Achternaam', $_POST['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':Telefoonnummer', $_POST['telNumber'], PDO::PARAM_STR);
        $statement->bindValue(':straatnaam', $_POST['streetname'], PDO::PARAM_STR);
        $statement->bindValue(':huisnummer', $_POST['homenumber'], PDO::PARAM_STR);
        $statement->bindValue(':woonplaats', $_POST['liveplace'], PDO::PARAM_STR);
        $statement->bindValue(':postcode', $_POST['postcode'], PDO::PARAM_STR);
        $statement->bindValue(':landnaam', $_POST['country'], PDO::PARAM_STR);

        // We gaan de query uitvoeren op de mysql-server
        $statement->execute();

        echo "Het record is geupdate";
        header("Refresh:3; read.php");

    } catch(PDOEception $e) {
        echo "Het record is niet geupdate";
        header("Refresh:3; read.php");
    }
    exit();
}

// Maak een select-query
$sql = "SELECT * FROM Persoon 
        WHERE Id = :Id";

// Voorbereiden van de query
$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PDO CRUD</title>
</head>
<body>
    <h1>PDO CRUD</h1>

    <form action="update.php" method="post">

        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname" value="<?php echo $result->Voornaam; ?>"><br><br>

        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" name="infix" id="infix" value="<?php echo $result->Tussenvoegsel; ?>"><br><br>

        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname" value="<?php echo $result->Achternaam; ?>"><br><br>

        <label for="telNumber">Telefoonnummer:</label><br>
        <input type="text" name="telNumber" id="telNumber" value="<?php echo $result->Telefoonnummer; ?>"><br><br>

        <label for="streetname">straatnaam:</label><br>
        <input type="text" name="streetname" id="streetname" value="<?php echo $result->straatnaam; ?>"><br><br>

        <label for="homenumber">huisnummer:</label><br>
        <input type="text" name="homenumber" id="homenumber" value="<?php echo $result->huisnummer; ?>"><br><br>

        <label for="liveplace">woonplaats:</label><br>
        <input type="text" name="liveplace" id="liveplace" value="<?php echo $result->woonplaats; ?>"><br><br>

        <label for="postcode">postcode:</label><br>
        <input type="text" name="postcode" id="postcode" value="<?php echo $result->postcode; ?>"><br><br>

        <label for="country">landnaam:</label><br>
        <input type="text" name="country" id="country" value="<?php echo $result->landnaam; ?>"><br><br>

        <input type="hidden" name="Id" value="<?php echo $result->Id; ?>">

        <input type="submit" value="Verstuur">
    </form>
</body>
</html>