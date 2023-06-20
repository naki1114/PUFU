<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 회원가입</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="join.css">

<?php
    include_once 'connect.php';

    $get_info = "SELECT * FROM user_info";
    $info_query = mysqli_query($connect, $get_info);
    $info_count = mysqli_num_rows($info_query);

    for ($count = 1; $count <= $id_count; $count++) {
      $get_id = "SELECT * FROM user_info WHERE num = $count;";
      $id_query = mysqli_query($connect, $get_id);
      $id_list = mysqli_fetch_assoc($id_query);
    }
?>

    <script>
      function check_pw() {
        var pw1 = document.getElementById('pw1').value;
        var pw2 = document.getElementById('pw2').value;

        if (pw1 !='' && pw2 !='') {
          if (pw1 == pw2) {
            document.getElementById('check').innerHTML='비밀번호가 일치합니다.'
            document.getElementById('check').style.color='blue';
          }
          else {
            document.getElementById('check').innerHTML='비밀번호가 일치하지 않습니다.';
            document.getElementById('check').style.color='red';
          }
        }
      }

      function check_id() {
        var id = document.getElementById('id').value;

        if (<?php echo $id_check; ?> == 1) {
          document.getElementById('recheck').innerHTML='사용가능한 아이디입니다.'
          document.getElementById('recheck').style.color='blue';
        }
        else {
          document.getElementById('recheck').innerHTML='중복된 아이디입니다.'
          document.getElementById('recheck').style.color='red';
        }
      }
    </script>

  </head>

  <?php
    session_start();

    if ($_SESSION["page"]) {

    }
    else {
      $_SESSION["page"] = "index.php";
    }
  ?>

  <body>

  <div class="pufu-join-row1">
      <span>&nbsp;</span>
      <span class="span-location">
        <div class="join-box">
          <form method="post">
            <h1>회 원 가 입</h1>
            <input class="input" type="text" name="id" id="id" minlength="6" maxlength="12" onchange="check_id()" placeholder="아이디 (6~12자 이내)"><br><br>
            <!-- <input class="recheck-button indigo" type="button" value="중복검사" id="recheck" onchange="check_id()"><br><br> -->
            <input class="input" type="text" name="nickname" minlength="2" maxlength="10" placeholder="닉네임 (2~10자 이내)"><br><br>
            <input class="input" type="password" onchange="check_pw()" name="pw" id="pw1" minlength="8" maxlength="20" placeholder="비밀번호 (8~20자 이내)"><br><br>
            <input class="input" type="password" onchange="check_pw()" name="pw_re" id="pw2" minlength="8" maxlength="20" placeholder="비밀번호 재입력"><br><br>
            <div id="check"></div><br><br>
            <input class="check-button indigo" type="submit" value="확인" formaction="joinAction.php">
            <input class="check-button gray" type="submit" value="취소" formaction="<?php echo $_SESSION["page"]?>">
          </form>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>
