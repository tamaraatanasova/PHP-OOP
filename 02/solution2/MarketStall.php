<?php

require_once __DIR__. '/../Products/ProductInterface.php';

class MarketStalll {
    public $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    public function addProductToMarket($name, ProductInterface $product) {
        $this->products[$name] = $product;
    }

    public function getItem($name, $amount) {
        if (!array_key_exists($name, $this->products)) {
            return false;
        }

        return [
            'amount' => $amount,
            'item' => $this->products[$name]
        ];
    }
}

