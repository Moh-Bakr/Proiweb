<?php

require_once(__DIR__ . '/../ProductRequest.php');
require_once(__DIR__ . '/../Rules.php');

class Furniture extends ProductRequest
{
    public $height, $width, $length, $Rules;

    public function __construct($height, $width, $length)
    {
        $this->height = $height ?? NULL;
        $this->width = $width ?? NULL;
        $this->length = $length ?? NULL;
        $this->validate_HWL();
    }

    public function validate_HWL()
    {
        $this->Rules = new Rules();
        if (!($this->Rules->required($this->length, "length"))) {
            if (!($this->Rules->max($this->length, "length", 5))) {
                $this->Rules->digits($this->length, "length");
            }
        }
        if (!($this->Rules->required($this->height, "height"))) {
            if (!($this->Rules->max($this->height, "height", 5))) {
                $this->Rules->digits($this->height, "height");
            }
        }
        if (!($this->Rules->required($this->width, "width"))) {
            if (!($this->Rules->max($this->width, "width", 5))) {
                $this->Rules->digits($this->width, "width");
            }
        }
    }
// Another method if we want after validation of the data that associated with the Furniture (length,height,width)
// and to send this data to the main product class directly we will create a function in product class
// then send this data to the main class
//
//    public function VSend_HWL()
//    {
//        $this->Rules = new Rules();
//        if (!($this->Rules->required($this->length, "length"))) {
//            if (!($this->Rules->max($this->length, "length", 5))) {
//                $this->Rules->digits($this->length, "length");
//            }
//        }
//        if (!($this->Rules->required($this->height, "height"))) {
//            if (!($this->Rules->max($this->height, "height", 5))) {
//                $this->Rules->digits($this->height, "height");
//            }
//        }
//        if (!($this->Rules->required($this->width, "width"))) {
//            if (!($this->Rules->max($this->width, "width", 5))) {
//                $this->Rules->digits($this->width, "width");
//            }
//        }
//        parent::Get_HWL($this->length, $this->width, $this->height);
//    }
}