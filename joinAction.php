<?php
  include_once 'connect.php';
  
  session_start();

  $id = $_POST["id"];
  $pw = $_POST["pw"];
  $pw_re = $_POSG["pw_re"];
  $nickname = $_POST["nickname"];

  $join = "INSERT INTO user_info(id, password, nickname) VALUES('$id', '$pw', '$nickname')";
  $result = mysqli_query($connect, $join);

  if($result) {  ?>
    <script>
      alert('성공적으로 회원 가입 되었습니다.');
      location.replace("<?php echo $_SESSION["page"]; ?>");
    </script>
<?php
  }
  else{  ?>
    <script>
      alert("fail");
    </script>
<?php
  }
?>