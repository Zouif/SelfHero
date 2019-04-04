@extends('layouts.app')

@section('content')
    <div class="" style="margin: 5%;">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class="">
            <form action="/searchRefHistoires" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Chercher</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($refhistoires as $refhistoire)
                <div class="col-xs-6 col-md-3">
                    <h3>{{$refhistoire->nom}}</h3>
                    {{--<a href="{{ route('histoires.show', $histoire->ref_histoire) }}">--}}
                    <a class="thumbnail" href="{{ action('HistoireController@checkSauvegarde', 'id_ref_histoire='.$refhistoire->id_ref_histoire) }}">
                        <img class="" src={{ asset('storage/image/' . $refhistoire->url_image)}}>
                    </a>
                    <p>{{$refhistoire->auteur}}</p>
                    <p>{{$refhistoire->avis}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection