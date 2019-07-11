@extends('layouts.app')
@section('content')
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1>Добавить Статью</h1>
        <br>
        <div class="col col-8">
            <form method="post" action="{{route('editRequest')}}">
                {!! csrf_field() !!}
                <input name="id" type="hidden" value="{{$article['id']}}">
                <p>Введите название статьи: <br><input type="text" value="{{$article['title']}}" name="title" class="form-control" required></p>
                <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                <p>Текст статьи: <br><textarea name="description" class="form-control">{{$article['description']}}</textarea></p>
                <button type="submit" class="btn-success" style="cursor: pointer">Изменить</button>
            </form>
        </div>
    </main>
@stop