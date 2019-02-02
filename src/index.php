<!DOCTYPE html>
<?php
$forumVersion = "1.1.3.1";
$css = "css.css";
?>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
    <title>WTAA</title>
  </head>
  <body>
    <h1>WTAA</h1>
    <p>
    <?php
         $txt = shell_exec('find */ -type d'); // Displays all threads
      echo $txt;
      echo "<br />";
      echo "<form action=\"index.php\" method=\"post\">";
      echo "Enter thread ";
      echo "<input type=\"text\" name=\"thread\" /><br />";
      echo "<input type=\"Submit\" class=\"button\" value=\"Submit\" />";
      echo "</form>";
      $thread = $_POST["thread"];
if(strpos($thread,"..") !== false) die("Error."); // Prevents from looking in ../../../home/user/important/documents
if($thread=="") if(file_exists("rules/") && is_dir("rules/")) $thread = "rules/"; // If visiting for the first time or without thread, rules are opened (needs rules to exist obviously
if($thread!="") if(substr($thread,-1) === false) $thread = $thread . "/"; // The Old way didn't work with subdirectories
      $countfile = $thread . "n";
      $lockfile = $thread . "l";
      $times = (int) file_get_contents($countfile);
      echo "<br />";
      for($i=0; $i<$times; $i++)
			   {
			   $url = $thread . $i;
			   $readthe = fopen("$url", "r") or die();
			   $threadtxt = fread($readthe,filesize($url));
			   echo "<br />";
			   if(strpos($threadtxt, "<?php" !== false)) {
			   die("<h1>Oh noes :(<br />I ran into an error...");
			   }
			   if(strpos($threadtxt, "<script" !== false)) {
			   die("<h1>Oh noes :(<br />I ran into an error...");
			   }
			   else
			   {
			   echo "<pre style=\"outline-style: groove;\">";
			   echo htmlspecialchars($threadtxt);
			   echo "</pre>";
			   }
			   echo "<br />";
			   }
			   if(file_exists($lockfile) && is_file($lockfile)) {
                           $readlo = (int) file_get_contents($lockfile);
			   if($readlo==1)
			   {
			   echo "<em>This thread is locked!</em><br />";
			   }
               }
			   ?>
      <a href="write.php">Add your answer!</a><br />
      <a href="create.php">Create a thread</a>
    </p>
    <br />
    <br />
    <br />
         <center><small>Forum <?php echo $forumVersion; ?></small></center>
  </body>
</html>

