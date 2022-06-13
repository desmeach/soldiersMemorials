<?
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/soldier_model.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/lib/database.php";

if (isset($_POST["submit"]))
{
  $name = $_POST["soldier-name-search"];
  $name = explode(" ", $name);
  header("Location: /soldiers/src/views/soldier/soldier.php?surname=".$name[0]."&name=".$name[1]."&middle_name=".$name[2]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://localhost/soldiers/js/jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="http://localhost/soldiers/js/jquery/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/soldiers/js/jquery/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<? $_SERVER["DOCUMENT_ROOT"] ?>/soldiers/public/styles/main.css?v1.0">
    <title>Memorials</title>
</head>
<body>
    <script>
    $(document).on("focus", "#soldier-name-search", function(e) {
        if ( !$(this).data("autocomplete") ) { 
            $(this).autocomplete({          
                source: [<? 
                          $soldiers = new SoldierModel(new Database("db_soldiers"));
                          $soldiers = $soldiers->readAllSoldierByMemorial(1);
                          foreach ($soldiers as $soldier_info)
                          {
                            $dataString = "";
                            $dataString .= $soldier_info["surname"] . " " . $soldier_info["name"] . " " . $soldier_info["middle_name"];
                            echo "'". $dataString . "',";
                          }
                        ?>],
                width: 200,
                max: 10,  
            });
        }
    });
    </script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="btn-group mr-4">
          <button type="button" class="btn text-uppercase main-btn">Братская могила г.Волжского</button>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split pnt-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
          <div class="dropdown-menu dropmenu">
            <a class="dropdown-item" href="/soldiers/">Братская могила г.Волжского</a>
          </div>
        </div>
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