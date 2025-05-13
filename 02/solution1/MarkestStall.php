<?php

require_once __DIR__.'/Product.php';


class MarketStall {
    public array $products = [];

    public function __construct(array $products) {
        $this->addProduct($products);
    }

    public function addProduct(array $products) {
        foreach ($products as $key => $value) {
            if (!is_string($key) || !$value instanceof Product) {
                throw new \InvalidArgumentException("Products must be an associative array with product names as keys and Product objects as values.");
            }
        }
        $this->products = $products;
    }

    public function addProductToMarket(string $name, Product $product) {
        $this->products[$name] = $product;
    }

    public function getItem($productName, $amount) {
        if (!array_key_exists($productName, $this->products)) {
            return false;
        }
        $item = $this->products[$productName];
        return [
            'amount' => $amount,
            'item' => $item
        ];
    }
}


// namespace App\Class\Abstract;
// require_once 'ProductInterface.php';
// use App\Class\ProductInterface;

// class MarketStall {
//     public $products;

//     public function __construct(array $products) {
//         $this->products = $products;
//     }

//     public function addProductToMarket($name, ProductInterface $product) {
//         $this->products[$name] = $product;
//     }

//     public function getItem($name, $amount) {
//         if (!array_key_exists($name, $this->products)) {
//             return false;
//         }

//         return [
//             'amount' => $amount,
//             'item' => $this->products[$name]
//         ];
//     }
// }

