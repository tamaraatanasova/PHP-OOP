<?php

require_once __DIR__.'/Furniture.php';
require_once __DIR__.'/Sofa.php';
require_once __DIR__.'/Chair.php';
require_once __DIR__.'/Bench.php';

//part 1
$furniture = new Furniture(200, 150, 100);
$furniture->setIsforseating(true)->setIsforsleeping(true);

echo "<strong>Furniture: </strong>:<br>";
echo "Area: {$furniture->area()}<br>Volume: {$furniture->volume()}<br>For seating: {$furniture->getIsforseating()}<br>For sleeping: {$furniture->getIsforsleeping()}<br>";
echo "<br><hr><br>";

//part 2
$sofa1 = new Sofa(200, 150, 100);
$sofa1->setSeats(3)->setArmrests(2)->setIsForSleeping(false);
$sofa1->setIsforseating(true);
echo "Sofa Area: ".$sofa1->area()."<br>";
echo "Sofa Volume: ".$sofa1->volume()."<br>";
echo "<strong>Area oppend:(is_for_sleaping = no)</strong>:<br>";
$sofa1->area_opened();
echo "<br><hr><br>";

$sofa1->setIsforsleeping(true);
$sofa1->setLength_opened(15.2);
echo "<strong>Area oppend:(is_for_sleaping = yes)</strong>:<br>";
$sofa1->area_opened();
echo "<br><hr><br>";


//part 3
$bench1 = new Bench(200, 150, 100);
$bench1->sneakpeek();
$bench1->print();
$bench1->fullinfo();
echo "<br><hr><br>";

$chair1 = new Chair(50, 50, 100);
$chair1->sneakpeek();
$chair1->print();
$chair1->fullinfo();