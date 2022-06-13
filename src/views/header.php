<?
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/soldier_model.php";

if (isset($_POST["submit"]))
{
  $name = $_POST["soldier-name-search"];
  $name = explode(" ", $name);
  header("Location: /soldiers/src/views/soldier/soldier.php?surname=".$name[0]."&name=".$name[1]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="js/jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="js/jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<? $_SERVER["DOCUMENT_ROOT"] ?>/soldiers/public/styles/main.css?v1.0">
    <title>Soldiers</title>
</head>
<body>
    <script>
    <? $soldiers = [] ?>

    $(document).on("focus", "#soldier-name-search", function(e) {
        if ( !$(this).data("autocomplete") ) { 
            $(this).autocomplete({          
                source: ,
                width: 200,
                max: 10,  
            });
        }
    });
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="/soldiers/">Братская могила г.Волжского</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <form class="form-inline" method='POST'>
                    <input class="form-control mr-sm-2" type="search" placeholder="Введите ФИО солдата" aria-label="Search" name="soldier-name-search" id="soldier-name-search">
                    <button class="btn btn-light my-2 my-sm-0" type="submit" name="submit">Найти</button>
                </form>
            </li>
          </ul>
        </div>
    </nav>