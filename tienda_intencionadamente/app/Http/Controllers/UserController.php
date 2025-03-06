<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest; 
use Illuminate\Http\Request;
use App\Models\User; // App esta en mayuscula porque se le esta diciendo que vaya a la raiz del proyecto y lo lea.

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::All();
        return view('users.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request-> all());

        $user            = new User;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        $user-> name     = $request-> name; 
        $user-> lastname = $request-> lastname; 
        $user-> document = $request-> document; 
        $user-> address  = $request-> address; 
        $user-> phone    = $request-> phone; 
        $user-> birthday = $request-> birthday;
        $user-> photo    = $request-> photo;  
        $user-> email    = $request-> email; 
        $user-> password = $request-> password;  
        $user-> role     = $request-> role;

        if($user-> save()){
            return redirect('user')-> with('messages','El usuario: '.$user->name.'¡Fué Creado!');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        
        return ['user' => $user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
