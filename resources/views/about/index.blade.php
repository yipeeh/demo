@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">{{ __('Новые товары') }}</div>
                <div class="row about-block">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner ">
                            @if($products->isEmpty())
                                <h1 class="d-flex justify-content-center align-items-center">Товаров нет...</h1>
                            @endif
                            @foreach($products as $product)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <div class="slider-image text-center">
                                        <img src="{{ asset('/image/' . $product->image) }}" alt="">
                                    </div>
                                    <div class="card-body text-center">
                                        <span class="fw-bold">{{ $product->name }}</span>
                                        <p>
                                            @php
                                                echo rtrim(mb_substr(strip_tags(html_entity_decode($product->description)), 0, 150)) . '...';
                                            @endphp
                                        </p>
                                        <div class="products-btn gap-3">
                                            <a href={{ route('welcome') . '/products' . '/' . $product->id . '/' . 'show' }}>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-success">Подробнее</button>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">  </span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection