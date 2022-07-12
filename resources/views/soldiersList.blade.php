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
        @foreach ($soldiers as $soldier)
        <div class="row row-cols-auto justify-content-md-center align-items-center mt-5 mx-auto srch-row">
            <div class="col-lg-2 col-sm-12" id="snf-col">
                @if ($soldier->photo !== NULL)
                    <img src="/images/soldiers_photo/{{ $soldier->photo }}" id="soldier-icon" class="rounded">
                @else
                    <img src="/images/soldiers_photo/default.jpg" id="soldier-icon" class="rounded">
                @endif
            </div>
            <div class="col-md-auto">
                <a class="srch-sldr" href="/soldier?id=<?=$soldier->id?>"><?=$soldier->surname." ".$soldier->name." ".$soldier->middle_name?></a>
                <h5>Дата рождения: {{ $soldier->birth_day.".".$soldier->birth_month.".".$soldier->birth_year }}</h5>
            </div>
        </div>
        @endforeach
    </div>
@endsection