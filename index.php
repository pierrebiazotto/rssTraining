<!DOCTYPE html>
<html>
<head>
	<meta charset='utf8' />
	<title>Istef RSS</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("feeds.xml");
$feed = $xmlDoc->getElementsByTagName("feed");

echo"<select onchange='window.location=\"?feed=\"+value'>";
echo"<option>Sélectionner un flux : </option>";
foreach($feed as $fe){
	$title = $fe->getElementsByTagName('title')->item(0)->nodeValue;
	$link = $fe->getElementsByTagName('link')->item(0)->nodeValue;

	echo "<option value='{$link}'>".$title."</option>";
}
echo "</select>";



if(isset($_GET['feed'])){

	$xmlDoc->load($_GET['feed']);
	$news = $xmlDoc->getElementsByTagName("item");

	foreach($news as $article) {
		$title = $article->getElementsByTagName("title")->item(0)->nodeValue;
		$link = $article->getElementsByTagName("link")->item(0)->nodeValue;
		$description = $article->getElementsByTagName("description")->item(0)->nodeValue;

		echo "<div id='box'>";

		echo "<h3>" . $title . "</h3><br />";
		echo $description . "<br />";
		echo "<hr />";
		echo "<a href='{$link}' target='_blank'>Lire plus...</a><br />";

		echo "</div>";
	}
}
?>
</body>
</html>
