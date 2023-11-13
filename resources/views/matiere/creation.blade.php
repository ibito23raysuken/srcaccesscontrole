
@extends('base')

@section('content')

@php
    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','dimanche'];
    $heures = ['07h-08h', '08h-09h', '10h-11h', '12h-13h', '14h-15h','15h-16h','17h-18h'];
@endphp

<section class="vh-100">
    <h1 class="display-3 text-center">Ajouter d'une Nouvelle Matiere</h1>
    <div class="container-fluid m-5 ">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-md-4">
          <img src="{{ asset('images/image6.png') }}"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-xl-4">
            <form  action="{{ route('matieres.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="nom_matiere" class="form-label">Nom du matiere</label>
                  <input type="text" name="nom_matiere" class="form-control" id="InputNom_matiere" >
                </div>
                @error('nom_matiere')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="mb-3">
                    <label for="jour" class="form-label">choix de jour</label>
                    <div class="d-flex justify-content-start">
                        @foreach ($jours as $jour )
                        <div name="jour"  class="form-check">
                            <input type="radio" class="form-check-input" name="jour" name="optradio" value="{{ $jour }}">{{ $jour }}
                        </div>
                        @endforeach
                    </div>
                </div>
                @error('jour')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="mb-3">
                    <label for="heures" class="form-label">Choix de l'heure</label>
                    <select name="heures" class="form-select" aria-label="Default select example">
                        <option selected>Choix de l'heure</option>
                        @foreach ($heures as $heure )
                            <option value="{{ $heure }}">{{ $heure }}</option>
                        @endforeach
                      </select>
                </div>
                @error('heures')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="mb-3">
                    <label for="enseignant" class="form-label">Choix de l'enseignant</label>
                    <select name="enseignant" class="form-select" aria-label="Default select example">
                        <option  selected>Choix de l'enseigant</option>
                        @foreach ($enseignants as $enseignant )
                            <option value="{{ $enseignant->id }}">{{ $enseignant->nom }}</option>
                        @endforeach
                      </select>
                </div>
                @error('enseignant')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-dark">Enregistrer le Matiere</button>
                        <a href="{{ route('matieres.index') }}"   class="btn btn-dark">Retour</a>
                    </div>
              </form>

        </div>
      </div>
    </div>
</div>
  </section>
  @endsection
