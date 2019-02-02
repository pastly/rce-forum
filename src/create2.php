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
    <p>Enter the name of the thread you wish to create:<br /></p>
<?php
                                                    $thread = $_POST["thread"];
if(strpos($thread, "..") !== false) // So you don't go in thread "../../../home/user/
{
    die("You enteread <em>a forbidden hacker symbol!</em>. Please try without or I will call the FBI.");
}
if(strpos($thread, ".") !== false) // Preventing users from creating 'hidden threads'
{
    die("You enteread <em>a forbidden hacker symbol!</em>. Please try without or I will call the FBI.");
}
if(substr($thread, -1) !== "/") $thread = $thread . "/"; // I like to have slashes at the end of directories
if($thread!="")
{
    if(!file_exists($thread))
    {
    }
    mkdir($thread, 0755);
    $npath = $thread ."n";
    $save = fopen($npath, "w") or die("Unable to write file!");
    fwrite($save, 0);
    fclose($save);
    echo "The thread $thread was successfully created.";
}
else die("The thread $thread already exists."); // Pretty obvious
?>
<br />
<a href="index.php">Back</a><br />
</body>
</html>

