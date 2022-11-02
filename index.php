<?php
  include_once 'header.php';
  ?>

    <section class="ContactUs">
        <div>
          <h2 class="text-center"><a href="index.php">BetApp 2022</h2></a>
        </div>
        <?php
        if (isset($_SESSION["useruid"])) {
          echo "<p> Hello there " . $_SESSION["useruid"] . "</p>";
        }
?>

    </section>
    <?php
  include_once 'footer.php';
  ?>