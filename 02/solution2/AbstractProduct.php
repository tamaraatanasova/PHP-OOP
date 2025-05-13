<?php

require_once __DIR__ . '/../Products/ProductInterface.php';

abstract class AbstractProduct implements ProductInterface {
    protected string  $name;
    protected int $price;
    protected bool $sellingByKg;

    public function __construct(string $name, int $price, bool $sellingByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function isSellingByKg(): bool {
        return $this->sellingByKg;
    }
}

