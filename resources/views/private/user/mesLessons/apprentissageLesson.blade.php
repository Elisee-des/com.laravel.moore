@extends('private.layouts.app')

@section('titre', "Apprentissage de la $lesson->nom ")

@section('contenu')

    <h2>
        Apprentissage de la {{ $lesson->nom }}
    </h2>
    
    @foreach ($lesson->motMoores as $motMoore)
    <div class="card p-2 mb-2">
        <div class="row">
            <div class="col-md mb-4 mb-md-0">
                <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                Mot mooré {{ $motMoore->numero }}
                            </button>
                        </h2>
                        <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md mb-4 mb-md-0">
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
                                    <div class="col-md mb-4 mb-md-0">
                                        de
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @endforeach
@endsection

    {{-- @section('scripts')
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
@endsection --}}
