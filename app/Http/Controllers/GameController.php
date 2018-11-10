<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GameController extends Controller
{
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
            'id'=> $game->id,
        ]);
    }
    public function log(Request $request)
    {
        return $request->all();
    }
}
