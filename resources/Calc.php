<?php

namespace Resources;

class Calc
{
    protected $operators = ['+', '-', '*'];

    public function getData()
    {
        $index = rand(0, 2);
        $firstNum = rand(1, 100);
        $secondNum = rand(1, 100);
        switch ($this->operators[$index]) {
            case '+':
                $question = ("{$firstNum} + {$secondNum}");
                $answer = $firstNum + $secondNum;
                break;
            case '-':
                $question = ("{$firstNum} - {$secondNum}");
                $answer = $firstNum - $secondNum;
                break;
            case '*':
                $question = ("{$firstNum} * {$secondNum}");
                $answer = $firstNum * $secondNum;
                break;
            default:
                break;
        }
        return [
            'question' => $question,
            'answer' => (string)$answer,
            'description' => 'What is the result of the expression?',
        ];
    }
}
