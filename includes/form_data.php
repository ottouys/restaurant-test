<?php 

$emailAddr = isset($_POST['emailAddr']) ? $_POST['emailAddr'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$complaint = isset($_POST['complaint']) ? $_POST['complaint'] : null;

$form_values = [
  'email' => $emailAddr,
  'name' => $name,
  'complaint' => $complaint,
];

// Return Values to the JS AJAX function in order to show it visually
echo json_encode($form_values);



?>