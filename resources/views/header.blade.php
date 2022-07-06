<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="/js/jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="/js/jquery/jquery-ui.js"></script>
    <script type="text/javacript" src="/js/popup.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/js/jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <script>
    $(document).on("focus", "#soldier-name-search", function(e) {
        if ( !$(this).data("autocomplete") ) {
            var data = <?= json_encode($soldiersData)?>;
            $(this).autocomplete({          
                source: data,
                width: 200,
                max: 10,  
            });
        }
    });
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="btn-group mr-4">
        <button type="button" class="btn text-uppercase main-btn" onclick="location.href = '/'">Братская могила г.Волжского</button>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split pnt-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
          <div class="dropdown-menu dropmenu">
            <a class="dropdown-item" href="/">Братская могила г.Волжского</a>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <form class="form-inline" method='GET' action="{{route('soldiersList')}}">
                    {{ csrf_field() }}
                    <input class="form-control mr-sm-2 srch-fild" type="search" placeholder="Введите ФИО солдата" aria-label="Search" name="soldier-name-search" id="soldier-name-search">
                    <button class="btn sbmt-srch" type="submit" name="submit">Найти</button>
                </form>
            </li>
          </ul>
        </div>
    </nav>