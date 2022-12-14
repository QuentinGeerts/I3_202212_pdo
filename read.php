<?php

/**
 * include vs include_once : (pareil pour require vs require_once)
 * Il n'y a qu'une seule différence entre include() et include_once().
 * Si le code d'un fichier a déjà été inclus, il ne sera pas inclus à nouveau si nous utilisons include_once()
 * 
 * include vs require  :
 * Si include() n'est pas en mesure de trouver le fichier spécifié sur l'emplacement à ce moment-là,
 * il lancera un avertissement, mais il n'arrêtera pas l'exécution du script.
 * Pour le même scénario, require() lancera une erreur fatale et arrêtera l'exécution du script.
 */

// Inclure la connextion à la base de données
include_once 'database.php';

// Variables globales
$rows = "";

/**
 * Logique de récupération
 */

// Requête SQL pour récupérer toutes les boissons
$query = "SELECT * FROM drink";

// Prépare et exécute une requête SQL sans marque substitutive
/**
 * @param {string} $statement - La requête à exécuter
 * @param {int} $fetchMode - Le mode de récupération (default : PDO::FETCH_BOTH)
 * @return {PDOStatement | false}
 */
$object = $pdo->query($query);

// Récupérer les données présentes dans l'objet PDOStatement
// $drink1 = $object->fetch();
// $drink2 = $object->fetch(PDO::FETCH_BOTH);
// PDO::FETCH_BOTH  → Permet d'indexer les données par leur nom de colonne ou index (défaut)
// PDO::FETCH_ASSOC → Permet d'indexer les données par leur nom de colonne
// PDO::FETCH_NUM   → Permet d'indexer les données par leur index
// $drink1 = $object->fetch(PDO::FETCH_NUM);
// print_r($drink1);

// Récupérer toutes les données présentes dans l'objet
$drinks = $object->fetchAll();

foreach ($drinks as $index => $drink) {
    list($id, $name) = $drink;

    $rows .= "<tr><td>$id</td><td>$name</td></tr>";
}

/**
 * Vue
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table { 
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            width: 150px;
            padding: 10px 0;
        }
    </style>
</head>

<body>

    <h1>CRUD - Read</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <!-- Généré par PHP -->
            <?= $rows ?> 
        </tbody>
    </table>

</body>

</html>