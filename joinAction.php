<?php
  include_once 'connect.php';
  
  session_start();

  $id = $_POST["id"];
  $pw = $_POST["pw"];
  $pw_re = $_POST["pw_re"];
  $nickname = $_POST["nickname"];

  $get_id = "SELECT * FROM user_info WHERE id='$id';";
  $get_nickname = "SELECT * FROM user_info WHERE nickname='$nickname';";
  $id_query = mysqli_query($connect, $get_id);
  $nickname_query = mysqli_query($connect, $get_nickname);

  $id_row = mysqli_num_rows($id_query);
  $nickname_row = mysqli_num_rows($nickname_query);

  function checkPW($pw_str) {
    $password = $pw_str;
    $num = preg_match('/[0-9]/u', $password);
    $eng = preg_match('/[a-z]/u', $password);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$password);

    if(strlen($password) < 8 || strlen($password) > 20)
    {
      return array(false,"비밀번호는 영문, 숫자, 특수문자를 혼합하여 최소 8자리 ~ 최대 20자리 이내로 입력해주세요.");
      exit;
    }
 
    if(preg_match("/\s/u", $password) == true)
    {
      return array(false, "비밀번호는 공백없이 입력해주세요.");
      exit;
    }
 
    if( $num == 0 || $eng == 0 || $spe == 0)
    {
      return array(false, "영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
      exit;
    }
 
    return array(true);
  }

  $pwCheck = checkPW($pw);

  if ($id_row == 0) {
    if ($nickname_row == 0) {
      if ($pwCheck[0] == true) {
        if ($pw == $pw_re) {
          $join = "INSERT INTO user_info(id, password, nickname) VALUES('$id', '$pw', '$nickname')";
          $result = mysqli_query($connect, $join);  ?>
          <script>
            alert('성공적으로 회원 가입 되었습니다.');
            location.replace("<?php echo $_SESSION["page"]; ?>");
          </script>
<?php
        }
        else {  ?>
          <script>
            alert('비밀번호가 일치하지 않습니다.');
            location.replace("join.php");
          </script>
<?php
        }
    }
    else {  ?>
      <script>
        alert('<?php echo $pwCheck[1]; ?>');
        location.replace("join.php");
      </script>
<?php
      }
    }
    else {  ?>
      <script>
        alert('닉네임이 중복되었습니다.');
        location.replace("join.php");
      </script>
<?php      
    }
  }
  else {  ?>
    <script>
      alert('아이디가 중복되었습니다.');
      location.replace("join.php");
    </script>
<?php
  }
?>