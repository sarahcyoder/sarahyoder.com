<!DOCTYPE html>
<html>
	<body>
<?

include 'nouns-array.php';

$q = $_REQUEST["q"];

$response = "";

// lookup all hints from array
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach($nounsArr as $noun) {
        if (stristr($q, substr($noun, 0, $len))) {
            if ($response === "") {
                $response = $noun;
            } else {
                $response .= ", $noun";
            }
        }
    }
}

// Output
echo $response;

?> 

	</body>
</html>