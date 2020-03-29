<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Engine\playGame;

function run()
{
    $message = 'What is the result of the expression?';

    $makeStep = function ($settings) {
        $first = rand($settings['from'], $settings['to']);
        $second = rand($settings['from'], $settings['to']);
        $operations = ['+', '-', '*'];
        $type = $operations[array_rand($operations)];

        $question = "{$first} {$type} {$second}";
        $answer = calc($first, $second, $type);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    playGame($message, $makeStep);
}

function calc(int $first, int $second, string $type)
{
    switch ($type) {
        case '+':
            return $first + $second;
        case '-':
            return $first - $second;
        case '*':
            return $first * $second;
    }
}
