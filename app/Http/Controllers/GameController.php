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
        [
            'question' => $game->question,
            'answer' => $game->rightAnswer,
        ] = $game->getGameInstance()->getData();
        
        if ($game->name === 'Gcd' && $game->rightAnswer === '1') {
            return redirect()->refresh();
        }

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
