<?php

require_once __DIR__.'/Furniture.php';
require_once __DIR__.'/Printable.php';


class Sofa extends Furniture implements Printable{
    private int $seats = 0;
    private int $armrests = 0;
    private float $length_opened= 0;

    public function __construct(float $width, float $length, float $height)
    {
        parent::__construct($width, $length, $height);
    }
    
    public function setSeats(int $seats): self
    {
        $this->seats = $seats;
        return $this;
    }
    
    public function setArmrests(int $armrests): self
    {
        $this->armrests = $armrests;
        return $this;
    }
    
    public function setLength_opened(float $length_opened): self
    {
        $this->length_opened = $length_opened;
        return $this;
    }
    
    public function getSeats(): int
    {
        return $this->seats;
    }
    
    public function getArmrests(): int
    {
        return $this->armrests;
    }
        
    public function getLength_opened(): float
    {
       return $this->length_opened;
    }

    function area_opened() : void {
        if($this->getIsforsleeping() === "Yes")
        {
            echo $this->length_opened * $this->getWidth();

        }
        else echo "This sofa is for sitting only, it has {$this->armrests} armrests and {$this->seats} seats";
    }

    public function print(): void{
        echo get_class($this) . ", sitting-only, " . $this->area() . " cm²<br>";
    }

    public function sneakpeek(): void {
        echo get_class($this) . "<br>";
    }

    public function fullinfo(): void {
        echo get_class($this) . ", " . ($this->getIsForSleeping() === "Yes" ? "sleeping-capable" : "sitting-only") .
            ", " . $this->area() . " cm², width: {$this->getWidth()} cm, length: {$this->getLength()} cm, height: {$this->getHeight()} cm<br>";
    }
}