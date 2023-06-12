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

    $title = $_GET["title"];
    $nickname = $_GET["nickname"];
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
              <th><?php echo $_GET["title"]; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="td-nick">작성자 : <?php echo $_GET["nickname"]; ?></td>
            </tr>
            <tr>
              <td>
              <?php
                $get_content = "SELECT * FROM bulletin WHERE nickname = '$nickname' AND title = '$title';";
                $content_query = mysqli_query($connect, $get_content);

                $read = mysqli_fetch_assoc($content_query);
                $content = $read['content'];

                echo $content;
              ?>
              </td>
            </tr>
          </tbody>
        </table>
      </span>
      <span>&nbsp;</span>
    </div>

<?php
  if ($nickname == $_SESSION["nickname"]) {
    $_SESSION["title"] = $title;  ?>
    <div class="pufu-read-row3">
      <span>&nbsp;</span>
      <span>
        <div>
          <button onclick="location.href='modifyAction.php';" class="modify-button indigo">수정</button>
          <button onclick="location.href='deleteAction.php';" class="delete-button red">삭제</button>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>
<?php } ?>

  </body>

</html>