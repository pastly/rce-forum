<?php $css = "css.css"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
    <title>Create a thread</title>
  </head>
  <body>
    <h1>Create a thread</h1>
    <p>Enter the name of the thread you wish to create:<br />
      You can create subthreads by adding the name of the original threads plus / plus the name of the subthread (e.g. programming/cxx/)</p>
    <?php
      echo "<form action=\"create2.php\" method=\"post\">";
      echo "<input type=\"text\" name=\"thread\" /><br />";
      echo "<input type=\"Submit\" class=\"button\" value=\"Submit\" />";
      echo "</form>";
      ?>
    <br />
    <a href="index.php">Back</a><br />
  </body>
</html>

