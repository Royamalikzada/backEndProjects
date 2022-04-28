<?php

class Cigarette {
    
    /**
     * Tells if the Cigarette is on (true)
     * 
     * @var bool
     */
    protected $isOn = false;

    // /**
    //  * Quantity of tobacco that's left in the cigarette
    //  * 
    //  * @var int
    //  */
    // private $_quantity;

    // // Il costruttore serve ad inizializzare le proprietà declinate all'interno
    // // della classe
    // function __construct($quantity = 10) {
    //     $this->_quantity = $quantity;
    // }

    public function __construct(
        // Promozione di un parametro formale del costruttore in una proprietà della classe
        protected $quantity = 10;
    ) {

    }
    public function getLeftShots(){
        return "You have {$this->quantity} more shots";
    }

    public function inhale($q = 1) {
        if (!$this->isOn) {
            throw new Error('Turn it on first!');
        }

        if ($this->quantity < $q) {
            throw new Error('Tobacco is not enough!');
        }

        $this->quantity -= $q;
    }

    public function turnOff() {
        $this->isOn = false;
    }

    public function turnOn() {
        $this->isOn = true;
    }
}
