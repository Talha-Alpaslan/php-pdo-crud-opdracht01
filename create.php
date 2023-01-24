<?php
// var_dump($_POST);exit();
include('config.php');

// DSN staat voor data sourcename.
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    echo "Er is een verbinding met de database";
} catch(PDOException $e) {
    echo "Er is helaas geen verbinding met de database.<br>
          Neem contact op met de Administrator<br>";
    echo "Systeemmelding: " . $e->getMessage();
}
// Maak de sql query voor het inserten van een record
$sql = "INSERT INTO Persoon (Id
                            ,Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,Telefoonnummer
                            ,straatnaam
                            ,huisnummer
                            ,woonplaats
                            ,postcode
                            ,landnaam)
        VALUES              (NULL
                            ,:firstname
                            ,:infix
                            ,:lastname
                            ,:telNumber
                            ,:streetname
                            ,:homenumber
                            ,:liveplace
                            ,:postcode
                            ,:country);";
// Maak de query gereed met de prepare-method van het $pdo-object
$statement = $pdo->prepare($sql);
$statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':infix', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':telNumber', $_POST['telNumber'], PDO::PARAM_STR);
$statement->bindValue(',:streetname', $_POST['streetname'], PDO::PARAM_STR);
$statement->bindValue(',:homenumber', $_POST['homenumber'], PDO::PARAM_STR);
$statement->bindValue(',:liveplace', $_POST['liveplace'], PDO::PARAM_STR);
$statement->bindValue(',:postcode', $_POST['postcode'], PDO::PARAM_STR);
$statement->bindValue(',:country', $_POST['country'], PDO::PARAM_STR);
// Vuur de query af op de database...
$statement->execute();

// Hiermee sturen we automatisch door naar de pagina read.php
header('Location: read.php');



