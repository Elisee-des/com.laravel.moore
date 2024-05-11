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
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12" style="margin-top:5vh">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger"></span>
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
                                            <div class="table-responsive text-nowrap">
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
                                                                    <strong>{{$user->nom_prenom}}</strong>
                                                                </td>
                                                                <td>{{$user->email}}</td>
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
                                                                                <i class="bx bx-edit-alt me-1"></i> Editer les informations
                                                                            </a>
                                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                                <i class="bx bx-trash me-1"></i> Supprimer
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                                    <div class="card">
                                        <h5 class="card-header">Listes des administrateurs</h5>
                                        <div class="card-body">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Prénom</th>
                                                            <th>E-mail</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                                <strong>Angular
                                                                    Project</strong>
                                                            </td>
                                                            <td>Albert Cook</td>
                                                            <td>Albert Cook</td>
                                        
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React
                                                                    Project</strong>
                                                            </td>
                                                            <td>Barry Hunter</td>
                                                            <td>Barry Hunter</td>
                                        
                                        
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fab fa-vuejs fa-lg text-success me-3"></i>
                                                                <strong>VueJs Project</strong>
                                                            </td>
                                                            <td>Trevor Baker</td>
                                                            <td>Trevor Baker</td>
                                        
                                        
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                                                <strong>Bootstrap
                                                                    Project</strong>
                                                            </td>
                                                            <td>Jerry Milton</td>
                                                            <td>Jerry Milton</td>
                                        
                                        
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn p-0 dropdown-toggle hide-arrow"
                                                                        data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                            <input type="text" id="editName" class="form-control" name="nom_prenom" required placeholder="Entrez le nom et prenom">
                            <div id="editNameError" class="text-danger"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" id="editEmail" name="email" class="form-control" placeholder="xxxx@xxx.xx" required>
                            <div id="editEmailError" class="text-danger"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" id="editEmail" name="email" class="form-control" placeholder="xxxx@xxx.xx" required>
                            <div id="editEmailError" class="text-danger"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <butt