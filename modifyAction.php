<?php
  include_once 'connect.php';

  session_start();

  $before_title = $_SESSION["ex_title"];
  $before_content = $_SESSION["ex_content"];
  $before_nickname = $_SESSION["ex_nickname"];

  $title = $_GET["title"];
  $nickname = $_GET["nickname"];
  $content = $_GET["content"];

  $modify = "UPDATE bulletin SET title = '$title', content = '$content' WHERE title = '$before_title' AND content = '$before_content' AND nickname = '$before_nickname';";
  $modify_query = mysqli_query($connect, $modify);
?>

  <script>
    alert('게시글이 수정되었습니다');
    location.replace("board.php");
  </script>