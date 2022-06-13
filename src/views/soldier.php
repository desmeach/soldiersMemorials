    <div class="container col-md-8 mx-auto" id="soldier-container">
        <img src="/soldiers/public/images/soldiers_photo/<? echo $soldier["photo"] ?>" width="250" height="400" id="soldier-photo">
        <h1 id="soldier-name"><? echo $soldier["surname"]." ".$soldier["name"]." ".$soldier["middle_name"] ?></h1>
        <table class="info-table">
          <tr>
            <td width="30%">Дата рождения: </td>
            <td><?echo $soldier["birth_day"].".".$soldier["birth_month"].".".$soldier["birth_year"]?></td>
          </tr>
          <tr>
            <td width="30%">Место рождения: </td>
            <td><?echo $soldier["birthplace"]["region"].", ".$soldier["birthplace"]["city"].", ".$soldier["birthplace"]["district"].", ".$soldier["village"]?></td>
          </tr>
          <tr>
            <td width="30%">Год призыва: </td>
            <td><?echo $soldier["enlistment"]["day"].".".$soldier["enlistment"]["month"].".".$soldier["enlistment"]["year"]?></td>
          </tr>
          <tr>
            <td width="30%">Место призыва: </td>
            <td><?echo $soldier["enlistment"]["country"]["country"].", ".$soldier["enlistment"]["region"].", ".$soldier["enlistment"]["city"].", ".$soldier["enlistment"]["district"]?></td>
          </tr>
          <tr>
            <td width="30%">Воинская часть: </td>
            <td><?echo $soldier["militaryUnit"]["unit_num"]." ".$soldier["militaryUnit"]["type"]?></td>
          </tr>
          <tr>
            <td width="30%">Звание: </td>
            <td><?echo $soldier["rank"]["rank_name"]?></td>
          </tr>
          <tr>
            <td width="30%">Дата выбытия: </td>
            <td><?echo $soldier["retire"]["day"].".".$soldier["retire"]["month"].".".$soldier["retire"]["year"]?></td>
          </tr>
          <tr>
            <td width="30%">Судьба: </td>
            <td><?echo $soldier["status"]["status"]?></td>
          </tr>
          <tr>
            <td width="30%">Награды: </td>
            <td><img src="/soldiers/public/images/awards_photo/<? echo $soldier["award"]["photo"] ?>" height="40" id="<?echo str_replace('.png', '', $soldier["award"]["photo"])?>">
            <?echo $soldier["award"]["award_name"]?></td>
          </tr>
        </table>
    </div>