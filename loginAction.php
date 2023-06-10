<?php
  include_once 'connect.php';
  session_start();

  $id = $_POST["id"];
  $pw = $_POST["pw"];

  $user_info = "SELECT * FROM user_info WHERE id='$id';";
  $result = mysqli_query($connect, $user_info);

  if(mysqli_num_rows($result) == 1) {
 
    $row = mysqli_fetch_assoc($result);

    if($row['password'] == $pw){

      $_SESSION["id"] = $row['id'];
      $_SESSION["pw"] = $row['password'];
      $_SESSION["nickname"] = $row['nickname'];

      if($_SESSION["id"]){  ?>
        <script>
          alert("로그인 되었습니다.");
          location.replace("<?php echo $_SESSION["page"]; ?>");
        </script>
<?php
      }
      else {  ?>
        <script>
          alert("로그인 실패");
          location.replace("login.php");
        </script>
<?php
      }
    }
    else {  ?>
      <script>
        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
        location.replace("login.php");
      </script>
<?php
    }

  }
  else{  ?>
    <script>
      alert("아이디 혹은 비밀번호가 잘못되었습니다.");
      location.replace("login.php");
    </script>
<?php
  }
?>