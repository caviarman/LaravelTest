<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = new Log();
        $log->userId = $request->userId;
        $log->gameId = $request->gameId;
        $log->question = $request->question;
        $log->userAnswer = $request->userAnswer;
        $log->rightAnswer = $request->rightAnswer;
        $log->points = (int)$request->points;
        
        if ($request->userAnswer === $request->rightAnswer) {
            session()->flash('success', 'Well done!');
        } else {
            $log->points = 0;
            session()->flash('error', 'Oops! Error! Try again');
        }

        $log->save();

        return redirect()->route(
            'game.run',
            [
                'id' => $request->gameId,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
