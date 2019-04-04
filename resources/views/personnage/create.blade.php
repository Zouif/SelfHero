@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>

    <div class="card uper">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('personnage.store') }}">
                {{ csrf_field() }}
                <div class="form-group" style="margin: 0 25%;">
                    <label for="nom_personnage">QUEL EST TON NOM DE HERO !</label>
                    <input type="text" class="form-control" name="nom_personnage"/>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

            </form>
        </div>
    </div>
@endsection