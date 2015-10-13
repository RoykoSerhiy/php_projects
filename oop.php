<?php
require_once 'common.php';
/*$x = new stdClass();
$x->name = "aaa";
$y = (object)["name" => "asddf"];
class User{
    var $name;
}
$z = new User();
$z -> name = "user";*/
/*class User{
    private $name;
    private $age;
    private $role;
    
    private $data=[];
    private $publicAccsessible = ['age' , 'role'];

    public function __construct($name , $age , $role="guest") {
        $this->name = $name;
        $this->age = $age;
        $this->role = $role;
        p("User: constructor");
    }
    function __get($name)
    {
         if(isset($this->data[$name]))
        {
            return $this->data[$name];
        }
        if(in_array($name, $this->publicAccsessible))
        {
            return $this->{$name};
        
        }
        return NULL;
    }
    function __set($name , $val)
    {
        if($name == 'data')
            return;
        
        if(in_array($name, $this->publicAccsessible))
        {
            $this->{$name} = $val;
        }
        $this->data[$name] = $val;
    }
            function __toString() {
        return "User: name = {$this->name};
        age = {$this->age};"; 
    }
    function __destruct() {
        p("User: destruct");
    }
    
}
$user1 = new User("vfv" , 25 , "fff");
p($user1);
$user2 = new User("user2" ,0);
$user2->age = 30;
$user2->role = "dork";
//$user->hatColor = "green";
p("User Data: {$user2->name}; {$user2->age}; {$user2->role};");*/
/*class User{
    private $name;
    
    function __construct($name) {
        $this->name = $name;
    }
    function  getName()
    {
        return $this->name;
    }
}
//extends
class UserWithRole extends User{
    private $role;
    
    function __construct($name , $role) {
        parent::__construct($name);
          $this->role = $role;  
    }
    function getRole()
    {
        return $this->role;
    }
}

$cat = new UserWithRole("Vasya" , "cat");
$name = $cat->getName();
$role = $cat->getRole();
pr("User: ");

//implements interface
interface Driver{
    function drive();
}
class UserWithCar extends User implements Driver{
    public function drive() {
        p("bi-bi, dr-dr-dr");
    }

}
$driver = new UserWithCar("Semen Petrovich");
$driver->drive();
abstract class Transport {
    abstract function start();
    abstract function stop();
    abstract function signal();
}
class Bus extends Transport
{
    public function signal() {
        p("bi-bi");
    }

    public function start() {
        p("go");
    }

    public function stop() {
        p("stop");
    }

}
$bus = new Bus();
$bus->start();
$bus->signal();
$bus->stop();*/
//home**********
class Car{
    
}
class SportCar extends Car{
    
}
class Truck extends Car{
    
}
class Minibus extends Car{
    
}
class Lamborghini_Reventon extends SportCar{
    
}
class Mersedes_slr_mclaren extends SportCar{
    
}
class Peterbilt_379 extends Truck{
    
}
class Belaz_75710 extends Truck{
    
}
class Ford_Transit extends Minibus{
    
}
class VW_Multivan extends Minibus{
    
}