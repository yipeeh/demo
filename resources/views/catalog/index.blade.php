@extends('layouts.app')

@section('content')
    <h1 class="title-products">{{ __('Каталог товаров') }}</h1>
    <div class="container d-flex justify-content-between gap-5">
        <div class="row col-4 d-flex flex-column">
            <div class="product-header fs-2">{{ __('Фильтр') }}</div>
            <div class="filter-search">
                <input class="form-control" id="myInput" type="text" placeholder="Поиск по названию..">
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" >
            @if ($products->isEmpty())
                <span class="text-align-center my-3">{{ __('Товаров нет..') }}</span>
            @else
                @foreach ($products as $p)
                    <div class="col-lg-4 col-12 p-2" id="myList">
                        <div class="card shadow-sm h-100">
                            <img src="{{ asset('/image/' . $p->image) }}" alt="">
                            <div class="card-body">
                                <li>
                                    <span class="fw-bold">{{ $p->name }}</span>
                                </li>
                                <p>
                                    @php
                                        echo rtrim(mb_substr(strip_tags(html_entity_decode($p->description)), 0, 150)) . '...';
                                    @endphp
                                </p>
                                <span>{{ $p->price }} ₽</span>
                                <div class="d-flex align-items-center flex-wrap justify-content-between">

                                    <small class="text-body-secondary mb-3">{{ $p->created_at }}</small>
                                    @auth
                                        <div class="products-btn d-flex gap-3">
                                            <a href={{ route('welcome') . '/products' . '/' . $p->id . '/' . 'show' }}>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-success">Подробнее</button>
                                                </div>
                                            </a>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- For searching purpose -->
    <script>
        $(document).ready(function () {
       
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();     
                $("#myList").filter(function () {
                    $(this).toggle($(this).text()
                      .toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection