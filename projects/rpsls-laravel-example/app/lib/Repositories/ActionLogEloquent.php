<?php

class ActionLogEloquent implements ActionLogInterface
{
    public function all(){
        return ActionLog::all();
    }

    public function find($id){
        return ActionLog::find($id);
    }

    public function create($data)
    {
        $record = new ActionLog;
        $record->user_action = $data['user_action'];
        return ActionLog::create($data);
    }
}