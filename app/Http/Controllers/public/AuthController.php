<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function inscription()
    {
        return view('public.auth.inscription');
    }


    public function inscriptionAction(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'nom_prenom' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:4',
            ],
            [
                'nom_prenom.required' => 'Le champ nom et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'nom_prenom' => $request->nom_prenom,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user->save();

        return redirect()->route('public.connexion')->with('success', 'Inscription réussie ! Connectez-vous maintenant.');
    }

    public function connexion()
    {
        return view('public.auth.connexion');
    }

    public function connectionAction(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'password.required' => 'Le champ mot de passe est requis.',
            ]
        );

        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Vérifier si un utilisateur avec cet email existe
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['login' => "Cet email n'a pas de compte"])
                ->withInput();
        }

        //On le connecte ici
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return redirect()->back()
                ->withErrors(['login' => 'Mot de passe est incorrect'])
                ->withInput();
        }

        $request->session()->regenerate();

        //On voie sur quel page on dois le redirigé
        $user = Auth::user();
        $redirectRoute = '';

        if ($user->role == 'admin') {
            $redirectRoute = 'admin.tableauBord';
        }  elseif ($user->role == 'user') {
            $redirectRoute = 'user.tableauBord';
        }

        if (!empty($redirectRoute)) {
            return redirect()->route($redirectRoute)->withMessage("Connexion réussie !");
        }
    }

    public function deconnexion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('public.index')
            ->withSuccess('Vous avez été deconnecté avec succès');
    }
}
