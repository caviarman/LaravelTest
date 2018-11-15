<?php

namespace Resources;

class Prime
{
    public function isPrime($num)
    {
        if ($num < 2) {
            return false;
        }
        $iter = function ($acc) use ($num, & $iter) {
            if ($acc > $num / 2) {
                return true;
            }
            if ($num % $acc === 0) {
                return false;
            }
            return $iter($acc + 1);
        };
        return $iter(2);
    }

    public function getData()
    {
        $question = rand(2, 100);
        $answer = $this->isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer,
            'desccription' => 'Answer "yes" if given number is prime. Otherwise answer "no".',
        ];
    }
}
