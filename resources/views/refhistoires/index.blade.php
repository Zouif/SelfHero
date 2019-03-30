@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
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
            {{--<div class="text-center mb-3">--}}
                {{--<a href="{{ url('/refhistoires/create') }}" class="">--}}
                    {{--<button type="submit" class="btn btn-primary">Creer un nouveau client</button>--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<a href="">--}}
                {{--<img src={{ asset('storage/image/histoire.jpg') }}>--}}
            {{--</a>--}}
            @foreach($refhistoires as $refhistoire)
                <div class="col-md-5 m-5">
                    <h3>{{$refhistoire->nom}}</h3>
                    {{--<a href="{{ route('histoires.show', $histoire->ref_histoire) }}">--}}
                    <a class="w-10" href="{{ route('histoire.show', $refhistoire->id_ref_histoire) }}">
                        <img class="w-25" src={{ asset('storage/image/' . $refhistoire->url_image)}}>
                    </a>
                    <p>{{$refhistoire->auteur}}</p>
                    <p>{{$refhistoire->avis}}</p>
                    {{--<td><a href="{{ route('refhistoires.edit',$refhistoire->id_refhistoire)}}" class="btn btn-primary">Edit</a></td>--}}
                    {{--<td>--}}
                        {{--<form action="{{ route('refhistoires.destroy', $refhistoire->id_refhistoire)}}" method="post">--}}
                            {{--@csrf--}}
                            {{--@method('DELETE')--}}
                            {{--<button class="btn btn-danger" type="submit">Delete</button>--}}
                        {{--</form>--}}
                    {{--</td>--}}
                    {{--<td><a href="{{ route('projets.show', $refhistoire->ref_refhistoire) }}" class="btn btn-primary">Choisir cette histoire</a></td>--}}
                </div>
            @endforeach
        <div>
@endsection