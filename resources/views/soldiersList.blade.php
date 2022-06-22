@extends('master', ['soldiersData' => ''])

@section('title')
Список найденных солдат
@endsection

@section('content')
@if (count($soldiers) > 0)
    <table class="info-table" id="info-table">
    @foreach ($soldiers as $soldier)
        <tr>
            <td>
                <a href="/soldier?id=<?=$soldier->id?>"><?=$soldier->surname." ".$soldier->name." ".$soldier->middle_name?></a>
            </td>
        </tr>
    @endforeach
</table>
@else
    {{route('soldierNotFound')}}
@endif
@endsection

@extends('footer')