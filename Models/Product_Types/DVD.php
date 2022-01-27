<?php
require_once(__DIR__ . '../ProductRequest.php');
require_once(__DIR__ . '../Rules.php');

class DVD extends ProductRequest
{
    public $size;
    private $Rules;

    public function __construct($size)
    {
        $this->size = $size;
        $this->validate_size();
    }

    public function validate_size()
    {
        $this->Rules = new Rules();
        if (!($this->Rules->required($this->size, "size"))) {
            if (!($this->Rules->max($this->size, "size", 5))) {
                $this->Rules->digits($this->size, "size");
            }
        }
    }
    
// Another method if we want after validation of the data that associated with the dvd (size)
// and to send this data to the main product class directly we will create a function in product class
// then send this data to the main class

//    public function val_Send_Size()
//    {
//        $this->Rules = new Rules();
//        if (!($this->Rules->required($this->size, "size"))) {
//            if (!($this->Rules->max($this->size, "size", 5))) {
//                $this->Rules->digits($this->size, "size");
//                parent::Get_Size($this->size);
//            }
//        }
//    }

}



