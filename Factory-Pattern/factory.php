<?php
/**
 * Created by Salman Zafar.
 * User: sam
 * Date: 11/20/17
 * Time: 2:58 PM
 */
//Factory Pattern
// Helps in de-Coupling the Code(cleint code doesn't nee dto worry about how to create objects)
// Makes Code easier to test

interface shape{

    public function draw();

}

class position{
}

class Rectangle implements shape {

    public $x;
    public $y;
    public $width;
    public $hieght;
    private $position;

    public function __construct($pos)
    {
        $this->position=$pos;
    }

    public function draw()
    {
        // TODO: Implement draw() method.
        echo "Drawing a Shape";
    }
}

class ShapeFactory {

    public function create($type)
    {
        if($type=="Rectangle")
        {
            return new Rectangle(new position());
        }
    }
}

//function draw_stuff(shape $shape)
//{
//    $shape->draw();
//}
//$rec = new Rectangle();
//draw_stuff($rec);

$fs = new ShapeFactory();
$shape = $fs->create("Rectangle");
echo $shape->draw();