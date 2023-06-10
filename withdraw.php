<?php
  include_once 'connect.php';

  session_start();

  $id = $_SESSION["id"];
  
  $withdraw = "DELETE FROM user_info WHERE id = '$id';
               SET @CNT = 0;
               UPDATE user_info SET num = @CNT := @CNT + 1;
               ALTER TABLE user_info AUTO_INCREMENT = 1;";

  mysqli_multi_query($connect, $withdraw);  ?>

  <script>
    alert("회원탈퇴 되었습니다.");
    location.replace("<?php echo $_SESSION["page"]?>");
  </script>

<?php
  session_destroy();
?>