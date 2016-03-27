<?php

class Calculator {

    private $result;
    private $enter;
    public $lista = array(
        "Alabama" => Montgomery,
        "Montana" => Helena,
        "Alaska" => Juneau,
        "Arizona" => Phoenix,
    );

 

    public function __construct($enter) {
        $this->enter = $enter;
        $this->lista = array(
            "Alabama" => Montgomery,
            "Montana" => Helena,
            "Alaska" => Juneau,
            "Arizona" => Phoenix,
        );
    }
       public function shuffle_assoc() {
        shuffle($this->lista);
    }
}
