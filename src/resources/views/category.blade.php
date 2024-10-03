@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__content">
    <form class="create-form" action="/categories" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="name" name="name" value="{{ old('name') }}"/>
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">category</th>
            </tr>

            @foreach($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form class="update-form">
                        <div class="update-form__item-input">
                            <input class="update-form__item-input" type="name" name="name" value="{{ $category['name'] }}">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                    </form>
                </td>
                <td class="category-table__item">
                    <form class="delete-form">
                        <div class="delete-form__button">
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