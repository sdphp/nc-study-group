<?php

class HomeController extends BaseController {

    var $actionLog, $actionLogTransformer;

    public function __construct(ActionLogInterface $actionLog, TransformerInterface $actionLogTransformer)
    {
        $this->actionLog = $actionLog;
        $this->actionLogTransformer = $actionLogTransformer;
    }
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
		return View::make('chooser');
	}

    public function throwAction($action)
    {
        $validator = Validator::make(['action' => $action], [
                'action' => 'required|in:rock,paper,scissors,lizard,spock'
            ]);
        if($validator->passes())
        {
            $judge    = new \RPSLS\Referee();
            $player   = new \RPSLS\Player();
            $myAction = $player->chooseAction();
            $results  = $judge->judgeResults($action, $myAction);
            $record = $this->actionLog->create(
                $this->actionLogTransformer->transform([
                        'user_action'   => $action,
                        'ai_action'     => $myAction,
                        'results'       => $results,
                    ])
            );
            return View::make('chooser')->with(
                ['results' => $results, 'yourChoice' => $action, 'myChoice' => $myAction]
            );
        }
        Session::flash('error', $validator->messages());
        return Redirect::route('chooser');
    }

}
