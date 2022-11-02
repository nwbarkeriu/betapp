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
             print $value->name;
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