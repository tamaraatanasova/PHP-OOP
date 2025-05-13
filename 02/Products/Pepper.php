<?php

require_once __DIR__.'/../solution2/AbstractProduct.php';


class Pepper extends AbstractProduct {
    public function __construct(int $price, bool $sellingByKg) {
        parent::__construct('Papper', $price, $sellingByKg);
    }
}
