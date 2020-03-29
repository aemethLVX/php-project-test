<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Engine\playGame;

function run()
{
    $message = 'Find the greatest common divisor of given numbers.';

    $makeStep = function ($settings) {
        $first = rand($settings['from'], $settings['to']);
        $second = rand($settings['from'], $settings['to']);
        $question = "{$first} {$second}";
        $answer = gcd($first, $second);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    playGame($message, $makeStep);
}

function gcd(int $a, int $b)
{
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}
