<?php
  include_once 'header.php';
  ?>

    <section class="ContactUs">
        <div>
          <h2 class="text-center"><a href="index.php">BetApp 22</h2></a>
        </div>
        <?php       
        
        require_once './includes/dbh.inc.php';
        if($r_set = $conn->query("select * from players")) {
          echo "<select style='width: 75%;'>";
          //echo "<div class='ui fluid search selection dropdown'><input type='hidden' name='player'>
          //<i class='dropdown icon'></i>
          //<div class='default text'>Select Player</div>
          //<div class='menu'>";
        while ($row = $r_set->fetch_assoc()) {
        //echo "<option><img src='" . $row[player_img] . "'width='5%' height='5%'/></option>";
        echo "<option style='background-image:url(" .$row[player_img]. "); background-repeat:no-repeat; padding-left:30px;'>" . " " . $row[player_name] . " " . $row[player_pos] . "</option>";
        //echo "<div><i>$row[id]>$row[player_name]" . " " . "$row[player_pos]</i></div>";
        }
        echo "</select>";
        //echo "</div></div>";
          }else{
          echo $conn->error;
          }

          $response = file_get_contents('https://site.api.espn.com/apis/site/v2/sports/football/nfl/scoreboard');
          $response = json_decode($response);
          
          foreach ($response as $event => $value) {
            if($event == "events") {
              for ($i = 0; $i < count($value); $i++) {

                //print $value[$i]->name . " Week # " . $value[$i]->week->number . "<br>";
                for ($c = 0; $c < count($value[$i]->competitions); $c++) {

                  //for ($t = 0; $t < count($value[$i]->competitions[$c]->competitors); $t++) {
                    $home_logo = $value[$i]->competitions[$c]->competitors[0]->team->logo;
                    $home_team = $value[$i]->competitions[$c]->competitors[0]->team->displayName;
                    $away_logo = $value[$i]->competitions[$c]->competitors[1]->team->logo;
                    $away_team = $value[$i]->competitions[$c]->competitors[1]->team->displayName;
                    print "<img src='" . $home_logo . "' width='5%' height='5%'>" . $value[$i]->competitions[$c]->competitors[0]->team->displayName . " @ "; //homeTeam
                    print "<img src='" . $away_logo . "' width='5%' height='5%'>" . $value[$i]->competitions[$c]->competitors[1]->team->displayName . "<br>"; //awayTeam
                    print $value[$i]->competitions[$c]->venue->fullName . " Stadium Name<br>";
                  //}
                }
              }
            }
          }


          

        if (isset($_SESSION["useruid"])) {
          echo "<p> Hello there " . $_SESSION["useruid"] . "</p>";
        }
?>

    </section>
    <?php
  include_once 'footer.php';
  ?>