<?php

$imgCheck = 0;

$dir_target = "//images/";

$target = getcwd() . $dir_target . basename($_FILES['gameImg']['name']);

echo($target);

move_uploaded_file($_FILES["gameImg"]["tmp"],$target);

// check that the form was submitted
// if (isset($_POST["gameImg"])) {

//     move_uploaded_file($_FILES["gameImg"]["tmp"],$target);

// } else if (!isset($_POST["submit"])) {
//     echo("It's not showing up.<br>");
// }