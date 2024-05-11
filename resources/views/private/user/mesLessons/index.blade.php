@extends('private.layouts.app')

@section('titre', 'Mes lessons')

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-4 order-1">
                <h2>
                    Mes Lessons
                </h2>
                {{-- <div class="d-flex justify-content-end mb-2">
                  <a href="{{ route('lessons.create') }}" class="btn btn-primary text-white mt-2 mt-xl-0 float-left-btn" title="Cliquez ici pour ajouter une nouvelle Lesson">Ajouter une lesson</a>
                </div> --}}
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- <div class="card">
                        <h5 class="card-header">Listes de mes lessons</h5>
                    </div> --}}

                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                    aria-selected="true">
                                    En cours
                                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">10</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-pills-justified-profile"
                                    aria-controls="navs-pills-justified-profile" aria-selected="false">
                                    Valider
                                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-success">3</span>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Lessons</th>
                                                <th>Mots Moorés</th>
                                                <th>Points</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody class="table-border-bottom-0">
                                            @foreach ($lessons_en_attentes as $lesson)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $lesson->nom }}</strong>
                                                    </td>
                                                    <td>{{ $lesson->totalMotMoore }}</td>
                                                    <td><span class="badge bg-label-dark me-1">{{ $lesson->point }}</span>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modalToggle">
                                                            Commencer
                                                        </button>
                                                        <div class="modal fade" id="modalToggle"
                                                            aria-labelledby="modalToggleLabel" tabindex="-1"
                                                            style="display: none" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalToggleLabel"><strong>{{$lesson->nom}}</strong></h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                       <p> <strong>Petit resumé</strong></p>
                                                                        <p>Mot moorés : <strong>{{ $lesson->totalMotMoore }}</strong></p>
                                                                        <p>Points : <strong>{{ $lesson->point }}</strong></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('apprentissage-index', $lesson->id) }}" class="btn btn-primary">
                                                                            Je commence
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('deselection-lesson-action', $lesson->id) }}"
                                                            class="btn btn-danger" type="button"
                                                            onclick="return confirm('Etes vous sûr de vouloir terminer cette action ? En terminant cette action, cette lesson sera retiré et se trouvera désormais dans la section *Selectionner des lessons* .')">
                                                            Rétirer
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Lessons</th>
                                                <th>Mots Moorés</th>
                                                <th>Points</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody class="table-border-bottom-0">
                                            {{-- @foreach ($lessons as $lesson)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$lesson->nom}}</strong></td>
                                                    <td>{{$lesson->totalMotMoore}}</td>
                                                    <td><span class="badge bg-label-dark me-1">{{$lesson->point}}</span></td>
                                                    
                                                    <td>
                                                        <a href="" class="btn btn-primary" type="button">
                                                        Reviser
                                                    </a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ajouter-button" style="display:none; text-align:center;" class="mt-3">
                        <button type="submit" class="btn btn-primary" style="width: 60%!important">Ajouter à mes
                            lessons</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Récupère toutes les cases à cocher
        const checkboxes = document.querySelectorAll('.form-check-input');

        checkboxes.forEach(function(checkbox) {
            // Ajoute un écouteur d'événements de clic à chaque case à cocher
            checkbox.addEventListener('change', function() {
                const addButton = document.getElementById('ajouter-button');

                // Vérifie si une case à cocher est cochée
                const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                // Affiche ou masque le bouton "Ajouter à mes lessons" en fonction de si une case à cocher est cochée ou non
                if (isChecked) {
                    addButton.style.display = 'block';
                } else {
                    addButton.style.display = 'none';
                }
            });
        });
    </script>
@endsection
