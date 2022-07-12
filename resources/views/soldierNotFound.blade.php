@extends('master')

@section('title')
Результаты поиска
@endsection

@section('content')
    <div class="container" id="container">
        <div class="row">
            <div class="col-12" id="snf-col">
                <h2 class="text-center text-uppercase srch-title">Результаты поиска</h2>
            </div>
        </div>
        <div class="row mt-5 srch-row">
            <div class="col-12" id="snf-col">
                <h2 class="text-center text-uppercase">Не удалось найти солдата</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12" id="snf-col">
                <a href="/" class="btn home-btn btn-lg text-uppercase">На главную</a>
            </div>
        </div>
    </div>
@endsection