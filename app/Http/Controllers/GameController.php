<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Log;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('games', ['games' => Game::all()]);
    }
    public function create()
    {
        return view('newgame');
    }
    public function store(Request $request)
    {
        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->save();
        return redirect()->route('games.show');
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
        if ($game->name === 'Calc') {
            $run = new \Resources\Calc();
        }
        if ($game->name === 'Balance') {
            $run = new \Resources\Balance();
        }
        if ($game->name === 'Gcd') {
            $run = new \Resources\Gcd();
        }
        if ($game->name === 'Prime') {
            $run = new \Resources\Prime();
        }
        [
            'question' => $game->question,
            'answer' => $game->rightAnswer,
        ] = $run->getData();
        return view(
            'run',
            [
                'game' => $game,
                'logs' => DB::table('logs')
                    ->where('userId', '=', auth()->user()->id)
                    ->where('gameId', '=', $game->id)
                    ->orderBy('id', 'desc')
                    ->paginate(10),
            ]
        );
    }
}
