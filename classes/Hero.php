<?php
class Hero 
{
    private $id;
    private $name;
    private $healthPoint = 100;

    public function __construct(array $data) { // Prend un tableau en argument pour stocker les données 

        // Vérifie si 'id' existe dans le tableau de données
        if (isset($data['id'])) {
            $this->setHeroId($data['id']); // Appelle la méthode pour définir id
        }

        // Vérifie si 'name' existe dans le tableau de données
        if (isset($data['name'])) {
            $this->setHeroName($data['name']); // Appelle la méthode pour définir name
        }

        // Vérifie si 'health_point' existe dans le tableau de données
        if (isset($data['health_point'])) {
            $this->setHeroHP($data['health_point']); // Appelle la méthode pour définir healthPoint
        }
    }

    public function getHeroId()
    {
        return $this->id;
    }

    public function getHeroName()
    {
        return $this->name;
    }

    public function getHeroHP()
    {
        return $this->healthPoint;
    }

    public function setHeroId($id)
    {
        $this->id = $id;
    }

    public function setHeroName($name)
    {
        $this->name = $name;
    }

    public function setHeroHP($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }


    public function hit(Monster $monster)
    {
        $damage = rand(0,20);
        $monster->setMonsterHP($monster->getMonsterHP() - $damage);

        return $damage;

    }
}

