<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = People::all();

        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('people.create');
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $people = new People();

        $people->name = $request->input('name');
        $people->save();
        
        $peopleArray = People::all();

        if(Auth::check()) { 
            return redirect()->route('people.index')->with('people', $peopleArray) 
            ->with('success', 'Pessoa cadastrada com sucesso!');   
        }
            
        return redirect()->back()->with('success','Palavra cadastrada com sucesso!');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $people = People::find($id);
        
        $people->delete();

        return view('people.index')->with('people', $people)
        ->with('msg', "Pessoa excluída com sucesso!");    }
}
