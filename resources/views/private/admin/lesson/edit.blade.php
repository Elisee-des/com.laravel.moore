@extends('private.layouts.app')

@section('titre', "Modification de la $lesson->nom")

@section('contenu')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 order-1">
                <h2>
                    Modification de la {{$lesson->nom}}
                </h2>
                <div class="row">
                    
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-body">
                        <form action="{{ route('lessons.update', $lesson) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Nom</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"
                                ><i class="bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-company"
                                class="form-control"
                                name="nom"
                                value="{{$lesson->nom}}"
                                placeholder="Veuillez entrer le nom de la lesson"
                             
                              />
                            </div>
                               @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                          </div>
                          <button type="submit" class="btn btn-primary">Modifier la lesson</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
