<?php
require_once('./config/db.php');
require_once('./config/autoload.php');


$manager = new heroesManager($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {

    $hero = new Hero(['name', 'health_point']);
    $hero->setHeroName($_POST['name']);
    $manager->add($hero);

}

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
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">    
<main class="form-signin w-25 m-auto">
<img src="./images/Logo.png" width="150" height="120" class="d-block mx-auto">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">New Hero</h1>
    <div class="form-floating">
      <input type="text" class="name" name="name" placeholder="Name" required>
      
    </div>
    <button class="btn btn-primary w-100 my-2" type="submit">Create</button>
  </form>
  
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2 class="border-bottom pb-2 mb-0 mt-5">Heroes:</h2>
  <?php 
 foreach ($heroes as $hero) { ?>


    <div class="d-flex text-body-secondary pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark"><?php echo $hero->getHeroName(). '<br>';?></strong>
          <a class="btn btn-info" href="./fight.php?id=<?php echo $hero->getHeroId(); ?>">Choose</a>
        </div>
        <span class="d-block"><?php echo $hero->getHeroHP(). '<br>';?></span>
      </div>
    </div>

    <?php
 }
?>

</main>
</body>
</html>