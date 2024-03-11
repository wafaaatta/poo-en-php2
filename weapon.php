<?php
// Création d'une classe Weapon où chaque guerrier devra utiliser une arme de la classe Weapon
// La classe Weapon contient un nom et des dégâts ; les guerriers utilisent un objet pour le combat

abstract class Weapon { //deux propriétés protégées :
    protected $name;
    protected $damage;

    public function __construct($name, $damage) {
        $this->name = $name;
        $this->damage = $damage;
    }

    public function getName() {
        return $this->name;
    }

    public function getDamage() {
        return $this->damage;
    }

    // Méthode abstraite pour attaquer
    abstract public function attack(); //La méthode abstraite attack est déclarée, mais elle est implémentée dans les classes enfants.
}

// Trait pour les attaques spéciales
trait SpecialAttack { //Il est destiné à être utilisé classes d'armes.
    public function specialAttack() {
        echo $this->name . " exécute une attaque spéciale !\n";
    }
}

class Sword extends Weapon {
    use SpecialAttack;

    public function attack() {
        echo $this->name . " attaque avec une épée et inflige " . $this->damage . " points de dégâts.\n";
    }
}

class Axe extends Weapon {
    public function attack() {
        echo $this->name . " attaque avec une hache et inflige " . $this->damage . " points de dégâts.\n";
    }
}

class Warrior {
    private $name;
    private $weapon;

    public function __construct($name, Weapon $weapon) {
        $this->name = $name;
        $this->weapon = $weapon;
    }

    public function performAttack() { //La méthode performAttack permet au guerrier d'effectuer une attaque en utilisant son arme.
        echo $this->name . " attaque: ";
        $this->weapon->attack();
    }
}

// Création d'armes et de guerriers en instanciant les classes
$sword = new Sword("Épée", 20);
$axe = new Axe("Hache", 25);

$warrior1 = new Warrior("Guerrier 1", $sword);
$warrior2 = new Warrior("Guerrier 2", $axe);

// Les guerriers attaquent en appelant les méthodes
$warrior1->performAttack();
echo '<br>';
$warrior2->performAttack();
?>
