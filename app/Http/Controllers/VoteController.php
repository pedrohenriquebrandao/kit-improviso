<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function index() {
        $soma_azul = DB::table('votes')->sum('azul');
        $soma_vermelho = DB::table('votes')->sum('vermelho');
        $soma_amarelo = DB::table('votes')->sum('amarelo');

        return view('vote', compact('soma_azul', 'soma_vermelho', 'soma_amarelo'));
    }

    public function store(Request $request) {
        $azul = $request->input('azul');
        $vermelho = $request->input('vermelho');
        $amarelo = $request->input('amarelo');

        DB::table('votes')->insert([
            'azul' => $azul,
            'vermelho' => $vermelho,
            'amarelo' => $amarelo,
        ]);

        return redirect()->back();
    }
}
