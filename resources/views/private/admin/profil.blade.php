@extends('private.layouts.app')

@section('titre', "profil")

@section('contenu')

<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
        <img
          src="asset_prive/assets/img/avatars/1.png"
          alt="user-avatar"
          class="d-block rounded"
          height="100"
          width="100"
          id="uploadedAvatar"
        />
        <div class="button-wrapper">
          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input
              type="file"
              id="upload"
              class="account-file-input"
              hidden
              accept="image/png, image/jpeg"
            />
          </label>
          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
          </button>

          {{-- <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> --}}
        </div>
      </div>
    </div>
    <hr class="my-0" />
    <div class="card-body">
      <form id="formAccountSettings" method="POST" onsubmit="return false">
        <div class="row">
          <div class="mb-3 col-md-6">
            <label for="firstName" class="form-label">Nom</label>
            <input
              class="form-control"
              type="text"
              id="firstName"
              name="nom"
              value=""
              placeholder="Entrez votre nom"
              autofocus
            />
          </div>
          <div class="mb-3 col-md-6">
            <label for="lastName" class="form-label">Prénom</label>
            <input class="form-control" type="text" name="prenom" id="lastName" value="" placeholder="Entrez votre prénom" />
          </div>
          <div class="mb-3 col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input
              class="form-control"
              type="text"
              id="email"
              name="email"
              value=""
              placeholder="Entrez votre e-mail"
            />
          </div>
          
          <div class="mb-3 col-md-6">
            <label class="form-label" for="phoneNumber">Numéro de téléphone</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text">BF (+226)</span>
              <input
                type="text"
                id="phoneNumber"
                name="phoneNumber"
                class="form-control"
                placeholder="54 88 90 00"
              />
            </div>
          </div>
         
        
          
          <div class="mb-3 col-md-6">
            <label class="form-label" for="country">Pays Habité</label>
            <select id="country" class="select2 form-select">
              <option value="">Selectionner</option>
              <option value="Australia">Bénin</option>
              <option value="Bangladesh">Burkina Faso</option>
              <option value="Belarus">Cote D'ivoire</option>
              <option value="Brazil">Mali</option>
              <option value="Canada">Togo</option>
              <option value="China">Nigéria</option>
              <option value="France">Niger</option>
              <option value="Germany">Lybie</option>
              <option value="India">Maroc</option>
              <option value="Indonesia">Caméroun</option>
              <option value="Israel">Algérie</option>
              <option value="Italy">Etiopie</option>
              <option value="Japan">Ghana</option>
              {{-- <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option> --}}
            </select>
          </div>
          <div class="mb-3 col-md-6">
            <label for="language" class="form-label">Langue Parlé</label>
            <select id="language" class="select2 form-select">
              <option value="">Selectionner votre Langue</option>
              <option value="en">Anglais</option>
              <option value="fr">Français</option>
              <option value="de">Moore</option>
              <option value="pt">Dioula</option>
            </select>
          </div>
         
          
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Enregistrer les modifications</button>
          <button type="reset" class="btn btn-outline-secondary">Annuler</button>
        </div>
      </form>
    </div>
    <!-- /Account -->
  </div>

@endsection