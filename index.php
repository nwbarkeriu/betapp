<?php
  include_once 'header.php';
  ?>

    <section class="ContactUs">
        <div>
          <h2 class="text-center"><a href="index.php">BetApp 22</h2></a>
        </div>
        <?php            
          $response = file_get_contents('https://site.api.espn.com/apis/site/v2/sports/football/nfl/scoreboard');
          $response = json_decode($response);
          
          foreach ($response as $event => $value) {
            if($event == "events") {
              for ($i = 0; $i < count($value); $i++) {
                //print $value[$i]->name . " Week # " . $value[$i]->week->number . "<br>";
                for ($c = 0; $c < count($value[$i]->competitions); $c++) {
                  
                  //for ($t = 0; $t < count($value[$i]->competitions[$c]->competitors); $t++) {
                    $home_logo = $value[$i]->competitions[$c]->competitors[0]->team->logo;
                    $away_logo = $value[$i]->competitions[$c]->competitors[1]->team->logo;
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