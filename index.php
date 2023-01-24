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

    <form action="create.php" method="post">
        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname"><br>

        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" name="infix" id="infix"><br>

        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname"><br>

        <label for="telNumber">Telefoonnummer:</label><br>
        <input type="text" name="telNumber" id="telNumber"><br>
        
        <label for="streetname">straatnaam:</label><br>
        <input type="text" name="streetname" id="streetname"><br>

        <label for="homenumber">huisnummer:</label><br>
        <input type="text" name="homenumber" id="homenumber"><br>

        <label for="liveplace">woonplaats:</label><br>
        <input type="text" name="liveplace" id="liveplace"><br>

        <label for="postcode">postcode:</label><br>
        <input type="text" name="postcode" id="postcode"><br>

        <label for="country">landnaam:</label><br>
        <input type="text" name="country" id="country"><br>

        <input type="submit" value="Verstuur">
    </form>
</body>
</html>