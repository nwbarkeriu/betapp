<?php
  include_once 'header.php';
  ?>

    <section class="ContactUs">
        <div>
          <h2 class="text-center"><a href="index.php">BetApp 22</h2></a>
        </div>
        <?php
        //Begin Call API Method creation
        function callAPI($method, $url, $data){
          $curl = curl_init();
          switch ($method){
             case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
             case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
                break;
             default:
                if ($data)
                   $url = sprintf("%s?%s", $url, http_build_query($data));
          }

             // OPTIONS:
              //curl_setopt($curl, CURLOPT_URL, $url);
              //curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                  //'APIKEY: 111111111111111111111',
                  //'Content-Type: application/json',
              //));
              //curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
              //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
              // EXECUTE:
              $result = curl_exec($curl);
              if(!$result){die("Connection Failure");}
              curl_close($curl);
              return $result;
}
        $get_data = callAPI('GET', 'http://site.api.espn.com/apis/site/v2/sports/baseball/mlb/teams', $data = false);
        $response = json_decode($get_data, true);
          echo "<p> Test GetJSON" . $response . "</p>";

        if (isset($_SESSION["useruid"])) {
          echo "<p> Hello there " . $_SESSION["useruid"] . "</p>";
        }
?>

    </section>
    <?php
  include_once 'footer.php';
  ?>