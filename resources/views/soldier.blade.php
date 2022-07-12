@extends('master')

@section('title')
{{ $soldier->surname." ".$soldier->name." ".$soldier->middle_name }}
@endsection

@section('content')
<div class="container" id="container">
  <div class="row align-items-center">
    <div class="col-md-4 col-sm-12 text-center">
      @if ($soldier->photo !== NULL)
        <img src="/images/soldiers_photo/{{ $soldier->photo }}" id="soldier-photo" class="rounded">
      @else
        <img src="/images/soldiers_photo/default.jpg" id="soldier-photo" class="rounded">
      @endif
    </div>
    <div class="col-md-8 col-sm-12 mb-sm-5 mt-5">
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
        @for ($i = 0; $i < count($awards); $i++)
        <tr>
            @if ($i == 0)
              <td id="info-title">Награды: </td>
            @else
              <td></td>
            @endif
            <td id="info-text">
              <a target="_blank" href="https://ru.wikipedia.org/wiki/"{{ str_replace(" ", "_", $awards[$i]->props->name) }}" id="award-redirect">
                <img title="{{ $awards[$i]->props->name }}" src="/images/awards_photo/{{ $awards[$i]->props->photo }}" height="40" id="award-photo">
              </a>
              <!-- картинка для popup дока -->
              <img src="/images/award_docs/{{ $awards[$i]->doc_path }}" id="doc-pic{{$i+1}}"> 
              <span id="pop-up-text{{$i+1}}" onclick='popupOpen("doc-pic{{$i+1}}")'>{{ $awards[$i]->props->name }}</span>
            </td>
        </tr>
        @endfor
      @endif
      </table>
      <!-- popup блок -->
      <div id="pop-up" class="pop-up-container">              
        <span class="close">&times;</span>
        <img class="pop-up-content" id="pop-up-doc">
      </div>
    </div>
  </div>
  <div id="qr-img-container">
    <img src="/images/soldiers_qr/<?=$soldier->qr_path?>" width="100" id="qr-img">
    </br>
    <a href="/download?file=<?=$soldier->qr_path?>">Скачать QR-код</a>
  </div>
</div>
<script type="text/javascript">
  var popup = document.getElementById('pop-up');
  var popupDoc = document.getElementById('pop-up-doc');
  function popupOpen(imgId){
      var img = document.getElementById(imgId);
      popup.style.display = "block";
      popupDoc.src = img.src;
  }
  var closeButton = document.getElementsByClassName("close")[0];
  closeButton.onclick = function() {
      popup.style.display = "none";
  }
</script>
@endsection