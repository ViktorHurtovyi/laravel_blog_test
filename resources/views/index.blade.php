@extends('layouts.app')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Список Статей</h1>
        <br>
        <a href="{{route('add')}}" class="btn btn-info">Добавить статью</a>
        <br><br><br>
        <div class="col col-8">
            @foreach($articles as $article)

                <div class="row">
                    <div class="col col-8">
                        <h2>{{$article->title}}</h2>
                    </div>
                    @if(Auth::user()->name == $article->author)
                        <div class="col col-3">
                            <a href="{!! route('edit', ['id' => $article->id]) !!}">Редактировать</a>
                            <a href="{!! route('delete', ['id' => $article->id]) !!}">Удалить</a>
                        </div>
                    @endif

                </div>
                <div class="row">
                    <div class="col col-8">
                        <h5>{{$article->description}}</h5>
                    </div>
                    <div class="col col-4">
                        <h6> Автор: {{$article->author}}</h6>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
        {{ $articles->links() }}
    </main>
@stop
