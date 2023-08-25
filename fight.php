<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroesManager = new HeroesManager($db);
$hero = $heroesManager->find($_GET["id"]);

// Démarrage du fight

$fightManager = new FightsManager();

// image des héros
$imageNames = ['hero1.png', 'hero2.png', 'hero3.png', 'hero4.png'];  
$randomImage = $imageNames[array_rand($imageNames)];

// image/nom des monstres
$monsterNames = ['Dracula', 'Ogre', 'Zombie', 'Dragon'];
$monsterImages = ['dracula.png', 'ogre.png', 'zombie.png', 'dragon.png'];

// on combine et on fais du hasard
$monsters = array_combine($monsterNames, $monsterImages);
$monsterName = $monsterNames[array_rand($monsterNames)];
$monsterImage = $monsters[$monsterName];


$monster = $fightManager->createMonster($monsterName);

$fightResults = $fightManager->Fight($hero, $monster);
$heroesManager->update($hero);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/offcanvas-navbar/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Fight</title>
    <style>
      .form-signin .btn-primary {
      font-size: 18px;
    }
      .form-signin .btn-primary:hover {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .name {
      height: 40px;
    }

    .heroes .btn-info:hover{
      background-color: #ffc107;
      border-color: #ffc107;
    }

    .banner {
      background-color: #1E707D;
    }

    .banner h1 {
        color: #EBD9AB;
        font-size: 48px;
      }

      .banner img {
        border-top-left-radius : .375rem;
        border-bottom-left-radius: .375rem;
      }

      .rounds img {
        border-radius : .375rem;
        border-style: outset;
        border-color: #1E707D;
      }

    .alert-warning {
      color: #0C3242;
      background-color: #A4DECA;
      border-color: #8AD7BC;
    }

    .alert-info {
      color: #0C3242;
      background-color: #FAA5A5;
      border-color: #FE9090;
    }

    .fight .gagne {
        width: 100%;
        background-color: #198754;
        color: white;
        height: 50px;
        margin: 0px;
    }

    h2.gagne, h2.perdu {
      line-height : 2.5rem;
    }

    .fight .col-lg-6:last-child {
      width: 100%!important;
    }

    .fight .col-lg-6:last-child .alert-info {
      background: #198754;
      border-color: #198754;
    }

    .fight .col-lg-6:last-child .alert-warning {
      background: #dc3545;
      border: #dc3545;
    }

    .fight .perdu {
      width: 100%;
      background-color: #dc3545;
      border: 1px;
      color: white;
      height: 80px;
      margin: 0px;
      }
    </style>
</head>
<body>
<main class="container">
  <div class="banner d-flex align-items-center p-0 my-3 rounded shadow-sm">
    <img class="me-3 rounded-left" src="./images/logofight1.jpeg" alt="" width="200" height="180">
      <h1 class="mb-0">Fight</h1>
  </div>

  <div class="rounds text-center my-3 p-3 bg-body rounded shadow-sm">
    <h4 class="border-bottom pb-2 mb-0">Round updates</h4>
    <div class="row pt-3">
      <div class="col-lg-6">
        <img src="./images/Monsters/<?php echo $monsterImage; ?>" width="200" height="250" class="d-block mx-auto">
      </div>
      <div class="col-lg-6">
         <img src="./images/Heroes/<?php echo $randomImage; ?>" width="200" height="250" class="d-block mx-auto">
      </div>
    </div>
    <div class="row fight text-body-secondary pt-3 border-bottom-default-color">
    <?php foreach ($fightResults as $key => $message) {
    echo '<div class="col-lg-6">'  ;  
    echo '<div class="alert ';
    if ($key % 2) {
        echo 'alert-warning';
    } else {
        echo 'alert-info';
    }
    echo '" role="alert">';
    echo $message;
    echo '</div>';
    echo '</div>';
} ?>
    </div>
  </div>
    
</body>
</html>
