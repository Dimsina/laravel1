@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3>My Dashy Dash</h3>
                            <div class="col-4">
                                <button class="btn btn-dark"><a href="/annonce"><i
                                                class="fas fa-undo-alt fa-lg"></i></a>
                                </button>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img"
                                 src="{{ $annonce->photo }}"
                                 alt="image item">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{ $annonce->titre }}</li>
                                        <li class="list-group-item">{{ $annonce->description }}</li>
                                        <li class="list-group-item">Prix : {{ $annonce->prix."€" }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection