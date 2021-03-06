<?php
use Framework\Inspector as Inspector;
use Framework\Doghouse as Doghouse;
include 'autoload.php';

/*
 * @params  
 *      $class  Direcció completa de la classe
 *              exemple: Framework\Database\Tables
 * @desc    Funció per a carregar les classes de forma dinàmica
 *          If we need to load the Framework\Database\Driver\Mysqlclass, we 
 *          will look for the file framework/database/driver/mysql.php(assuming 
 *          our frameworkfolder is in the PHP includepath)
 */


// Tells PHP to use the autoload()method to load a class file by name
spl_autoload_register('autoload');
// Tells PHP to use the Autoloader::autoload()method to load a class file by name
// //La comento perquè si no me declara les classes dues vegades!
//spl_autoload_register(array('autoloader', 'autoload'));            

    
//Obtenir el comentari d'una classe;
$inspector = new Inspector("Doghouse");

class Car extends Framework\Base
{
    /**
    * @readwrite
    */
    protected $_color;
    /**
    * $write
    */
    protected $_model;
    
    public function __construct($color, $model) {
        $this->_model = $model;
        $this->_color = $color;
    }
    
    public function imprimir() {
        return "El meu cotxe es un ".$this->_model." de color ".$this->_color;
    }
}

$car = new Car('fiat panda','vermell');
//echo $car->imprimir();



class Hello extends Framework\Base
{
/**
* @readwrite
*/
protected $_world="patata";

/*
public function setWorld($value)
{
echo "your setter is being called!";
$this->_world = $value;
}
public function getWorld()
{
echo "your getter is being called!";
return $this->_world;
}
 * */
}
$hello = new Hello();
//Set
//$hello->world = "foo!";
//Get
//echo $hello->world;



$configuration = new Framework\Configuration(array(
    "type" => "ini"
));
//Obtengo el Driver de classe Ini
$configuration = $configuration->initialize();
//Parseo el fitxer de configuracio
$resultat = $configuration->parse('config');
var_dump($resultat);
echo "</br>";
echo("<p>El tipus de base de dades &eacute;s <strong>".$resultat->database->default->type)."</strong></p>";

?>