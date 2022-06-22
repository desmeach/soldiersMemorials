@extends('master')

@section('title')
Мемориал
@endsection

@section('content')
<div class="container col-md-9 mx-auto" id="container">
    <img src="/images/memorials_photo/volzhsky_memorial.jpg" id="memorial-photo">
    <span id="memrl-descrip" style="font-size: 20px;">
        <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/memorials_descriptions/volzhsky_memorial_description.txt")?>
    </span>
</div>
@endsection

@extends('footer')