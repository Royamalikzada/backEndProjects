<?php

// camelCase
// PascalCase

// La classe che ne estende un'altra si chiama Sottoclasse
// La classe che viene estesa si chiama Superclasse
class ECig extends Cigarette {

    public function __construct(
        private $_watt =35,
        $quantity = 6
        ){
        parent::__construct($quantity);

    }
    

    public function decrementWattPower() {
        $this->_watt--;
    }
    public function getLeftShots(){
        return "you have {$this->quantity} ml left in your tank";
    }

    public function incrementWattPower() {
        $this->_watt++;
    }
}

$ecig = new ECig();
