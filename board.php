<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 게시판</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="board.css">

  </head>

  <?php
    include_once 'base.php';

    $_SESSION["page"] = "board.php";
    
    if ($_POST["page_number"]) {

    }
    else {
      $_POST["page_number"] = 1;
    }

    $get_count = "SELECT * FROM bulletin;";
    $data = mysqli_query($connect, $get_count);
    $count = mysqli_num_rows($data);

    // 페이지당 게시글 개수
    $per_page = 10;

    if ($count % $per_page == 0) {
      $total_page = $count / $per_page;
    }
    else {
      $total_page = ($count - ($count % $per_page)) / $per_page + 1;
    }
  ?>

  <body>

    <div class="pufu-board-row1">
      <span>&nbsp;</span>
      <span><h2>◈ 자유게시판</h2></span>
      <span>&nbsp;</span>
    </div>

<?php
    if ($_SESSION["id"]) {  ?>
    <div class="pufu-board-row2">
      <span>&nbsp;</span>
      <span>
        <button onclick="location.href='write.php';" style="float:right;">글쓰기</button>
      </span>
      <span>&nbsp;</span>
    </div>
<?php
    } ?>

    <div class="pufu-board-row3">
      <span>&nbsp;</span>
      <span>
        <table class="text">
          <thead>
            <tr>
              <th style="width:100px;">No</th>
              <th style="width:700px;">제목</th>
              <th style="width:200px;">닉네임</th>
            </tr>
          </thead>
          <tbody>
<?php       for ($no = $count - (($_POST["page_number"] - 1) * $per_page); $no > $count - (($_POST["page_number"] - 1) * $per_page) - $per_page; $no--) {
              if ($no > 0) {
              $get_board = "SELECT title, nickname FROM bulletin WHERE num=$no;";
              $board_query = mysqli_query($connect, $get_board);

              $board = mysqli_fetch_assoc($board_query);
              $title = $board['title'];
              $nickname = $board['nickname'];  ?>
              <tr>
                <form method="post">
                  <td>
                    <input type="text" class="no-input" name="no" value="<?php echo $no;?>" readonly>
                  </td>
                  <td>
                    <input type="submit" class="title-input" name="title" value="<?php echo $title;?>" formaction="read.php">
                  </td>
                  <td>
                    <input type="text" class="title-input" name="nickname" value="<?php echo $nickname;?>" readonly>
                  </td>
                </form>
              </tr>
<?php         }
            }  ?>
          </tbody>
        </table>
      </span>
      <span>&nbsp;</span>
    </div>

    <div class="pufu-board-row4">
      <span>&nbsp;</span>
      <span>
        <div style="text-align:center;">
        <form method="post">
<?php   for ($num = 1; $num <= $total_page; $num++) {  
          if ($_POST["page_number"] == $num) {  ?>
            <input type="submit" class="page-button-onclick" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php     }
          else {  ?>
            <input type="submit" class="page-button" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php     }  ?>
<?php   }  $_POST["page_number"] = null; ?>
        </form>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>
