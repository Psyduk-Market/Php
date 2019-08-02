<!DOCTYPE html>
<html>
<head>
    <title>Classes in PHP</title>
</head>
<body>
    <h1>Classes</h1>

    <?php
        // BEGIN EXERCISE 8b.

        require_once('Person.php');
        require_once('Alien.php');
        require_once('Species.php');

        $person1 = new Person("John", 21, "Green");
        $person2 = new Person("Sally", 24, "Yellow");
        $person3 = new Person("Alice", 19, "Red");
        $person4 = new Person("Patrick", 21, "Blue");
        $person5 = new Person("Batman", 30, "Black");
        $people = array($person1, $person2, $person3, $person4, $person5);

        $alien1 = new Alien("Blork", "425", "Blorkenium Falcon", "Blork stunner");

        // BEGIN EXERCISE 9a.
        // Replace this line with something that prints out a persons name.
//        print_r($people);
        echo "Show exist names" . "<br>";
        foreach ($people as $person){
            echo $person->getName() . "<br>";
        }
        // Replace this line with something that sets the person's name to something else.
        echo "Set a new name to each exist names" . "<br>";
        foreach ($people as $person){
            $newName = $person->getName() . "i";
            $person->setName($newName);
            echo $person->getName() . "<br>";
        }
        // Replace this line with something that prints out a persons name and compare with the previous result.
        // Nothing to do here

        function print_people($people) {
            // BEGIN EXERCISE 9b.
            echo "Show each person informations" . "<br>";
            foreach ($people as $person){
                echo $person->getName() . " " . $person->getAge() . " " . $person->getFavouriteColour() . "<br>";
            }
        }

        print_people($people);

        // BEGIN EXERCISE 9c.
        // Make Batman and patrick eat a 'Carrot' and some 'French Fries
        echo "Make Batman and patrick eat a 'Carrot' and some 'French Fries" . "<br>";
        foreach ($people as $person){
            $name = $person->getName();
            if ($name == "Batmani"){
                echo $person->eatFood("Carrot") . "<br>";
            }
            elseif ($name == "Patricki"){
                echo $person->eatFood("French Fries") . "<br>";
            }
        }

        // BEGIN EXERCISE 10a.
        echo "Firing laser and flying spaceship" . "<br>";
        // Fire the laser.
        $alien1->fireLaser(4) . "<br>";
        // Then fly away in your spaceship.
        $alien1->flySpaceship();

        function print_aliens($aliens) {
            // EXERCISE 10b.
            echo "Name: " . $aliens->getName() . "<br>";
            echo "Age: " . $aliens->getAge() . "<br>";
            echo "Laser name: " . $aliens->getLaserName() . "<br>";
            echo "Spaceship Name: " . $aliens->getSpaceshipName() . "<br>";
        }

        print_aliens($alien1);

        function make_all_species_jump($people, $aliens) {
            // BEGIN EXERCISE extra.
            foreach ($people as $person) {
                echo $person->jump() . "<br>";
            }
            echo $aliens->jump() . "<br>";
        }
        make_all_species_jump($people, $alien1)

    ?>
</body>
</html>
