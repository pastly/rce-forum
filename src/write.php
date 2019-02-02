<!DOCTYPE html>
<?php $css = "css.css"; ?>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
    <title>Write to WTAA</title>
  </head>
  <body>
    <h1>Write to WTAA</h1>
    <p>
<?php
         $txt = shell_exec('find */ -type d'); // Display all threads
echo $txt;
?>
      <br />
Please enter the thread you wish to post to along with the message<br />
<form action="write2.php" method="post">
  Thread:
<input type="text" name="thread" /><br />
<div>
  Name/Title (if none chosen, "anonymous" is being taken): <br />
<input type="text" name="nick" /> <br />
<textarea name="answer" style="width:250px;height:150px"></textarea><br />
Signature (e.g. ad for your website) <input type="text" name="sig" /><br />
<input type="Submit" value="Submit" />
</form>
</div>
<br />
<div>
  <p>This is an example of a post:<br />
    anonymous at 01/01/1970 at 07:00:00am wrote:<br /><br>
    Post<br>
    --<br>
    Signature</p>
</div>
<a href="index.php">Back</a>
<br />
<br />
  </body>
</html>

