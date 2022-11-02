<?php
  include_once 'header.php';
  ?>

    <section class="signup-form">
        <h2> Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="fullName" placeholder="Full Name...">
            <input type="email" name="email" placeholder="Email Address...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdRepeat" placeholder="Confirm Password...">
            <button type="submit" name="submit">Sign Up</button>

        </form>
<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
        }
        else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        }
        else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        }
        else if ($_GET["error"] == "passwordmismatch") {
            echo "<p>Passwords do not match!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong.</p>";
        }
        else if ($_GET["error"] == "userexists") {
            echo "<p>Username already exists</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p>You have successfully signed up!</p>";
            header("location: ./login.php");
            exit();
        }
    }
?>
    </section>


    <?php
  include_once 'footer.php';
  ?>