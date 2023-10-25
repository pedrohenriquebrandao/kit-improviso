<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->year = $request->input('year');
        $user->color = $request->input('color');
       
        $user->save();
        
        $users = User::all();
        return view('users.index')->with('users', $users)
            ->with('msg', 'Usuário cadastrado com sucesso!');      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        
        if ($user) {
            return view('users.show')->with('user', $user);
        } else {
            return view('users.show')->with('msg', 'Usuário não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        
        if ($user) {
            return view('users.edit')->with('user', $user);
        } else {
            $users = user::all();            
            return view('users.index')->with('users', $users)
                ->with('msg', 'Usuário não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $user = User::find($id);
         
         $user->name = $request->input('name');
         $user->email = $request->input('email');
        
         $user->save();
        
         $users = User::all();
         return view('users.index')->with('users', $users)
             ->with('msg', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        
        $user->delete();
        
        $users = User::all();
        return view('users.index')->with('users', $users)
            ->with('msg', "Usuário excluído com sucesso!");
    }
}
