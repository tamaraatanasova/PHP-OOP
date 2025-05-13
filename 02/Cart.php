<?php


class Cart {
    private $cartItems = [];

    public function addToCart($item) {
        if (is_array($item) && array_key_exists('amount', $item) && array_key_exists('item', $item)) {
            $this->cartItems[] = $item;
        }
    }

    public function printReceipt() {
        if (empty($this->cartItems)) {
            return "Your cart is empty.";
        }

        $receipt = "";
        $finalPrice = 0;

        foreach ($this->cartItems as $item) {
            $product = $item['item'];
            $amount = $item['amount'];
            $unit = $product->isSellingByKg() ? "kgs" : "gunny sacks";
            $total = $product->getPrice() * $amount;
            $finalPrice += $total;

            $receipt .= "{$product->getName()} | {$amount} {$unit} | total= {$total} denars<br>";
        }

        $receipt .= "Final price amount: {$finalPrice}";
        return $receipt;
    }
}