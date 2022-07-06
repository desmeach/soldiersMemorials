@extends('master')

@section('title')
Результаты поиска
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase srch-title">Результаты поиска</h2>
            </div>
        </div>
        <div class="row justify-content-md-center align-items-center mb-5 srch-row">
            <div class="col-12">
                <h2 class="text-center text-uppercase srch-title">Не удалось найти солдата</h2>
            </div>
        </div>
        <div class="row justify-content-md-center align-items-center">
            <a href="/" class="btn home-btn btn-lg text-uppercase">На главную</a>
        </div>
    </div>
@endsection

@extends('footer')