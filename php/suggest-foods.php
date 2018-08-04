<!DOCTYPE html>
<html>
	<body>
<?

include 'foods-array.php';

$q = $_REQUEST["q"];

$response = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach($foodsArr as $food) {
        if (stristr($q, substr($food, 0, $len))) {
            if ($response === "") {
                $response = $food;
            } else {
                $response .= ", $food";
            }
        }
    }
}

// Output
echo $response;

?> 

	</body>
</html>