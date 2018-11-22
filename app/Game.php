<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
    public function getGameInstance()
    {
        switch ($this->name) {
            case 'Even':
                return new \Resources\Even();
            case 'Progression':
                return new \Resources\Progression();
            case 'Calc':
                return new \Resources\Calc();
            case 'Balance':
                return new \Resources\Balance();
            case 'Gcd':
                return new \Resources\Gcd();
            case 'Prime':
                return new \Resources\Prime();
            default:
                break;
        };
    }
}
