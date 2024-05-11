@extends('private.layouts.app')

@section('titre', 'Creation de mot mooré')

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajout d'un /</span> Nouveau mot mooré</h4>

        <!-- Basic Layout -->
        <form action="{{ route('ajout-mot-moore-action', $lesson->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Mot singulier</h5>
                            <small class="text-muted float-end">En mooré</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Mot en Français</label>
                                <input type="text" class="form-control" name="mot_en_fr_singulier" id="basic-default-fullname"
                                    placeholder="Entrez le mot en français" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Mot en mooré</label>
                                <input type="text" class="form-control" name="mot_en_moore_singulier" id="basic-default-company"
                                    placeholder="Entrez le mot en mooré" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Le suffixe</label>
                                <div class="input-group input-group-merge">
                                    <input name="suffixe_singulier" type="text" id="basic-default-email" class="form-control"
                                        placeholder="Entrez le suffixe" aria-label="john.doe"
                                        aria-describedby="basic-default-email2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Ajouter une image</label>
                                <div class="input-group">
                                    <input type="file" name="image_singulier" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Un exemple</label>
                                <input type="text" id="basic-default-phone" name="exemple_singulier" class="form-control phone-mask"
                                    placeholder="Ajouter un exemple" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Une description</label>
                                <textarea id="basic-default-message" name="description_singulier" class="form-control" placeholder="Ajouter une description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Mot pluriel</h5>
                            <small class="text-muted float-end">En mooré</small>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Mot en Français</label>
                                <input type="text" class="form-control" name="mot_en_fr_pluriel" id="basic-default-fullname"
                                    placeholder="Entrez le mot en français" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Mot en mooré</label>
                                <input type="text" class="form-control" name="mot_en_moore_pluriel" id="basic-default-company"
                                    placeholder="Entrez le mot en mooré" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Le suffixe</label>
                                <div class="input-group input-group-merge">
                                    <input name="suffixe_pluriel" type="text" id="basic-default-email" class="form-control"
                                        placeholder="Entrez le suffixe" aria-label="john.doe"
                                        aria-describedby="basic-default-email2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Ajouter une image</label>
                                <div class="input-group">
                                    <input type="file" name="image_pluriel" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                </div>
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Un exemple</label>
                                <input type="text" id="basic-default-phone" name="exemple_pluriel" class="form-control phone-mask"
                                    placeholder="Ajouter un exemple" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Une description</label>
                                <textarea id="basic-default-message" name="description_pluriel" class="form-control" placeholder="Ajouter une description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display:flex; justify-content: center">
                <button type="submit" class="btn btn-primary " style="width: 60%!important">Enregister le mot mooré</button>
            </div>
        </form>
    </div>
@endsection
