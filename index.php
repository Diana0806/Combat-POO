<?php
require_once('./config/db.php');
require_once('./config/autoload.php');


$manager = new heroesManager($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

    $hero = new Hero(['name', 'health_point']);
    $hero->setHeroName($_POST['name']);
    $manager->add($hero);

}

$imageNames = ['hero1.png', 'hero2.png', 'hero3.png', 'hero4.png'];  

$heroes = $manager->findAllAlive();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style/main.css">
    <title>Combat</title>
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

    </style>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">    
<main class="form-signin w-25 m-auto">
<img src="./images/logofight2.png" width="200" height="150" class="rounded d-block mx-auto">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal mt-5">New Hero</h1>
    <div class="form-floating">
      <input type="text" class="name rounded w-100" name="name" placeholder="Name" required>
      
    </div>
    <button class="btn btn-primary w-100 my-2" type="submit">Create</button>
  </form>
  
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2 class="border-bottom pb-4 mb-0 mt-5 fw-normal h3">Heroes:</h2>
  <?php 
 foreach ($heroes as $hero) { 
  $randomImage = $imageNames[array_rand($imageNames)];
  ?>
end

    <div class="heroes d-flex text-body-secondary pt-3">
    <img src="./images/Heroes/<?php echo $randomImage; ?>" width="48" height="48" class="d-block mx-auto rounded-circle me-3">
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark h5"><?php echo $hero->getHeroName(). '<br>';?></strong>
          <a class="btn btn-info" href="./fight.php?id=<?php echo $hero->getHeroId(); ?>">Choose</a>
        </div>
        <span class="d-block fw-bold text-success"><i class="bi bi-heart-fill text-danger"></i> <?php echo $hero->getHeroHP(). '<br>';?></span>
      </div>
    </div>

    <?php
 }
?>

</main>
</body>
</html>