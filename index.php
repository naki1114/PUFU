<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 홈</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">

  </head>

  <?php
    include_once 'base.php';

    $_SESSION["page"] = "index.php";

    $get_count = "SELECT * FROM bulletin;";
    $data = mysqli_query($connect, $get_count);
    $count = mysqli_num_rows($data);
  ?>

  <body>

    <div class="pufu-main-row1">
      <span>&nbsp;</span>
      <span><h2>▶ 데이터베이스</h2></span>
      <span><h2>▶ 최근 게시글</h2></span>
      <span><h2>▶ 메타</h2></span>
      <span>&nbsp;</span>
    </div>

    <div class="pufu-main-row2">
      <span>&nbsp;</span>
      <span>&nbsp;</span>
      <span>
        <table>
          <tbody>
<?php       for ($no = $count; $no > $count - 5; $no--) {
              $get_board = "SELECT title, nickname FROM bulletin WHERE num=$no;";
              $board_query = mysqli_query($connect, $get_board);

              $board = mysqli_fetch_assoc($board_query);
              $title = $board['title'];
              $nickname = $board['nickname'];  ?>
            <tr>
              <td><?php echo $title; ?></td>
            </tr>
<?php       }  ?>
          </tbody>
        </table>
      </span>
      <span>&nbsp;</span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>