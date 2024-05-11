<?php

namespace App\Http\Controllers\private\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("private.admin.user.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('private.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'nom_prenom' => 'required',
                'email' => 'required|email|max:255|unique:users',
                // 'password' => 'required|min:4',
            ],
            [
                'nom_prenom.required' => 'Le champ nom et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                // 'password.required' => 'Le champ mot de passe est requis.',
                // 'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nom_prenom' => $request->nom_prenom,
            'email' => "$request->email",
            'password' => "password",
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Inscription réussie!.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('private.admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nom_prenom' => 'required',
                'email' => 'required|email|max:255|unique:users',
                // 'password' => 'required|min:4',
            ],
            [
                'nom_prenom.required' => 'Le champ nom et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                // 'password.required' => 'Le champ mot de passe est requis.',
                // 'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        $user->nom_prenom = $request->nom_prenom;
        $user->email = $request->email;

        $user->save();

        return redirect()->back()->with('success', 'Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
