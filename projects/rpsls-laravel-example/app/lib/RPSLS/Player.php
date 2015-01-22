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


	/**
	 * Get the Player's action
	 */
	public function chooseAction()
    {
        return $this->options[array_rand($this->options)];
    }
}
