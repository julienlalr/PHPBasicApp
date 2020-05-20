<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
</head>
<body>
  <?php
$names = array("Patrick", "John", "Marie", "Claire", "Paul");
foreach ($names as $name) {
    if (stripos($name, "pa")===0) {
       print "$name, ";
    }
}

class Calculator {
    public function sum($x, $y) {
        return $x + $y;
    }
    public function subtract($x, $y) {
        return $x - $y;
    }
    public function multiply($x, $y) {
        return $x * $y;
    }
    public function divide($x, $y) {
        return $x / $y;
    }
}
$calculator = new Calculator();
echo $calculator->sum(5, 7);
echo $calculator->subtract(8, 2);
echo $calculator->multiply(2, 5);
echo $calculator->divide(20, 4);

function calculateWordsStats($url) {
    $content = file_get_contents($url);
    $words = explode(" ", $content);
    $wordCounter = [];
    foreach ($words as $word) {
        $trimmedWord = trim($word);
        if (strlen($trimmedWord)==0) {
            continue;
        }
        if (!isset($wordCounter[$trimmedWord]))
            $wordCounter[$trimmedWord] = 0;
        $wordCounter[$trimmedWord]++;
    }
    arsort($wordCounter);
    $keys = array_keys($wordCounter);
    for ($i = 0; $i < 10 && $i < sizeof($keys) ; $i++) {
        echo $keys[$i] . " - " . $wordCounter[$keys[$i]] . PHP_EOL;
    }
}

calculateWordsStats('http://www.gutenberg.org/files/1321/1321-0.txt');


?>

</body>
</html>