<?php
  include_once 'header.php';
  ?>


<?php            
          
          for ($a = 101; $a < 150; $a++) {
          $playerInfo = 'https://site.web.api.espn.com/apis/common/v3/sports/football/nfl/athletes/';
          $playerID = '101';
          $player_URL = file_get_contents($playerInfo . $a);
          $player_Data = json_decode($player_URL);
          

          foreach ($player_Data as $athlete => $value) {
            if($athlete == "athlete") {
            $athlete_status = $value->displayName;
        print_r($athlete_status. "<br>");
            }
            }
    }
?>




<?php
  include_once 'footer.php';
?>