<?php
class HeroesManager 
{
    private $db;
    
    public function __construct(PDO $db) {
        $this->setDb($db);
    }

    public function setDb($db) {
        $this->db = $db;
    }

public function add(Hero $hero) {
    $query = "INSERT INTO heroes (name) VALUES (:name)";
    $request = $this->db->prepare($query);
    $request->execute([
        ':name' => $hero->getHeroName()
    ]);

    $id = $this->db->lastInsertId();
    $hero->setHeroId($id);
}

public function findAllAlive() {
    $query = "SELECT * FROM heroes WHERE health_point > 0";
    $request = $this->db->prepare($query);
    $request->execute();

    $herosArray =  $request->fetchAll(PDO::FETCH_ASSOC);

    $heroes = [];

    foreach ($herosArray as $hero) {
        $heroes [] = new Hero($hero);
    }

    return $heroes;
}

public function find(int $id) {
    $query = "SELECT * FROM heroes WHERE id=:id";
    $request = $this->db->prepare($query);
    $request->execute([
        'id' => $id
    ]);
    
    $data = $request->fetch();

    $hero = new Hero($data);

    return $hero;


}

public function update($hero) {
    $query = "UPDATE heroes SET health_point = :health_point WHERE id=:id";
    $request = $this->db->prepare($query);
    $request->execute([
        'id' => $hero->getHeroId(),
        'health_point' => $hero->getHeroHP()
    ]);
} 


}