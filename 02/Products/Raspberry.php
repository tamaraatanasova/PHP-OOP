<?php

require_once __DIR__.'/../solution2/AbstractProduct.php';



class Raspberry extends AbstractProduct {
    public function __construct(int $price, bool $sellingByKg) {
        parent::__construct('Raspberry', $price, $sellingByKg);
    }
}

