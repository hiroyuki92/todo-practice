@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="todo__alert">
    @if(session('success'))
        <div class="alert alert-success">
        {{ session('success')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    </div>

    <div class="todo__content">
        <div class="section-title">
            <h2>新規作成</h2>
        </div>
        <form class="create-form" action="/todos" method="post">
            @csrf
            <div class="create-form__item">
                <input class="create-form__item-input type="text" name="content" value="{{ old('content') }}" />
            </div>
            <select class="create-form__select">
                <option value="">カテゴリ</option>
            </select>
            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </form>

        <div class="section-title">
            <h2>Todo検索</h2>
        </div>
        <form class="search-form" action="/todos" method="post">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input type="text" name="content" value="{{ old('content') }}" />
            </div>
            <select class="search-form__select">
                <option value="">カテゴリ</option>
            </select>
            <div class="search-form__button">
                <button class="create-form__button-submit" type="submit">検索</button>
            </div>
        </form>

        <div class="todo-table">
            <table class="todo-table__inner">
                <tr class="todo-table__row">
                    <th class="todo-table__header">Todo</th>
                </tr>

                @foreach($todos as $todo)
                <tr class="todo-table__row">
                    <td class="todo-table__item">
                        <form class="update-form" action="/todos/update" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="update-form__item">
                                <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}">
                                <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button-submit" type="submit">更新</button>
                            </div>
                        </form>
                    </td>
                    <td class="todo-table__item">
                        <form class="delete-form" action="/todos/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="delete-form__button">
                                <input type="hidden" name="id" value="{{ $todo['id'] }}">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection