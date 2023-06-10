<?php
  include_once 'connect.php';

  session_start();

  $num = $_POST["page_number"];

  echo $num;
?>