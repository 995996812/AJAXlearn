<?php 

// $name = $_GET['name'];
// $age = $_GET['age'];

$name = $_POST['name'];
$age = $_POST['age'];

$array = array('name' => $name, 'age' => $age);

echo json_encode($array);
 ?>