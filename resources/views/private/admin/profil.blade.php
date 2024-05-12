@extends('private.layouts.app')

@section('titre', 'Mon profil')

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
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
        <div class="card mb-4">
            <h5 class="card-header">Mon profil</h5>
            <!-- Account -->
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                @if (auth()->user()->profile_image == "")
                <img
                src="{{ asset('asset_prive/assets/img/avatars/11.jpg') }}"
                alt="user-avatar"
                class="d-block rounded"
                height="100"
                width="100"
                id="uploadedAvatar"
               />
                @else
                <img
                      src="{{ asset('storage/' . auth()->user()->profile_image) }}"
                      alt="user-avatar"
                      class="d-block rounded"
                      height="100"
                      width="100"
                      id="uploadedAvatar"
                  />
                @endif  
                  <div class="button-wrapper" data-bs-toggle="modal"
                  data-bs-target="#updateProfile">
                      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                          <span class="d-none d-sm-block">Changer la photo</span>
                      </label>
                      {{-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
                  </div>
              </div>
          </div>
            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" action={{ route('users.updateProfil') }} enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nom Prénom</label>
                            <input class="form-control" type="text" id="firstName" name="nom_prenom"
                                value="{{ auth()->user()->nom_prenom }}" placeholder="Entrez votre nom et prenom"
                                autofocus />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ auth()->user()->email }}" placeholder="Entrez un nouveau email" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input class="form-control" type="password" name="password" id="password" value=""
                                placeholder="Entrez un nouveau mot de passe" />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">Répétez le mot de passe</label>
                            <input class="form-control" type="password" name="password_confirmation"
                                id="password_confirmation" value="" placeholder="Confirmé le nouveau mot de passe" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>

    <div class="modal fade" id="updateProfile" data-bs-backdrop="static" tabindex="-1">
      <div class="modal-dialog">
          <form class="modal-content" action="{{ route('users.updateImage') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-header">
                  <h5 class="modal-title">Edition de l'image de profil</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Champs pour l'édition des informations de l'utilisateur -->
                  <div class="row">
                      <div class="col mb-3">
                          <label for="editImage" class="form-label">Choisir une photo</label>
                          <input type="file" id="editImage"  class="form-control" name="profile_image" required
                          >
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

@endsection
