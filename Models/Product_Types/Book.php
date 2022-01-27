<?php
require_once(__DIR__ . '../ProductRequest.php');
require_once(__DIR__ . '../Rules.php');

class Book extends ProductRequest
{
    public $weight, $Rules;

    public function __construct($weight)
    {
        $this->weight = $weight;
        $this->validate_weight();
    }

    public function validate_weight()
    {
        $this->Rules = new Rules();
        if (!($this->Rules->required($this->weight, "weight"))) {
            if (!($this->Rules->max($this->weight, "weight", 5))) {
                $this->Rules->digits($this->weight, "weight");
            }
        }
    }

    // Another method if we want after validation of the data that associated with the book (weight)
    // and to send this data to the main product class directly we will create a function in product class
    // then send this data to the main class
    //    public function val_Send_Weight()
//         {
//        if (!($this->Rules->required($this->weight, "weight"))) {
//            if (!($this->Rules->max($this->weight, "weight", 5))) {
//                $this->Rules->digits($this->weight, "weight");
//                parent::Get_weight($this->size);
//            }
//        }
//    }

}