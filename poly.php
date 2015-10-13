<?php
require_once 'common.php';

abstract class Animal{
    abstract function sound();
}
class Cat extends Animal{
    function sound(){
        return "Mew";
    }
}
class Dog extends Animal{
     function sound(){
        return "Gaf";
    }
}
class Pinguin extends Animal{
     function sound(){
        return "piu";
    }
}
class Ondater extends Animal{
     function sound(){
       return "hrum";
    }
}
class Fish extends Animal{
     function sound(){
        return "";
    }
}
//***********************
function animalChorus(Animal $animal){
    p(get_class($animal) . " say: " . $animal->sound());
}


//*******************
$animals = [
   new Cat(),new Dog(),new Fish(),new Ondater(),new Pinguin()
];

foreach ($animals as $animal) {
    animalChorus($animal);
}