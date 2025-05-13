<?php 


 class Furniture{
    private float $width;
    private float $length;
    private float $height;
    private bool $is_for_seating = false; 
    private bool $is_for_sleeping = false; 

    public function __construct(float $width, float $length, float $height)
    {
        $this->width = $width; 
        $this->length = $length; 
        $this->height = $height;
    }
 
    public function setIsforseating(bool $is_for_seating): self
    {
        $this->is_for_seating = $is_for_seating;
        return $this;
    }
    
    public function setIsforsleeping(bool $is_for_sleeping): self
    {
        $this->is_for_sleeping = $is_for_sleeping;
        return $this;
    }

    public function getIsforseating(): string
    {
        return $this->is_for_seating ? "Yes" : "No";
    }
    
    public function getIsforsleeping(): string
    {
        return $this->is_for_sleeping ? "Yes" : "No";
    }
    public function getWidth(): float {
        return $this->width;
    }

    public function getLength(): float {
        return $this->length;
    }

    public function getHeight(): float {
        return $this->height;
    }

    public function area() : float {
        return $this->width * $this->length;
    }

    public function volume() : float {
        return $this->area() * $this->height;
    }

   
}