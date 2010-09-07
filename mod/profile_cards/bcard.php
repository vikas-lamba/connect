<?php
  $name = $_GET['name'];
  $pos = $_GET['pos'];
  $email = $_GET['email'];
  $phone = $_GET['phone'];
  $web = $_GET['web'];

  header('Content-type: image/svg+xml');

  if(($_GET['preview'])=='true') {
    $lines = file('bcard_preview_template.svg');
  } else {
    $lines = file('bcard_template.svg');
    header('Content-Disposition: attachment; filename="business_cards.svg"');
  }

  foreach ($lines as $line) {
    $tpl = array("__NAME__", "__POSITION__", "__EMAIL__","__PHONE__","__WEB__");
    $txt = array($name,$pos,$email,$phone,$web);
    echo str_replace($tpl,$txt,$line);
  }
?>
