<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showChooser()
	{
		return View::make('choser');
	}

    public function throwAction($action)
    {
        $judge = new \RPSLS\Referee();
        $player = new \RPSLS\Player();
        $myAction = $player->chooseAction();
        $results = $judge->judgeResults($action, $myAction);
        return View::make('choser')->with(['results'=>$results, 'yourChoice'=>$action,'myChoice'=>$myAction]);
    }

}
