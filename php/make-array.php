<!DOCTYPE html>
<html>
	<body>
	<?

function listToArray($textList) {
	
	$countries = file($textList, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	$countriesArr = array();
	foreach($countries as $country) {
		echo "\$countryArr[] = '" . $country . "';<br />";
	}
}
	
$file = './countries.txt';
listToArray($file);

?>

	</body>
</html>