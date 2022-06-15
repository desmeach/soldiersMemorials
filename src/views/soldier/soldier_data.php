<div class="container col-md-9 mx-auto" id="container">
        <img src="/soldiers/public/images/soldiers_photo/<? echo $soldier["photo"] ?>" id="soldier-photo">
        <h1 id="soldier-name"><? echo $soldier["surname"]." ".$soldier["name"]." ".$soldier["middle_name"] ?></h1>
        <table class="info-table" id="info-table">
          <tr>
            <td id="info-title">Дата рождения: </td>
            <td id="info-text"><?echo $soldier["birth_day"].".".$soldier["birth_month"].".".$soldier["birth_year"]?></td>
          </tr>
          <tr>
            <td id="info-title">Место рождения: </td>
            <td id="info-text"><?echo $soldier["birthplace"]["region"].", ".$soldier["birthplace"]["city"].", ".$soldier["birthplace"]["district"].", ".$soldier["birthplace"]["village"]?></td>
          </tr>
          <tr>
            <td id="info-title">Год призыва: </td>
            <td id="info-text"><?echo $soldier["enlistment"]["day"].".".$soldier["enlistment"]["month"].".".$soldier["enlistment"]["year"]?></td>
          </tr>
          <tr>
            <td id="info-title">Место призыва: </td>
            <td id="info-text"><?echo $soldier["enlistment"]["country"]["country"].", ".$soldier["enlistment"]["region"].", ".$soldier["enlistment"]["city"].", ".$soldier["enlistment"]["district"]?></td>
          </tr>
          <tr>
            <td id="info-title">Воинская часть: </td>
            <td id="info-text"><?echo $soldier["militaryUnit"]["unit_num"]." ".$soldier["militaryUnit"]["type"]?></td>
          </tr>
          <tr>
            <td id="info-title">Звание: </td>
            <td id="info-text"><?echo $soldier["rank"]["rank_name"]?></td>
          </tr>
          <tr>
            <td id="info-title">Дата выбытия: </td>
            <td id="info-text"><?echo $soldier["retire"]["day"].".".$soldier["retire"]["month"].".".$soldier["retire"]["year"]?></td>
          </tr>
          <tr>
            <td id="info-title">Судьба: </td>
            <td id="info-text"><?echo $soldier["status"]["status"]?></td>
          </tr>
          <tr>
            <td id="info-title">Награды: </td>
            <td id="info-text"><a target="_blank" href="https://ru.wikipedia.org/wiki/<?echo str_replace(" ", "_", $soldier["award"]["award_name"])?>"><img title="<?echo $soldier["award"]["award_name"]?>" src="/soldiers/public/images/awards_photo/<? echo $soldier["award"]["photo"] ?>" height="40" id="<?echo str_replace('.png', '', $soldier["award"]["photo"])?>"></a>
            <?echo $soldier["award"]["award_name"]?></td>
          </tr>
        </table>
</div>