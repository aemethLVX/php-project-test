<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function playGame(string $message, callable $makeStep)
{
    $success = true;
    $settings = \BrainGames\Settings\get();

    line('Welcome to the Brain Games!');
    line($message);
    line('');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    for ($i = 0; $i < $settings['attempsCount']; ++$i) {
        $result = $makeStep($settings);
        $userAnswer = askQuestion($result['question']);
        if ($userAnswer != $result['answer']) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$result['answer']}'.");
            $success = false;
            break;
        } else {
            line('Correct!');
        }
    }

    showResult($success, $name);
}

function askQuestion(string $question)
{
    line("Question: {$question}");
    return prompt('Your answer');
}

function showResult(bool $error, string $name)
{
    if ($error) {
        line("Let's try again, {$name}!");
    } else {
        line("Congratulations, {$name}!");
    }
}
