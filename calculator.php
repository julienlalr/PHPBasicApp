<?php
class Calculator 
{
    public function sum($x, $y) {
        return $x + $y;
    }
    public function sub($x, $y) {
        return $x - $y;
    }
    public function div($x, $y) {
        return $x / $y;
    }
    public function mul($x, $y) {
        return $x * $y;
    }
}


$calc = new Calculator();
$op   = $_GET["op"];
$x    = $_GET["x"];
$y    = $_GET["y"];
if (in_array($op, ["sum", "sub", "div", "mul"]) and $x and $y) {
 echo "<h1>" . $calc->$op($x, $y) . "</h1";
} elseif (!$x or !$y) {
 echo "<h1>Incorrect or incomplete data</h1>";
} else {
 echo "<h1>Unrecognized operation : sth $op</h1>";
}
?>