<?php
/**
 * Maak een verbinding met de mysqlserver en database
 */
include('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding met de mysql server";
    } else {
        echo "Er is een interne server error opgetreden"; 
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

/**
 * Maak een select query om de gegevens uit de tabel Persoon te halen
 */

$sql = "SELECT Id
              ,Voornaam
              ,Tussenvoegsel
              ,Achternaam
              ,Telefoonnummer
              ,straatnaam
              ,huisnummer
              ,woonplaats
              ,postcode
              ,landnaam
        FROM Persoon";

//Bereid de de query voor met de method prepare
$statement = $pdo->prepare($sql);

// Voer de query uit
$statement->execute();

// Zet de opgehaalde gegevens in een array van objecten
$result = $statement->fetchAll(PDO::FETCH_OBJ);
// var_dump($result);

$tableRows = "";

foreach($result as $info) {
    $tableRows .= "<tr>
                        <td>$info->Voornaam</td>
                        <td>$info->Tussenvoegsel</td>
                        <td>$info->Achternaam</td>
                        <td>$info->Telefoonnummer</td>
                        <td>$info->straatnaam</td>
                        <td>$info->huisnaam</td>
                        <td>$info->woonplaats</td>
                        <td>$info->postcode</td>
                        <td>$info->landnaam</td>
                        <td>
                            <a href='delete.php?Id=$info->Id'>
                                <img src='img/b_drop.png' alt='cross'>
                            </a>
                        </td>
                        <td>
                            <a href='update.php?Id=$info->Id'>
                                <img src='img/b_edit.png' alt='pencil'>
                            </a>
                        </td>
                   </tr>";
}
?>
<h3>Persoonsgegevens</h3>

<a href="index.php">
    <input type="button" value="Maak een nieuw record">
</a>

<br><br>
<table border='1'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Telefoonnummer</th>
        <th>straatnaam</th>
        <th>huisnummer</th>
        <th>woonplaats</th>
        <th>postcode</th>
        <th>landnaam</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php echo $tableRows; ?>
    </tbody>
</table>




