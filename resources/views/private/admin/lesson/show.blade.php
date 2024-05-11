@extends('private.layouts.app')

@section('titre', "Detail de la $lesson->nom")

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 order-1">
                <h2>
                    Detail de la {{ $lesson->nom }}
                </h2>
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('ajout-mot-moore', $lesson->id) }}"
                        class="btn btn-primary text-white mt-2 mt-xl-0 float-left-btn"
                        title="Cliquez ici pour ajouter une nouvelle Lesson">Ajouter un mot mooré</a>
                </div>

                <div class="row p-2">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card p-2">
                        <h5 class="card-header">Listes des mot moorés</h5>
                        <div class="table-responsive text-nowrap">
                            <div class="row gy-3">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Mot Moorés</th>
                                            <th>Mots Moorés Singuliers</th>
                                            <th>Mots Moorés Pluriels</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">

                                        @foreach ($lesson->motMoores as $motMoore)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong>{{ $motMoore->numero }}</strong>
                                                </td>
                                                <td><button class="btn btn-primary" type="button"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasStart_{{ $motMoore->id }}"
                                                        aria-controls="offcanvasStart">
                                                        {{ $motMoore->singulier->mot_en_moore }}
                                                    </button>
                                                    <div class="offcanvas offcanvas-start" tabindex="-1"
                                                        id="offcanvasStart_{{ $motMoore->id }}"
                                                        aria-labelledby="offcanvasStartLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 id="offcanvasStartLabel" class="offcanvas-title">
                                                                MOT MOORÉ SINGULIER
                                                            </h5>
                                                            <button type="button" class="btn-close text-reset"
                                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>

                                                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                            <div class="card">
                                                                <img class="card-img-top"
                                                                    src="{{ asset('asset_prive/assets/img/elements/7.jpg') }}"
                                                                    alt="Card image cap" />
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Mot en mooré :
                                                                        <strong>{{ $motMoore->singulier->mot_en_moore }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Mot en français :
                                                                        <strong>{{ $motMoore->singulier->mot_en_fr }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Suffixe :
                                                                        <strong>{{ $motMoore->singulier->suffixe }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Exemple :
                                                                        <strong>{{ $motMoore->singulier->exemple }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Description :
                                                                        <strong>{{ $motMoore->singulier->description }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Date d'ajout :
                                                                        <strong>{{ $motMoore->singulier->created_at }}
                                                                        </strong></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><button class="btn btn-warning" type="button"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasEnd_{{ $motMoore->id }}"
                                                        aria-controls="offcanvasEnd">
                                                        {{ $motMoore->pluriel->mot_en_moore }}
                                                    </button>
                                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                                        id="offcanvasEnd_{{ $motMoore->id }}"
                                                        aria-labelledby="offcanvasEndLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 id="offcanvasStartLabel" class="offcanvas-title">
                                                                MOT MOORÉ PLURIEL
                                                            </h5>
                                                            <button type="button" class="btn-close text-reset"
                                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                            <div class="card">
                                                                <img class="card-img-top"
                                                                    src="{{ asset('asset_prive/assets/img/elements/7.jpg') }}"
                                                                    alt="Card image cap" />
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">Mot en mooré :
                                                                        <strong>{{ $motMoore->pluriel->mot_en_moore }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Mot en français :
                                                                        <strong>{{ $motMoore->pluriel->mot_en_fr }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Suffixe :
                                                                        <strong>{{ $motMoore->pluriel->suffixe }} </strong>
                                                                    </li>
                                                                    <li class="list-group-item">Exemple :
                                                                        <strong>{{ $motMoore->pluriel->exemple }} </strong>
                                                                    </li>
                                                                    <li class="list-group-item">Description :
                                                                        <strong>{{ $motMoore->pluriel->description }}
                                                                        </strong></li>
                                                                    <li class="list-group-item">Date d'ajout :
                                                                        <strong>{{ $motMoore->pluriel->created_at }}
                                                                        </strong></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('edit-mot-moore', $motMoore->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> Modifier</a>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer ce mot mooré ?')) { document.getElementById('delete-motmoore-{{ $motMoore->id }}').submit(); }">
                                                                <i class="bx bx-trash me-1"></i> Supprimer
                                                            </a>
                                                            

                                                            <form id="delete-motmoore-{{ $motMoore->id }}"
                                                                action="{{ route('delete-mot-moore-action', $motMoore->id) }}"
                                                                method="POST" style="display: none;">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
