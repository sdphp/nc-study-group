<?php

namespace RPSLS;

class Player {

    var $options = [
    'rock',
    'paper',
    'scissors',
    'lizard',
    'spock',
    ];

    public function chooseAction()
    {
        return $this->options[array_rand($this->options)];
    }
}