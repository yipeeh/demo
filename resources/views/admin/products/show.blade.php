@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="description-more col-12 margin-tb d-flex justify-content-start flex-column-reverse gap-3">
                <div class="card-header">
                    <h2>
                        {{ $products->name }}
                    </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('welcome') }}">{{ __('Назад') }}</a>
                </div>
            </div>
        </div>

        <div class="col-12 p-2" style="height: 50vh">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('/image/' . $products->image) }}" alt="" class="img-more rounded">
                <div class="card-body shadow-sm rounded">
                    <span>{{ $products->name }}</span>
                    <p>
                        @php
                            echo rtrim(mb_substr(strip_tags(html_entity_decode($products->description)), 0, 150)) . '...';
                        @endphp
                    </p>
                    <span>{{ $products->price }} ₽</span>
                    <div class="d-flex align-items-center d-flex justify-content-start">
                        <small class="text-body-secondary me-3">{{ $products->created_at }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
