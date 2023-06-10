<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 자유게시판</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="read.css">

  </head>

  <?php
    include_once 'base.php';

    $_SESSION["page"] = "board.php";
  ?>

  <body>

    <div class="pufu-read-row1">
      <span>&nbsp;</span>
      <span><h2>◈ 자유게시판</h2></span>
      <span>&nbsp;</span>
    </div>

    <div class="pufu-read-row2">
      <span>&nbsp;</span>
      <span>
        <table class="text">
          <thead>
            <tr>
              <th><?php echo $_POST["title"]; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $_POST["nickname"]; ?></th>
            </tr>
          </tbody>
        </table>
      </span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>
