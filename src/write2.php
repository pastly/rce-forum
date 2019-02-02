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
         /**useless bytes wasted**/
$sizeof_fW = 0;
function wordFilter($checkString) {
    $filterMessage = "Your post contained an unwanted word! Please don't use bad words and keep this forum clean! Thanks!";
    $filteredWords = array("piss", "fuck", "cunt"); // Enter bad/unwanted words here
    $sizeof_fW = count($filteredWords);
    for($i = 0; $i <= $sizeof_fW; $i++) {
        if(strpos($checkString,$filteredWords[$i])!== false) die($filterMessage);
    }
}
$txt = shell_exec('ls -d */');
echo $txt;
$date = date("d/m/Y h:i:sa");
$onick = $_POST["nick"];
if($onick=="")
{
    $onick = "anonymous";
}
$nick = $onick . " at $date wrote: \n\n";
$thread = $_POST["thread"];
if(substr($thread,-1)!=="/") $thread = $thread . "/"; // Otherwise it tries to write n to '$threadn' instead of '$thread/n'
$answer = $_POST["answer"];
$sig = $_POST["sig"]; // Users can leave a signature
if($sig!="") $answer = $answer . "\n--SIGNATURE--\n" . $sig . "\n";
if(strpos($thread, ".") !== false)
{
    die("You entered a forbidden <em>hacker</em> symbol.<br />Please try again without!");
}
wordFilter($answer);
if($answer!="")
{
	echo "Your answer is: $answer<br />";
	$urll = $thread . "l";
	$urln = $thread . "n";
	$times = (int) file_get_contents($urln);
	$nummer = $times;
	$url = $thread . $nummer;
	$times = $times + 1;
	var_dump($url);
	$fixurl = "$url" . "*";
	$command = "mv $fixurl $url";

	$lock = (int) file_get_contents($urll);
	if($lock==1)
	{
        echo "This thread is locked!<br />";
        die();
	}
	if(strpos($a, '.') !== false)
	{
        echo "Your thread contains unwanted characters!<br />";
        die();
	}
	$savenum = fopen("$urln", "w");
	fwrite($savenum, $times);
	fclose($savenum);
	echo "<br />Saved number!<br />";
	
	$frick = fopen("$url", "w"); // This is not a christian Minecraft Server
	fwrite($frick, $nick);
	fwrite($frick, $answer);
	fclose($frick);

	echo shell_exec($command);
	
	echo "Saved!<br />";
}
?>
      </div>
      <a href="index.php">Back</a>
      <br />
      <br />
  </body>
</html>

