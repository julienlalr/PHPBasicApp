<?php
$name = (isset($_GET['name'])) ? $_GET['name'] : "Name";
echo "<h1>Hello, $name!</h1>";
?>