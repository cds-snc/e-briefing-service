@extends('layouts.app')

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ $trip->name }} Articles
                <a href="{{ route('trips.articles.create', $trip) }}" class="button pull-right">Add an Article</a>
            </h1>

            @include('layouts.flash')

            @unless($trip->articles->count())
                There are no Articles added to this Trip yet!
            @endunless

            @foreach($articles as $article)
                <div class="card">
                    <div class="card-content">
                        <h3 class="title is-3">{{ $article->title }}
                            @if($article->is_protected)
                                <span class="icon">
                                    <i class="fa fa-lock"></i>
                                </span>
                            @endif
                        </h3>
                        <a href="{{ route('trips.articles.edit', ['trip' => $trip, 'article' => $article]) }}" class="button is-default">Edit</a>

                        <form class="is-inline" id="article-delete-form" action="{{ route('trips.articles.destroy', ['trip' => $trip, 'article' => $article]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="button is-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection