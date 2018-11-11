<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Game $games)
    {
        return view('games', ['games' => $games->all()]);
    }
    public function run($id)
    {
        $game = Game::find($id);
        if ($game->name === 'Even') {
            $run = new \Resources\Even();
        }
        if ($game->name === 'Progression') {
            $run = new \Resources\Progression();
        }
        [
            'question' => $question,
            'description' => $description,
            'answer' => $rightAnswer,
        ] = $run->getData();
        return view('run', [
            'question' => $question,
            'description' => $description,
            'rightAnswer' => $rightAnswer,
            'gameId' => $game->id,
        ]);
    }
}
