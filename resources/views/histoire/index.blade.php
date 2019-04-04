@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <div class="uper">
        <div class="papyrus" style="margin: auto;width: 82%;height: 1300px;background-image: url('https://previews.123rf.com/images/irochka/irochka1008/irochka100800464/23090692-jahrgang-pergamentrolle-hintergrund-isoliert-auf-wei%C3%9F.jpg'); ">
            <p style="padding-top: 25%; padding-left: 25%; width: 80%;">{{$json->texte}}</p>
            @foreach($json->boutons as $bouton)
                <div class="col-md-3 m-3" style="margin-left: 20%; margin-top: 10%">
                    <a class="action-button shadow animate blue" href="{{ action('HistoireController@nextPage', ['numero_page' => $bouton->action]) }}"><h3>{{$bouton->texte}}</h3>
                    </a>
                </div>
            @endforeach
        </div>



        <div>
@endsection