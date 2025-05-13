<?php

require_once __DIR__.'/../solution2/AbstractProduct.php';



class Nuts extends AbstractProduct {
    public function __construct(int $price, bool $sellingByKg) {
        parent::__construct('Nuts', $price, $sellingByKg);
    }
}

