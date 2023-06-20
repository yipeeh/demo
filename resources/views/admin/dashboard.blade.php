@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Кабинет администратора') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Вы вошли!') }}
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header">{{ __('Список товаров') }}</div>
                    <div class="card-body">
                        <a href="{{ route('admin.create-products') }}" class="nav-link text-decoration-underline fw-bold">
                            {{ __('Создать товар') }}
                        </a>
                    </div>
                    <div class="filter-search my-3 mx-3">
                        <span class="fs-2">{{ __('Фильтр') }}</span>
                        <input class="form-control" id="myInput" type="text" placeholder="Поиск по названию..">
                    </div>
                    <table class="table table-bordered" id="myList">
                        <tr>
                            <th>#</th>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Цена ₽</th>
                            <th>Описание</th>
                            <th width="280px">Действие</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('/image/' . $product->image) }}" width="100px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }} ₽</td>
                                <td>
                                    @php
                                        echo rtrim(mb_substr(strip_tags(html_entity_decode($product->description)), 0, 150)) . '...';
                                    @endphp
                                </td>
                                <td class="d-flex justify-content-center gap-3">
                                    <a href="{{ route('welcome') . '/admin' . '/products' . '/' . $product->id . '/' . 'edit' }}" class="btn btn-sm btn-outline-secondary">Редактировать</a>

                                    <form action="{{ route('admin.products-destroy', $product->id) }}" method="get">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myList tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
