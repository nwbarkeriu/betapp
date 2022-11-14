<?php
  include_once 'header.php';
  ?>


<?php            


    for ($a = 16900; $a < 17900; $a++) {
          $playerInfo = 'https://site.web.api.espn.com/apis/common/v3/sports/football/nfl/athletes/';
          $playerID = '101';
          $player_URL = file_get_contents($playerInfo . $a);
          $player_Data = json_decode($player_URL);
          set_time_limit(50000);
          

      foreach ($player_Data as $athlete => $value) {
        if($athlete == "athlete") {
            $athlete_name = $value->displayName;
            $athlete_id = $value->id;
            $athlete_status = $value->status->type;
            $athlete_team = $value->team->displayName;
            $player_img = $value->headshot->href;
            $player_pos = $value->position->displayName;
            if($athlete_status !== "inactive") {
                require_once './includes/dbh.inc.php';
                require_once './includes/functions.inc.php';
                if (playerExists($conn, $athlete_id) !== false) {
                    //header("location: ./profile.php?error=playerexists");
                    exit();
                }
                print "<img src='" . $player_img . "' width='5%' height='5%'>" . $athlete_name . " " . $player_pos . " " . $athlete_team . "<br>";
                addPlayer($conn, $athlete_id, $athlete_name, $athlete_team, $player_img, $player_pos);
            } 
        }
      }
    }
?>




<?php
  include_once 'footer.php';
?>