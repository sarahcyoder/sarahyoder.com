<!DOCTYPE html>
<html>
	<body>
<?

include 'countries-array.php';

$q = $_REQUEST["q"];

$response = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach($countryArr as $country) {
        if (stristr($q, substr($country, 0, $len))) {
            if ($response === "") {
                $response = $country;
            } else {
                $response .= ", $country";
            }
        }
    }
}

// Output
echo $response;

?> 

	</body>
</html>