@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card-header location-title pb-5">
                <h1>
                    {{ __('Где нас найти?') }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="card-body d-flex justify-content-between flex-wrap">
                <div class="card-wrapper d-flex justify-content-center flex-column col-4">
                    <span>
                        {{ __('Контактные данные: ') }} <a href="tel:+18475555555" class="text-decoration-none">1-847-555-5555</a>
                    </span>
                    <span>
                        {{ __('Эллектронная почта: ') }} <a href="mailto:mail@cvkemndt.ru" class="text-decoration-none">Напишите нам</a>
                    </span>
                    <span>
                        {{ __('г. Уфа, ул. Кирова 65') }}
                    </span>
                </div>

                <div class="card-location col-8">
                    <img src="/media/images/map.jpg" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
