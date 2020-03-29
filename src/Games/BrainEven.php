<?php

namespace BrainGames\Games\BrainEven;

use function BrainGames\Engine\playGame;

function run()
{
    $makeStep = function ($settings) {
        $question = rand($settings['from'], $settings['to']);
        $answer = isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    $message = 'Answer "yes" if the number is even, otherwise answer "no".';
    
    playGame($message, $makeStep);
}

function isEven(int $num)
{
    return $num % 2 === 0;
}
