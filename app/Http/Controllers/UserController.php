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
        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request-> all());

        $user            = new User;   // para actualizar, es este mismo paso pero sin instancear el usuario.
        $user->name     = $request->name;
        $user->lastname = $request->lastname;
        $user->document = $request->document;
        $user->address  = $request->address;
        $user->phone    = $request->phone;
        $user->birthday = $request->birthday;
        //$user-> photo    = $request-> photo;  
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->role     = $request->role;

        if ($user->save()) {
            return redirect('users')->with('messages', 'El usuario: ' . $user->name . '¡Fué Creado!');
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
    public function edit(User $user)
    {

        return view('users.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        // Guardar imagen si el usuario sube una nueva
        if ($request->hasFile('profile_image')) {
            // Eliminar imagen anterior si existe
            $oldImagePath = public_path('profile_images/' . $user->photo);
            if ($user->photo && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        
            // Guardar nueva imagen en public/profile_images/
            $imageName = time() . '.' . $request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('profile_images'), $imageName);
            
            // Guardar el nombre de la imagen en la base de datos
            $user->photo = $imageName;
        }
        

        // Guardar otros campos
        $user->name     = $request->nameEdit;
        $user->lastname = $request->lastnameEdit;
        $user->document = $request->documentEdit;
        $user->address  = $request->addressEdit;
        $user->phone    = $request->phoneEdit;
        $user->birthday    = $request->birthdayEdit;
        $user->email    = $request->emailEdit;
        // $user-> password = $request-> password;
        $user->role     = $request->roleEdit;

        if ($user->save()) {
            return redirect('users')->with('messages', 'El usuario: ' . $user->name . ' ¡Fue actualizdo!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect('users')->with('messages', 'El usuario: ' . $user->name . ' ¡Fue eliminado!');
        }

        return redirect('users')->with('error', 'No se pudo eliminar el usuario.');
    }

    public function search(Request $request)
    {
        $users = User::names($request->q)->paginate(20);
        return view('users.search')->with(['users' => $users]);
    }
}
