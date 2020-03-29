<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Engine\playGame;

function run()
{
    $message = 'Answer "yes" if the number is prime, otherwise answer "no".';

    $makeStep = function ($settings) {
        $question = rand($settings['from'], $settings['to']);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    playGame($message, $makeStep);
}

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($x = 2; $x <= sqrt($num); ++$x) {
        if ($num % $x == 0) {
            return false;
        }
    }
    
    return true;
}
