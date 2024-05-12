@extends('private.layouts.app')

@section('titre', 'Gestion des lessons')

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 order-1">
                <h2>
                    Gestion des lessons
                </h2>
                <div class="d-flex justify-content-end mb-2">
                  <a href="{{ route('lessons.create') }}" class="btn btn-primary text-white mt-2 mt-xl-0 float-left-btn" title="Cliquez ici pour ajouter une nouvelle Lesson">Ajouter une lesson</a>
                </div>
                <div class="row p-2">
                    @if (session('success'))
                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  {{ session('success') }}
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                              @endif
                    <div class="card">
                        <h5 class="card-header">Listes des lessons</h5>
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
                              
                              @foreach ($lessons as $lesson)
                                <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$lesson->nom}}</strong></td>
                                <td>{{$lesson->totalMotMoore}}</td>
                                <td><span class="badge bg-label-dark me-1">{{$lesson->point}}</span></td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{route('lessons.show', $lesson->id)}}"
                                        ><i class="bx bxs-book-open me-1"></i> Ouvrir</a
                                      >
                                      <a class="dropdown-item" href="{{route('lessons.edit', $lesson->id)}}"
                                        ><i class="bx bx-edit-alt me-1"></i> Modifier</a
                                      >
                                      <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cette leçon ?')) { document.getElementById('delete-lesson-{{ $lesson->id }}').submit(); }">
                                        <i class="bx bx-trash me-1"></i> Supprimer
                                      </a>
                                    
                                      <form id="delete-lesson-{{ $lesson->id }}" action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display: none;">
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
                        {{ $lessons->links('pagination::bootstrap-4') }}

                      </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
