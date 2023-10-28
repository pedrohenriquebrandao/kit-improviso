<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\People;

class DraftController extends Controller
{
    public function words() {
        $words = Word::all(); 
        $words_array = [];

        foreach($words as $w) {
            array_push($words_array, $w->text);
        }

        return view('draft.words', compact('words_array'));
    }

    public function players() {
        $players = People::all(); 
        $players_array = [];

        foreach($players as $p) {
            array_push($players_array, $p->name);
        }

        return view('draft.players', compact('players_array'));
    }
}
