<?php

require_once __DIR__.'/../solution2/AbstractProduct.php';


class Kiwi extends AbstractProduct {
    public function __construct(int $price, bool $sellingByKg) {
        parent::__construct('Kiwi', $price, $sellingByKg);
    }
}

