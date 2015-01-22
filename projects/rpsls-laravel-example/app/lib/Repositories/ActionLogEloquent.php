<?php

class ActionLogEloquent implements ActionLogInterface
{

	/**
	 * Return all logged actions
	 */
	public function all(){
        return ActionLog::all();
    }

	/**
	 * Return specific logged action
	 * @param $id integer
	 */
	public function find($id){
        return ActionLog::find($id);
    }

	/**
	 * Create a logged action
	 * @param $data array
	 */
	public function create(array $data)
    {
        $record = new ActionLog;
        $record->user_action = $data['user_action'];
        return ActionLog::create($data);
    }
}
