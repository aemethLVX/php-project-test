<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Engine\playGame;

function run()
{
    $message = 'What number is missing in the progression?';

    $makeStep = function ($settings) {
        $length = 10;
        $diff = rand($settings['from'], $settings['to']);
        $start = rand($settings['from'], $settings['to']);
        $removedElementKey = rand(0, $length - 1);

        $progression = getProgression($start, $length, $diff);
        $answer = $progression[$removedElementKey];
        $progression[$removedElementKey] = '..';
        $question = implode(' ', $progression);

        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    playGame($message, $makeStep);
}

function getProgression(int $start, int $length, int $diff = 2)
{
    $result = [];
    for ($i = 0; $i < $length; ++$i) {
        $result[] = $start + $diff * $i;
    }
    return $result;
}
