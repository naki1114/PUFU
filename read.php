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

    $no = $_GET["no"];
    $title = $_GET["title"];
    $nickname = $_GET["nickname"];

    $get_bulletin = "SELECT * FROM bulletin;";
    $bulletin_query = mysqli_query($connect, $get_bulletin);

    $count = mysqli_num_rows($bulletin_query);

    $get_content = "SELECT * FROM bulletin WHERE nickname = '$nickname' AND title = '$title';";
    $content_query = mysqli_query($connect, $get_content);

    $read = mysqli_fetch_assoc($content_query);
    $content = $read['content'];

    $_SESSION["ex_no"] = $no;
    $_SESSION["ex_title"] = $title;
    $_SESSION["ex_content"] = $content;
    $_SESSION["ex_nickname"] = $nickname;

    $check_bulletin = "SELECT * FROM bulletin WHERE num = $no;";
    $check_query = mysqli_query($connect, $check_bulletin);

    $check = mysqli_fetch_assoc($check_query);

    if ($title == $check['title'] && $content == $check['content'] && $nickname == $check['nickname']) {
      $read_bulletin = 1;
    }
  ?>

  <body>

    <div class="pufu-read-row1">
      <span>&nbsp;</span>
      <span><h2>◈ 자유게시판</h2></span>
      <span>&nbsp;</span>
    </div>

    <form method="post">

<?php
  if ($read_bulletin == 1) {  ?>
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
          <button formaction="modify.php" class="modify-button indigo">수정</button>
          <button formaction="deleteAction.php" class="delete-button red">삭제</button>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>
<?php }
  }
  else { ?>
    
    <div class="pufu-read-row2">
      <span>&nbsp;</span>
      <span><h2>존재하지 않는 게시글입니다.</h2></span>
      <span>&nbsp;</span>
    </div>

<?php }  ?>

    </form>

  </body>

</html>