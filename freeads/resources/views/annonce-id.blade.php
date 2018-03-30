@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <button class="btn btn-dark"><a href="/annonce"><i
                                                class="fas fa-undo-alt fa-lg"></i></a>
                                </button>
                            </div>
                            <h3>Le Dash</h3>
                        </div>
                        <div class="card">
                            @foreach ($annonce->photo as $photo)
                            <img class="card-img"
                                 src="{{ asset('storage/photo/'.$photo->img_name) }}"
                                 alt="image item">
                            @endforeach
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <ul class="list-group" style="width: 45em">
                                        <li class="list-group-item">{{ $annonce->titre }}</li>
                                        <li class="list-group-item">{{ $annonce->description }}</li>
                                        <li class="list-group-item">Prix : {{ $annonce->prix."€" }}</li>
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted : {{ $annonce->created_at }} Updated: {{ $annonce->updated_at }}
                                    @if ($annonce->user_id == Auth::id())
                                        <a href="{{ route('annonce/destroy',['id' => $annonce->id]) }}"><i
                                                    class="fas fa-trash-alt fa-lg"></i></a>
                                        <a data-toggle="collapse" aria-expanded="false"
                                           aria-controls="collapse_$annonce->id"
                                           href="#collapse_item_{{ $annonce->id }}"><i
                                                    class="fas fa-edit"></i></a>
                                    @endif

                                </div>
                                <div class="collapse" id="collapse_item_{{ $annonce->id }}">
                                    <div class="card card-body">
                                        <form id="annonce-edit_{{ $annonce->id }}" method="POST"
                                              action="{{ url('annonce/'.$annonce->id.'/update') }}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            @csrf
                                            <div class="form-group row">
                                                <label for="titre"
                                                       class="col-sm-4 col-form-label text-md-right">{{ __('Titre :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="titre" type="text" class="form-control"
                                                           name="titre"
                                                           value="{{ $annonce->titre }}" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="description"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Description Produit :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="description" type="text" class="form-control"
                                                           name="description"
                                                           value="{{ $annonce->description }}" required
                                                           autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="prix"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Prix :') }}</label>
                                                <div class="col-md-6">
                                                    <input id="prix" type="text" class="form-control"
                                                           name="prix" value="{{ $annonce->prix }}" required
                                                           autofocus>
                                                </div>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <a class="btn btn-secondary"
                                                       href="{{ url('annonce/'.$annonce->id.'/update') }}"
                                                       onclick="event.preventDefault();
                                                               document.getElementById('annonce-edit_{{ $annonce->id }}').submit();">
                                                        {{ __('Nouvelle annonce') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection