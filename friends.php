<?php
function fdisplay($name_array)
{
  $i = 0;
  foreach ($name_array as $name) {
    $name = trim($name);
    echo '<li>' . $name . ' <button type="Submit" name="delete" value="' . $name . '">Delete</button></li>';
    $i += 1;
  }
}

function fileToArray($filename)
{
  $name_array = [];
  if (file_exists($filename)) {
    $name_array = file($filename, FILE_IGNORE_NEW_LINES);
  }
  return $name_array;
}

function addFriendsToArray(&$name_array)
{
  $name = $_POST['name'];
  if ($name != "") {
    array_push($name_array, $name);
  }
}

function saveToFile($name_array, $filename)
{
  $save_string = "";
  foreach ($name_array as $name) {
    $save_string .= $name . "\n";
  }
  if ($filename != "" and $save_string != "") {
    file_put_contents($filename, $save_string);
  }
}

function filterNameArray($name_array)
{
  $filtered_names = [];
  $filter = $_POST['filter'];
  $starting =  (isset($_POST['starting'])) ? true : false;
  if ($filter == "") {
    return $name_array;
  }
  foreach ($name_array as $name) {
    if (strstr($name, $filter) and !$starting) {
      array_push($filtered_names, $name);
    } elseif (strpos($name, $filter) === 0) {
      array_push($filtered_names, $name);
    }
  }
  return $filtered_names;
}

function deleteNameFromArray(&$name_array)
{
  $deleted_name = $_POST['delete'];
  $deleted_key = array_search($deleted_name, $name_array);
  unset($name_array[$deleted_key]);
  $name_array = array_values($name_array);
}

$file_name = './friends.txt';
$names = fileToArray($file_name);
if (isset($_POST['name'])) {
  addFriendsToArray($names);
}
if (isset($_POST['delete'])) {
  deleteNameFromArray($names);
}
$filtered_names = (isset($_POST['filter']))? filterNameArray($names) : $names;
fdisplay($filtered_names);
saveToFile($names, $file_name);
$filter = (isset($_POST['filter'])) ? $_POST['filter'] : "";
$checked = (isset($_POST['starting'])) ? 'checked' : "";