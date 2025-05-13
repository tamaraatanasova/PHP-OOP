<?php

require_once __DIR__.'/Furniture.php';

class Chair extends Furniture implements Printable{
    public function print(): void{
        echo get_class($this) . ", sitting-only, " . $this->area() . " cm²<br>";
    }

    public function sneakpeek(): void {
        echo get_class($this) . "<br>";
    }

    public function fullinfo(): void {
        echo get_class($this) . ", sitting-only, " . $this->area() . " cm², width: {$this->getWidth()} cm, length: {$this->getLength()} cm, height: {$this->getHeight()} cm<br>";
    }
}