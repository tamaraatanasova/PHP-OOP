<?php

require_once __DIR__.'/../solution2/AbstractProduct.php';



class Orange extends AbstractProduct {
    public function __construct(int $price, bool $sellingByKg) {
        parent::__construct('Orange', $price, $sellingByKg);
    }
}
