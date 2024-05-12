<?php

namespace App\Http\Controllers\private\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Storage;

// Ajout de l'import pour Auth
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();
        if ($recherche = $request->recherche_utilisateur) {
            $users->where('nom_prenom', 'like', '%' . $recherche . '%')
                ->orWhere('email', 'like', '%' . $recherche . '%');
        }
    
        $users = $users->where('role', 'user')->paginate(5, '*', 'pageUser');
        $admins = User::where('role', 'admin')->paginate(5, '*', 'pageAdmin');
        
        return view("private.admin.user.index", compact("users", "admins"));
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
                'role' => 'required',
            ],
            [
                'nom_prenom.required' => 'Le champ nom et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'role.required' => 'Le champ role est requis.',
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
            'role' => $request->role,
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
                // 'email' => 'required|email|max:255|unique:users',
                'role' => 'required',
            ],
            [
                'nom_prenom.required' => 'Le champ nom et prénom est requis.',
                // 'email.required' => 'Le champ email est requis.',
                'role.required' => 'Le champ role est requis.',
                // 'email.email' => 'Veuillez entrer une adresse email valide.',
                // 'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                // 'email.unique' => 'Cette adresse email est déjà utilisée.',
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
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
        $user->nom_prenom = $request->nom_prenom;
        $user->role = $request->role;

        $user->save();

        return redirect()->back()->with('success', 'Utilisateur modifié avec succès.');
    }

    public function updatePassword(Request $request, $id)
    {
        // Valider les données de la requête
       

        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|string|min:5|confirmed',
            ],
            [
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Récupérer l'utilisateur
        $user = User::findOrFail($id);

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->password);
        $user->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
    }

    public function updateEmail(Request $request, $id)
    {
        // Valider les données de la requête
       

        $validator = Validator::make(
            $request->all(),
                [
                'email' => 'required|email|max:255|unique:users|confirmed',
                ],
                [
                 'email.required' => 'Le champ email est requis.',
                 'email.email' => 'Veuillez entrer une adresse email valide.',
                 'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                 'email.unique' => 'Cette adresse email est déjà utilisée.',
                'email.confirmed' => "La confirmation de l'email ne correspond pas.",
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Récupérer l'utilisateur
        $user = User::findOrFail($id);

        // Mettre à jour le mot de passe
        $user->email = $request->email;
        $user->save();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Email mis à jour avec succès.');
    }

    public function updateProfil(Request $request)
    {
        // Valider les données de la requête
        $validator = Validator::make(
            $request->all(),
            [
                'nom_prenom' => 'required',
                'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
                'password' => 'sometimes|string|min:5|confirmed',
            ],
            [
                'nom_prenom.required' => 'Le champ nom et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => "L'adresse email ne doit pas dépasser :max caractères.",
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            ]
        );
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Récupérer l'utilisateur
        $user = User::findOrFail(Auth::user()->id);
    
        // Mettre à jour le nom et prénom
        $user->nom_prenom = $request->nom_prenom;
    
        // Mettre à jour l'email s'il est différent
        if ($user->email != $request->email) {
            $user->email = $request->email;
        }
    
        // Mettre à jour le mot de passe s'il est renseigné
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        // Sauvegarder les modifications
        $user->save();
    
        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function updateImage(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:5048',
            ], [
                'profile_image.required' => 'Veuillez sélectionner une image.',
                'profile_image.image' => 'Le fichier doit être une image.',
                'profile_image.mimes' => 'Le fichier doit être de type :jpeg, :png ou :jpg.',
                'profile_image.max' => 'La taille de l\'image ne doit pas dépasser 2048 Ko.',
            ]
        );
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $user = Auth::user(); // Récupérer l'utilisateur actuellement connecté

        if ($request->hasFile('profile_image')) {
            // Supprimer l'ancienne image de profil s'il en existe une
            if ($user->profile_image) {
                Storage::delete($user->profile_image); // Supprimer le fichier de stockage
            }

            // Enregistrer la nouvelle image de profil
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
            $user->save();

            return redirect()->back()->with('success', 'Image de profil mise à jour avec succès.');
        }

        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de l\'image de profil.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
