<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Word::all();
        return view('words.index')->with('words', $words);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('words.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $word = new Word();
        $word->text = $request->input('text');
       
        $word->save();
        
        $words = Word::all();
        return view('words.index')->with('words', $words)
            ->with('msg', 'Palavra cadastrada com sucesso!');      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $word = Word::find($id);
        
        if ($word) {
            return view('words.show')->with('word', $word);
        } else {
            return view('words.show')->with('msg', 'Palavra não encontrada!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $word = Word::find($id);
        
        if ($word) {
            return view('words.edit')->with('word', $word);
        } else {
            $words = Word::all();            
            return view('words.index')->with('words', $words)
                ->with('msg', 'Palavra não encontrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $word = Word::find($id);
         
         $word->text = $request->input('text');
        
         $word->save();
        
         $words = Word::all();
         return view('words.index')->with('words', $words)
             ->with('msg', 'Palavra atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $word = Word::find($id);
        
        $word->delete();
        
        $words = Word::all();
        return view('words.index')->with('words', $words)
            ->with('msg', "Palavra excluída com sucesso!");
    }
}
