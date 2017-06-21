@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                @include('trips._sidebar', ['trip' => $trip])
            </div>

            <div class="column">
                <h1 class="title">{{ $trip->name }} Articles
                    <a href="{{ route('trips.articles.create', $trip) }}" class="button pull-right">Add an Article</a>
                </h1>

                @include('layouts.flash')

                @unless($trip->days->count())
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
                            <p>
                                <a href="{{ route('trips.articles.edit', ['trip' => $trip, 'article' => $article]) }}">Edit</a> |

                                <a href="{{ route('trips.articles.destroy', ['trip' => $trip, 'article' => $article]) }}"
                                   onclick="event.preventDefault(); document.getElementById('article-delete-form').submit();">
                                    Delete</a>

                            <form id="article-delete-form" action="{{ route('trips.articles.destroy', ['trip' => $trip, 'article' => $article]) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection