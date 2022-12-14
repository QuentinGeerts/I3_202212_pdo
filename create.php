<?php

$msg = "";

if (isset($_POST['createDrink'])) {

    include_once 'database.php';

    $name = trim($_POST['name']);

    if ($name !== "") {

        // Création de la requête
        $query = "INSERT INTO drink (name) VALUES (:name)";
        $object = $pdo->prepare($query);

        $params = array(
            ":name" => $name
        );

        if ($object->execute($params)) {
            $msg = "<p>Insertion réussie</p>";
        }
        else {
            $msg = "<p>Insertion échouée</p>";
        }

    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include_once 'nav.php' ?>

    <h1>CRUD - Create</h1>

    <form action="create.php" method="post">

        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Créer" name="createDrink">

    </form>

    <?= $msg ?>

</body>

</html>