@extends('private.layouts.app')

@section('titre', 'Liste des utilisateurs')

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 order-1">
                <h2>Gestion des utilisateurs</h2>
                <div class="d-flex justify-content-end mb-5">
                    <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                            Ajouter un Utilisateur
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                            <div class="modal-dialog">
                                <form class="modal-content" action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="backDropModalTitle">Ajouter un utilisateur</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- Affichage des erreurs de validation --}}
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBackdrop" class="form-label">Nom Prénom</label>
                                                <input type="text" id="nameBackdrop" class="form-control"
                                                    name="nom_prenom" required placeholder="Entrez le nom et prenom">
                                                @if ($errors->has('nom_prenom'))
                                                    <div class="text-danger">{{ $errors->first('nom_prenom') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="emailBackdrop" class="form-label">Email</label>
                                                <input type="email" id="emailBackdrop" name="email" class="form-control"
                                                    placeholder="xxxx@xxx.xx" required>
                                                @if ($errors->has('email'))
                                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="editrole" class="form-label">Role</label>
                                                <select name="role" class="form-select" id="inputGroupSelect01">
                                                    <option selected>Selectionner...</option>
                                                    <option value="user">Utilisateur</option>
                                                    <option value="admin">Administarteur</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="passwordBackdrop" class="form-label">Mot de passe</label>
                                                <input type="password" id="passwordBackdrop" class="form-control" disabled
                                                    placeholder="Generer automatiquement">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Fermer
                                        </button>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12" style="margin-top:2vh">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger p-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                                        aria-selected="true">
                                        <i class="tf-icons bx bx-user"></i> Utilisateurs
                                        <span
                                            class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"></span>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                                        aria-selected="false">
                                        <i class="tf-icons bx bx-user"></i> Administrateurs
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                                    <div class="card">
                                        <h5 class="card-header">Listes des utilisateurs</h5>
                                        <div class="card-body">
                                            <div class="table-responsive text-nowrap mb-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nom Prénom</th>
                                                            <th>E-mail</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <td>
                                                                    <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>{{ $user->nom_prenom }}</strong>
                                                                </td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editUserModal"
                                                                                onclick="editUser('{{ $user->nom_prenom }}', '{{ $user->email }}')">
                                                                                <i class="bx bx-edit-alt me-1"></i> Editer
                                                                                les informations
                                                                            </a>
                                                                            <a class="dropdown-item" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editUserEmailModal"
                                                                            onclick="editUserEmail('{{ $user->email }}')">
                                                                            <i class="bx bx-edit-alt me-1"></i> Editer l'email
                                                                        </a>
                                                                            <a class="dropdown-item" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editUserPasswordModal"
                                                                                onclick="editUserPassword('{{ $user->nom_prenom }}', '{{ $user->email }}')">
                                                                                <i class="bx bx-edit-alt me-1"></i> Editer
                                                                                mot de passe
                                                                            </a>
                                                                            <a class="dropdown-item"
                                                                                href="#" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) { document.getElementById('delete-user-{{ $user->id }}').submit(); }">
                                                                                <i class="bx bx-trash me-1"></i> Supprimer
                                                                            </a>
                                                                            <form id="delete-user-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{ $users->links('pagination::bootstrap-4') }}
                                        </div>
                                        {{-- {{ $users->links() }} --}}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                    <div class="card">
                                        <h5 class="card-header">Listes des administrateurs</h5>
                                        <div class="card-body">
                                            <div class="table-responsive text-nowrap mb-3">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nom Prénom</th>
                                                            <th>E-mail</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($admins as $admin)
                                                            <tr>
                                                                <td>
                                                                    <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                    <strong>{{ $admin->nom_prenom }}</strong>
                                                                </td>
                                                                <td>{{ $admin->email }}</td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                                            data-bs-toggle="dropdown">
                                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editUserModal"
                                                                                onclick="editUser('{{ $admin->nom_prenom }}', '{{ $admin->email }}')">
                                                                                <i class="bx bx-edit-alt me-1"></i> Editer
                                                                                les informations
                                                                            </a>
                                                                            <a class="dropdown-item" href="#"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editUserPasswordModal"
                                                                                onclick="editUserPassword('{{ $admin->nom_prenom }}', '{{ $admin->email }}')">
                                                                                <i class="bx bx-edit-alt me-1"></i> Editer
                                                                                mot de passe
                                                                            </a>
                                                                            <a class="dropdown-item" href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editUserEmailModal"
                                                                            onclick="editUserEmail('{{ $admin->nom_prenom }}', '{{ $admin->email }}')">
                                                                            <i class="bx bx-edit-alt me-1"></i> Editer l'email
                                                                        </a>
                                                                            <a class="dropdown-item"
                                                                                href="#" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) { document.getElementById('delete-user-{{ $user->id }}').submit(); }">
                                                                                <i class="bx bx-trash me-1"></i> Supprimer
                                                                            </a>
                                                                            <form id="delete-user-{{ $admin->id }}" action="{{ route('users.destroy', $admin->id) }}" method="POST" style="display: none;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{ $admins->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'édition d'utilisateur -->
    <div class="modal fade" id="editUserModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Editer un utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Champs pour l'édition des informations de l'utilisateur -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editName" class="form-label">Nom Prénom</label>
                            <input type="text" id="editName" class="form-control" name="nom_prenom" required
                                placeholder="Entrez le nom et prenom">
                            <div id="editNameError" class="text-danger"></div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" value="" id="editEmail" name="email" class="form-control"
                                placeholder="xxxx@xxx.xx"equired>
                            <div id="editEmailError" class="text-danger"></div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editrole" class="form-label">Role</label>
                            <select name="role" class="form-select" id="inputGroupSelect01">
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Utilisateur</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administarteur</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editUserEmailModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('users.updateEmail', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edition email de {{ $user->nom_prenom }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Champs pour l'édition des informations de l'utilisateur -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editEmail" class="form-label">Nouveau email</label>
                            <input type="text" id="editEmail"  class="form-control" name="email" required
                                placeholder="Entrez un nouveau email">
                            <div id="editNameError" class="text-danger"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="editEmail" class="form-label">Répétez l'email</label>
                            <input type="text" id="editEmail"  class="form-control" name="email_confirmation" required
                                placeholder="Entrez un nouveau email">
                            <div id="editNameError" class="text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

      <!-- Modal d'édition du mot de passe de l'utilisateur -->
      <div class="modal fade" id="editUserPasswordModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('users.updatePassword', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Editer le mot de passe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Champs pour l'édition du mot de passe de l'utilisateur -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editPassword" class="form-label">Mot de passe</label>
                            <input type="password" id="editPassword" class="form-control" name="password" required placeholder="Entrez un mot de passe sécurisé">
                            <div id="editPasswordError" class="text-danger"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editRepeatPassword" class="form-label">Répéter le mot de passe</label>
                            <input type="password" id="editRepeatPassword" class="form-control" name="password_confirmation" required placeholder="Répéter le mot de passe">
                            <div id="editRepeatPasswordError" class="text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    

    <script>
        // Fonction pour pré-remplir les champs de la modale d'édition
        function editUser(nomPrenom) {
            document.getElementById('editName').value = nomPrenom;
        }
    </script>
    
    <script>
        // Fonction pour pré-remplir les champs de la modale d'édition
        function editUserEmail(email) {
            document.getElementById('editEmail').value = email;
        }
    </script>
    <script>
        // Fonction pour pré-remplir les champs de la modale d'édition du mot de passe
        function editUserPassword(password, email) {
            document.getElementById('editPassword').value = password;
            document.getElementById('editRepeatPassword').value = password;
        }
    </script>
@endsection
