@extends('master')

@section('title')
{{ $soldier->surname." ".$soldier->name." ".$soldier->middle_name }}
@endsection

@section('content')
<div class="container col-md-9 mx-auto" id="container">
        @if ($soldier->photo !== NULL)
          <img src="/images/soldiers_photo/{{ $soldier->photo }}" id="soldier-photo">
        @else
          <img src="/images/soldiers_photo/default.jpg" id="soldier-photo">
        @endif
        <h1 id="soldier-name">{{ $soldier->surname." ".$soldier->name." ".$soldier->middle_name }}</h1>
        <table class="info-table" id="info-table">
        <tr>
          <td id="info-title">Дата рождения: </td>
          <td id="info-text">{{ $soldier->birth_day.".".$soldier->birth_month.".".$soldier->birth_year }}</td>
        </tr>
        @if ($birthplace !== NULL)
          <tr>
            <td id="info-title">Место рождения: </td>
            <td id="info-text">{{ $birthplace->country->name.", ".$birthplace->region.", ".$birthplace->city.", ".$birthplace->village }}</td>
          </tr>
        @endif
        @if ($enlistment !== NULL)
          <tr>
            <td id="info-title">Год призыва: </td>
            <td id="info-text">{{ $enlistment->year.".".$enlistment->month.".".$enlistment->day }}</td>
          </tr>
        @endif
        <tr>
          <td id="info-title">Место призыва: </td>
          <td id="info-text">{{ $enlistment->country->name.", ".$enlistment->region.", ".$enlistment->city.", ".$enlistment->distinct }}</td>
        </tr>
        @if ($militaryUnit !== NULL)
          <tr>
            <td id="info-title">Воинская часть: </td>
            <td id="info-text">{{ $militaryUnit->unit_num." ".$militaryUnit->name }}</td>
          </tr>
        @endif
        <tr>
          <td id="info-title">Звание: </td>
          <td id="info-text">{{ $rank->title }}</td>
        </tr>
        @if ($retire !== NULL)
          <tr>
            <td id="info-title">Дата выбытия: </td>
            <td id="info-text">{{ $retire->day.".".$retire->month.".".$retire->year }}</td>
          </tr>
        @endif
        <tr>
          <td id="info-title">Судьба: </td>
          <td id="info-text">{{ $status->status }}</td>
        </tr>
        @if (count($awards) > 0)
          <tr>
            <td id="info-title">Награды: </td>
            @foreach ($awards as $award)
              <td id="info-text">
                <a target="_blank" href="https://ru.wikipedia.org/wiki/{{ str_replace(" ", "_", $award->name) }}" id="award-redirect">
                  <img title="{{ $award->name }}" src="/images/awards_photo/{{ $award->photo }}" height="40" id="award-photo">
                </a>
                {{ $award->name }}
              </td>
            @endforeach
          </tr>
        @endif
        </table>
</div>
@endsection