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
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <button class="btn btn-dark"><a href="home"><i class="fas fa-undo-alt fa-lg"></i></a>
                                </button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-light" type="button" data-toggle="collapse"
                                        data-target="#annonce-index" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    Annonces!
                                </button>
                            </div>
                        </div>
                        <div class="collapse" id="annonce-index">
                            <div class="card card-body">
                                <div class="row justify-content-center">

                                    @if (isset($annonce))
                                        @foreach($annonce as $item)
                                            <div class="card" style="width: 18rem; margin: 10px;">
                                                <div class="card-header">
                                                    <img class="card-img"
                                                         src="{{ asset('storage/photo/'.$item->photo[0]->img_name) }}"
                                                         alt="image item">
                                                </div>
                                                <div class="card-title">
                                                    <h3>
                                                        <a href="{{ url('annonce-id/show/'.$item->id) }}"> {{ $item->titre }} </a>
                                                    </h3>
                                                    <I> {{$item->created_at}} </I>
                                                    @if ($item->user_id == Auth::id())
                                                        <a href="{{ route('annonce/destroy',['id' => $item->id]) }}"><i
                                                                    class="fas fa-trash-alt fa-lg"></i></a>
                                                        <a data-toggle="collapse" aria-expanded="false"
                                                           aria-controls="collapse_$annonce->id"
                                                           href="#collapse_item_{{ $item->id }}"><i
                                                                    class="fas fa-edit"></i></a>
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    {{ $item->description }}
                                                    {{ $item->prix ."€"}}
                                                </div>
                                            </div>
                                            <div class="collapse" id="collapse_item_{{ $item->id }}">
                                                <div class="card card-body">
                                                    <form id="annonce-edit_{{ $item->id }}" method="POST"
                                                          action="{{ url('annonce/'.$item->id.'/update') }}">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="titre"
                                                                   class="col-sm-4 col-form-label text-md-right">{{ __('Titre :') }}</label>
                                                            <div class="col-md-6">
                                                                <input id="titre" type="text" class="form-control"
                                                                       name="titre"
                                                                       value="{{ $item->titre }}" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="description"
                                                                   class="col-md-4 col-form-label text-md-right">{{ __('Description Produit :') }}</label>
                                                            <div class="col-md-6">
                                                                <input id="description" type="text" class="form-control"
                                                                       name="description"
                                                                       value="{{ $item->description }}" required
                                                                       autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="prix"
                                                                   class="col-md-4 col-form-label text-md-right">{{ __('Prix :') }}</label>
                                                            <div class="col-md-6">
                                                                <input id="prix" type="text" class="form-control"
                                                                       name="prix" value="{{ $item->prix }}" required
                                                                       autofocus>
                                                            </div>
                                                        </div>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                <a class="btn btn-secondary"
                                                                   href="{{ url('annonce/'.$item->id.'/update') }}"
                                                                   onclick="event.preventDefault();
                                                                           document.getElementById('annonce-edit_{{ $item->id }}').submit();">
                                                                    {{ __('Nouvelle annonce') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {{ $annonce->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection