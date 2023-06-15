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

    if ($_GET["page_number"]) {
      $_SESSION["page_number"] = $_GET["page_number"];
    }
    else {
      $_SESSION["page_number"] = 1;
    }
    
    if ($_SESSION["page_number"]) {

    }
    else {
      $_SESSION["page_number"] = 1;
    }

    $get_count = "SELECT * FROM bulletin;";
    $data = mysqli_query($connect, $get_count);
    $count = mysqli_num_rows($data);

    // 페이지당 게시글 개수
    $per_page = 30;

    if ($count % $per_page == 0) {
      $total_page = $count / $per_page;
    }
    else {
      $total_page = ($count - ($count % $per_page)) / $per_page + 1;
    }

    if ($_GET["page_number"] == "last") {
      $_SESSION["page_number"] = $total_page;
    }
    elseif ($_GET["page_number"] == "first") {
      $_SESSION["page_number"] = 1;
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
<?php       for ($no = $count - (($_SESSION["page_number"] - 1) * $per_page); $no > $count - (($_SESSION["page_number"] - 1) * $per_page) - $per_page; $no--) {
              if ($no > 0) {
              $get_board = "SELECT title, nickname FROM bulletin WHERE num=$no;";
              $board_query = mysqli_query($connect, $get_board);

              $board = mysqli_fetch_assoc($board_query);
              $title = $board['title'];
              $nickname = $board['nickname'];  ?>
              <tr>
                <form method="get">
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
        <form method="get">
<?php
        if ($_SESSION["page_number"] <= 5) {
          for ($num = 1; $num <= 9; $num++) {  
            if ($_SESSION["page_number"] == $num) {  ?>
              <input type="submit" class="page-button-onclick" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php       }
            else {  ?>
              <input type="submit" class="page-button" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php       }  ?>
<?php     }  $_GET["page_number"] = null;  ?>
              <input type="submit" class="page-button" name="page_number" value="last" formaction="board.php">
<?php
        }

        elseif ($_SESSION["page_number"] >= ($total_page - 4)) {  ?>
              <input type="submit" class="page-button" name="page_number" value="first" formaction="board.php">
<?php
          for ($num = $total_page - 8; $num <= $total_page; $num++) {  
            if ($_SESSION["page_number"] == $num) {  ?>
              <input type="submit" class="page-button-onclick" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php       }
            else {  ?>
              <input type="submit" class="page-button" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php       }  ?>
<?php     }  $_GET["page_number"] = null;
        }

        else {  ?>
          <input type="submit" class="page-button" name="page_number" value="first" formaction="board.php">
<?php
          for ($num = $_SESSION["page_number"] - 4; $num <= $_SESSION["page_number"] + 4; $num++) {  
            if ($_SESSION["page_number"] == $num) {  ?>
              <input type="submit" class="page-button-onclick" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php       }
            else {  ?>
              <input type="submit" class="page-button" name="page_number" value="<?php echo $num;?>" formaction="board.php">
<?php       }  ?>
<?php     }  $_GET["page_number"] = null;  ?>
              <input type="submit" class="page-button" name="page_number" value="last" formaction="board.php">
<?php
        }  ?>

        </form>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>
