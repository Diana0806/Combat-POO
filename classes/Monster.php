<?php
class Monster {

    private $name;
    private $healthPoint;

    public function getMonsterName()
    {
        return $this->name;
    }

    public function getMonsterHP()
    {
        return $this->healthPoint;
    }

    public function setMonsterName($name)
    {
        $this->name = $name;
    }

    public function setMonsterHP($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    public function hit(Hero $hero)
    {
        $damage = rand(0,15);
        $hero->setHeroHP($hero->getHeroHP() - $damage);

        return $damage;

    }
}
