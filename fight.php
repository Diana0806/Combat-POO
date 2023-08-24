<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroesManager = new HeroesManager($db);
$hero = $heroesManager->find($_GET["id"]);

// Démarrage du fight
$fightManager = new FightsManager();
$monster = $fightManager->createMonster('Le Monstre');
$fightResults = $fightManager->Fight($hero, $monster);
$heroesManager->update($hero);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight</title>
</head>
<body>

<?php foreach ($fightResults as $fightResult) {
    echo $fightResult. '<br>';
}
?>

    
</body>
</html>
