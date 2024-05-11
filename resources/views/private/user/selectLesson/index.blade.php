@extends('private.layouts.app')

@section('titre', 'Selectionner des lessons à apprendre')

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-4 order-1">
                <h2>
                    Selectionner des lessons à apprendre
                </h2>
                {{-- <div class="d-flex justify-content-end mb-2">
                  <a href="{{ route('lessons.create') }}" class="btn btn-primary text-white mt-2 mt-xl-0 float-left-btn" title="Cliquez ici pour ajouter une nouvelle Lesson">Ajouter une lesson</a>
                </div> --}}
                <form method="POST" action="{{ route('selection-lesson-action') }}">
                    @csrf
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <h5 class="card-header">Listes des lessons (300)</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Lessons</th>
                                        <th>Selection</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="table-border-bottom-0">
                                    @foreach ($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->nom }}</td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" id="lesson_{{ $lesson->id }}" name="lessons[]" value="{{ $lesson->id }}" />
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="ajouter-button" style="display:none; text-align:center;" class="mt-3">
                        <button type="submit" onclick="return confirm('Etes vous sûr de vouloir terminer cette action ? En terminant cette action, les lessons selectionner figurerons dans la section *Mes Lessons* .')" class="btn btn-primary" style="width: 50%!important">Ajouter à mes lessons</button>
                    </div>
                </div>
            </form>
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
