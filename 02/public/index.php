<?php

require_once __DIR__.'/../autoloader.php';

$orange = new Product('Orange', 35, true);
$potato = new Product('Potato', 240, false);
$nuts = new Product('Nuts', 850, true);
$kiwi = new Product('Kiwi', 670, false);
$pepper = new Product('Pepper', 330, true);
$raspberry = new Product('Raspberry', 555, false);

$marketStall1 = new MarketStall([
    'orange' => $orange,
    'potato' => $potato,
    'nuts' => $nuts
]);

$marketStall2 = new MarketStall([
    'kiwi' => $kiwi,
    'pepper' => $pepper,
    'raspberry' => $raspberry
]);

$cart = new Cart();
$cart->addToCart($marketStall1->getItem('orange', 3)); 
$cart->addToCart($marketStall1->getItem('potato', 2)); 
$cart->addToCart($marketStall2->getItem('raspberry', 1)); 
$cart->addToCart($marketStall2->getItem('pepper', 3)); 
$cart->addToCart($marketStall1->getItem('nuts', 1)); 
$cart->addToCart($marketStall2->getItem('kiwi', 2)); 


echo $cart->printReceipt();

echo "<hr>";

require_once __DIR__.'/../solution2/AbstractProduct.php';
require_once __DIR__.'/../solution2/MarketStall.php';

$kiwi = new Kiwi(670, false);
$orange = new Orange(35, true);
$potato = new Potato(240, false);
$nuts = new Nuts(850, true);
$pepper = new Pepper(330, true);
$raspberry = new Raspberry(555, false);

$marketStall1 = new MarketStalll(['orange' => $orange, 'potato' => $potato, 'nuts' => $nuts]);
$marketStall2 = new MarketStalll(['kiwi' => $kiwi, 'pepper' => $pepper, 'raspberry' => $raspberry]);

$cart = new Cart();
$cart->addToCart($marketStall1->getItem('orange', 3)); 
$cart->addToCart($marketStall1->getItem('potato', 2)); 
$cart->addToCart($marketStall2->getItem('raspberry', 1)); 
$cart->addToCart($marketStall2->getItem('pepper', 3)); 
$cart->addToCart($marketStall1->getItem('nuts', 1)); 
$cart->addToCart($marketStall2->getItem('kiwi', 2)); 

echo $cart->printReceipt();

