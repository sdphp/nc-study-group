<?php

namespace RPSLS;

class Referee {

	protected $rules = [
		'rock' => [
			'rock' => 'draw',
			'paper' => 'lose',
			'scissors' => 'win',
			'lizard' => 'win',
			'spock' => 'lose',
		],
		'paper' => [
			'rock' => 'win',
			'paper' => 'draw',
			'scissors' => 'lose',
			'lizard' => 'lose',
			'spock' => 'win',
		],
		'scissors' => [
			'rock' => 'lose',
			'paper' => 'win',
			'scissors' => 'draw',
			'lizard' => 'win',
			'spock' => 'lose',
		],
		'lizard' => [
			'rock' => 'lose',
			'paper' => 'win',
			'scissors' => 'lose',
			'lizard' => 'tie',
			'spock' => 'win',
		],
		'spock' => [
			'rock' => 'win',
			'paper' => 'lose',
			'scissors' => 'win',
			'lizard' => 'lose',
			'spock' => 'draw',
		],
	];

	/**
	 * Return winner of match
	 */
	public function judgeResults($throw1, $throw2)
    {
        $result = $this->rules[$throw1][$throw2];
        return $result;
    }
}
