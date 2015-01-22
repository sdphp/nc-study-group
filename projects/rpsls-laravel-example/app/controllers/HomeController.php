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
		// Load default view
		return View::make('chooser');
	}

    public function throwAction($action)
    {
		/*
		 * Make sure the action given is valid
		 * /throw/rock works...
		 * /throw/nothing doesn't...
		 */
        $validator = Validator::make(['action' => $action], [
			'action' => 'required|in:rock,paper,scissors,lizard,spock'
		]);

        if($validator->passes())
        {
			// Represents the user
            $judge    = new \RPSLS\Referee();

			// Represents the server
            $player   = new \RPSLS\Player();

			// Chose server action
            $myAction = $player->chooseAction();

			// Who won?
            $results  = $judge->judgeResults($action, $myAction);

			// Record results to persistance
            $record = $this->actionLog->create(
                $this->actionLogTransformer->transform([
                        'user_action'   => $action,
                        'ai_action'     => $myAction,
                        'results'       => $results,
                    ])
            );

			// Display results to user
            return View::make('chooser')->with(
                ['results' => $results, 'yourChoice' => $action, 'myChoice' => $myAction]
            );
        }

		// Validation failed...pass an error message to the user
        Session::flash('error', $validator->messages());
        return Redirect::route('chooser');
    }

}
