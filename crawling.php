<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 데이터베이스</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="crawling.css">

  </head>

  <?php
    include_once 'base.php';

    session_start();
  ?>

  <?php

  if ($_SESSION["nickname"] == "나키") {  ?>
    
  <body>

    <div class="pufu-crawling-row1">
      <span>▶ 데이터베이스</span>
      <span>▶ 메타</span>
    </div>

    <div class="pufu-crawling-row1">
      <span>▶ 데이터베이스</span>
      <span>▶ 메타</span>
    </div>

  </body>

  <?php  }  ?>

</html>
