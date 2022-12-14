<?php

include_once 'database.php';

$options = "";
$msg = "";

// Modification d'une boisson
if (isset($_POST['update'])) {
    
    $query = "UPDATE drink SET name = :name WHERE id = :id";
    $object = $pdo->prepare($query);

    $params = array(
        ":id" => $_POST['id'],
        ":name" => $_POST['name']
    );

    if ($object->execute($params)) {
        // OK
        $msg = "<p>Boisson modifiée</p>";
    }
    else {
        // KO
        $msg = "<p>Problème lors de la modification</p>";
    }
}

// Récupération des boissons (mise à jour avant affichage)
$query = "SELECT * FROM drink";

$object = $pdo->query($query);
$drinks = $object->fetchAll();

foreach ($drinks as $drink) {
    list($id, $name) = $drink;
    $options .= "<option value='$id'>$name</option>";
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

    <?php include_once 'nav.php'; ?>

    <h1>CRUD - Update</h1>

    <form action="update.php" method="post">
        <select name="id" id="id">
            <!-- Généré par PHP -->
            <?= $options ?>
        </select>

        <label for="name">Nom :</label>
        <input type="text" name="name" id="name">

        <input type="submit" value="Modifier" name="update">
    </form>

    <?= $msg ?>

</body>

</html>