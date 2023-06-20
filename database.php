<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 데이터베이스</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="database.css">

  </head>

  <?php
    include_once 'base.php';

    $_SESSION["page"] = "database.php";
  ?>

  <body>

    <div class="pufu-database-row1">
      <span>&nbsp;</span>
      <span><h2>◈ 데이터베이스</h2></span>
      <span>&nbsp;</span>
    </div>

    <div class="pufu-database-row1">
      <span>&nbsp;</span>
      <span>
        <div>
          <span>레벨 : <span id="level"></span></span>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>

    <div class="pufu-database-row2">
      <span>&nbsp;</span>
      <span>
        <div>
          <input type="range" class="slider" id="slider" min="1" max="15" value="15">
        </div>
      </span>
      <span>&nbsp;</span>
    </div>

    <script>
      var slider = document.getElementById("slider");
      var output = document.getElementById("level");
      output.innerHTML = slider.value;

      slider.oninput = function() {
        output.innerHTML = this.value;
      }
    </script>

  </body>

</html>
