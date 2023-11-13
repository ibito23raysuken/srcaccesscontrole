@extends('base')

@section('content')
@php
    $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi','dimanche'];
    $heures = ['07h-08h', '08h-09h', '10h-11h', '12h-13h', '14h-15h','15h-16h','17h-18h'];
@endphp
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Emploie du temp
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th width="125">Time</th>
                            @foreach ($jours as $jour)
                                <th>{{ $jour }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            @foreach ($heures as $heure)
                            <tr>
                                <td>{{ $heure }}</td>
                                @foreach ($jours as $jour)
                                    <td>
                                        @foreach ($matieres as $matiere )
                                            @if ($matiere->heures==$heure && $matiere->jour==$jour)
                                             <a class="text-decoration-none" href="{{ route('presence') }}"  >{{ $matiere->nom_matiere; }}</a>
                                            @endif
                                        @endforeach

                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
