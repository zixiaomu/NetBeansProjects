<?php

class Calculator {

    public $lista = array( 
        "Alabama" => "Montgomery",
            "Montana" => "Helena",
            "Alaska" => "Juneau",
            "Arizona" => "Phoenix"
    );

 

    public function __construct() {
        $this->lista = array(
            "Alabama" => "Montgomery",
            "Montana" => "Helena",
            "Alaska" => "Juneau",
            "Arizona" => "Phoenix"
        );
    }
       public function shuffle_assoc() {
        shuffle($this->lista);
    }
    public function check($key,$answer)
    {   
       var_dump($answer);
        var_dump( $this->lista[$key]);
        if ($this->lista[$key]==$answer)
        {
            echo '1';
            return '1';
        }
        else
        {   
            echo '0';
            return '0';
            
        }
    }
}
