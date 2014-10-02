<?php

class ActionLogTransformer implements TransformerInterface {

    public function transform($data)
    {

        switch ($data['results'])
        {
            case 'win':
                $resultId = 1;
                break;
            case 'lose':
                $resultId = -1;
                break;
            case 'draw':
                $resultId = 0;

        }
        $output = [
            'user_action' => $data['user_action'],
            'ai_action' => $data['ai_action'],
            'result' => $resultId,
        ];
        return $output;
    }
}