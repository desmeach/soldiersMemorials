@extends('master')

@section('title')
Братская могила г. Волжского
@endsection

@section('content')
<div class="container" id="container">
    <div class="row align-items-center mb-5">
        <div class="col-lg-4 col-sm-12 text-center">
            <img src="/images/memorials_photo/volzhsky_memorial.jpg" id="memorial-photo" class="rounded">
        </div>
        <div class="col-lg-8 col-sm-12 mb-sm-5 mt-5">
            <span id="memrl-descrip" style="font-size: 20px;">
                <?= file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/memorials_descriptions/volzhsky_memorial_description.txt")?>
            </span>
        </div>
    </div>
</div>
@endsection

@extends('footer')