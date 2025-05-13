<?php



interface ProductInterface {
    public function getName(): string;
    public function getPrice(): int;
    public function isSellingByKg(): bool;
}
