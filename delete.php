<?php

include_once 'database.php';

$msg = "";
$options = "";

if (isset($_POST['delete'])) {

    if (isset($_POST['id']) && $_POST['id'] !== "") {
        $query = "DELETE FROM drink WHERE id = :id";
        $object = $pdo->prepare($query);

        $params = array(
            ":id" => $_POST['id']
        );
        if ($object->execute($params)) {
            // OK
            $msg = "<p>Boisson supprimée</p>";
        } 
        else {
            // KO
            $msg = "<p>Il y a eu un problème lors de la suppression</p>";
        }
    }
    else {
        $msg = "Id invalide";
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

    <?php include_once 'nav.php' ?>

    <h1>CRUD - Delete</h1>

    <form action="delete.php" method="post">
        <select name="id" id="id">
            <!-- Généré par PHP -->
            <?= $options ?>
        </select>

        <input type="submit" value="Supprimer" name="delete">
    </form>

    <?= $msg ?>

</body>

</html>