<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 게시판</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="write.css">

  </head>

  <?php
    include_once 'base.php';

    $_SESSION["page"] = "board.php";

    $no = $_SESSION["ex_no"];
    $title = $_SESSION["ex_title"];
    $content = $_SESSION["ex_content"];
    $nickname = $_SESSION["ex_nickname"];
  ?>

  <body>

    <div class="pufu-write-row1">
      <span>&nbsp;</span>
      <span><h2>◈ 자유게시판</h2></span>
      <span>&nbsp;</span>
    </div>

    <div class="pufu-write-row2">
      <span>&nbsp;</span>
      <span class="textarea-position">
        <form method="get">
          <div class="textarea-position">
            <textarea name="title" class="textarea-title" rows="1" maxlength="100"><?php echo $title; ?></textarea>
            <textarea name="nickname" style="display:none;"><?php echo $nickname; ?></textarea>
            <textarea name="no" style="display:none;"><?php echo $no; ?></textarea>
          </div>
          <div>
            <textarea name="content" class="textarea-content" maxlength="500"><?php echo $content; ?></textarea>
          </div>
          <div>
            <button type="submit" class="regist-button indigo" formaction="modifyAction.php">수정</button>
            <button type="submit" class="cancel-button gray" formaction="read.php">취소</button>
          </div>
        </form>
      </span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>
