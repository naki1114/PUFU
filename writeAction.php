<?php
  include_once 'connect.php';

  session_start();

  // 닉네임 수정
  
  $nickname = $_SESSION["nickname"];
  $title = $_POST["title"];
  $content = $_POST["content"];
  $image = $_POST["image"];

  $regist = "INSERT INTO bulletin(nickname, title, content, image) VALUES('$nickname', '$title', '$content', '$image')";
  $result = mysqli_query($connect, $regist);

  if($result) {  ?>
    <script>
      alert('게시글이 등록 되었습니다.');
      location.replace("board.php");
    </script>
<?php
  }
?>