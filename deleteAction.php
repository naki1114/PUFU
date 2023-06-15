<?php
  include_once 'connect.php';

  session_start();

  $title = $_SESSION["ex_title"];
  $nickname = $_SESSION["ex_nickname"];
  
  $delete = "DELETE FROM bulletin WHERE title = '$title' AND nickname = '$nickname';
             SET @CNT = 0;
             UPDATE bulletin SET num = @CNT := @CNT + 1;
             ALTER TABLE bulletin AUTO_INCREMENT = 1;";

  mysqli_multi_query($connect, $delete);  ?>

  <script>
    alert("게시글이 삭제되었습니다.");
    location.replace("board.php");
  </script>