@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Crazy Dash!</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-4">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#annonce-index" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    Annonces!
                                </button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#form-annonce" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    Faire une annonce
                                </button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#collapseExample1" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    Supprimer annonce
                                </button>
                            </div>
                        </div>
                        <div class="collapse" id="annonce-index" action="{{ route('annonce/index') }}">
                            <div class="card card-body">
                                @foreach($annonce as $item)
                                    <div class="card">
                                        <img class="card-img-top" src="..." alt="image item">
                                        <div class="card-title">
                                            <h3> {{ $item->titre }}</h3>
                                            <I> {{$item->created_at}} </I>
                                        </div>
                                        <div class="card-body">
                                            {{ $item->description }}
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="collapse" id="form-annonce">
                            <div class="card card-body">
                                <div class="card">
                                    <div class="card-header">{{ __('Les annonces') }}</div>
                                    <ul class="card-body">
                                        <form method="POST" action="{{ route('annonce/create') }}">
                                            @csrf
                                            {{--  <form method="post" action="{{action('BilletController@update',$id)}}" class="formAddBillet">
                                                  {{csrf_field()}}     class="form-control{{ __('title') }}"
                                                  <input name="_method" type="hidden" value="PATCH">--}}
                                            <div class="form-group row">
                                                <label for="title"
                                                       class="col-sm-4 col-form-label text-md-right">{{ __('Titre :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="titre" type="text" class="form-control" name="titre"
                                                           value="{{ old('titre') }}" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="description"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Produit :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="description" type="text" class="form-control"
                                                           name="description" required
                                                           autofocus>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a class="btn btn-secondary" href="{{ route('annonce/create') }}"
                                                       onclick="event.preventDefault();
                                                         document.getElementById('form-annonce').submit();">
                                                        {{ __('Submit billet') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
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