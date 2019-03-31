@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
            <p>{{$json->texte}}</p>

            @foreach($json->boutons as $bouton)
                <div class="col-md-5 m-5">

                    <a class="w-10" href="{{ action('HistoireController@nextPage', ['numero_page' => $bouton->action]) }}"><h3>{{$bouton->texte}}</h3>
                    </a>
                </div>
            @endforeach
        <div>
@endsection