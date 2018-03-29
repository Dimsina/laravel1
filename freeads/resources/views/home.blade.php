@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Crazy Dash!</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                           <div class="col-4">
                               <a href="annonce" class="btn btn-danger" role="button" aria-pressed="true">
                                   Liste d'annonces
                               </a>
                           </div>
                            <div class="col-4">
                                <button class="btn btn-danger" type="button" data-toggle="collapse"
                                        data-target="#annonce" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Faire une annonce
                                </button>
                            </div>

                        </div>

                        <div class="collapse" id="annonce">
                            <div class="card card-body">
                                <div class="card">
                                    <div class="card-header">{{ __('Les annonces') }}</div>
                                    <ul class="card-body">
                                        <form id="form-annonce" method="POST" action="{{ route('annonce/store') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label for="photo"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Photo :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="photo" type="file" class="form-control"
                                                           name="photo[]" required
                                                           autofocus>
                                                </div>
                                            </div>
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
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Description produit :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="description" type="text" class="form-control"
                                                           name="description" required
                                                           autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="prix"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Prix (€, euros):') }}</label>
                                                <div class="col-md-6">
                                                    <input id="prix" type="text" class="form-control"
                                                           name="prix" required
                                                           autofocus>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a class="btn btn-secondary" href="{{ route('annonce/store') }}"
                                                       onclick="event.preventDefault();
                                                         document.getElementById('form-annonce').submit();">
                                                        {{ __('Poster Annonce') }}
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