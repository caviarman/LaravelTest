<?php

namespace Resources;

class Even
{
    public function isEven($num)
    {
        return $num % 2 === 0;
    }

    public function getData()
    {
        $question = rand(1, 100);
        $answer = $this->isEven($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer,
            'description' => 'Answer "yes" if the number is even, otherwise answer "no".'
        ];
    }
}
