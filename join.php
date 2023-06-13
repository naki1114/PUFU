<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 회원가입</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="join.css">

  </head>

  <?php
    include_once 'base.php';
  ?>

  <body>

  <div class="pufu-join-row1">
      <span>&nbsp;</span>
      <span class="span-location">
        <div class="join-box">
          <form method="post">
            <input class="input-size" type="text" name="id" minlength="6" maxlength="12" placeholder="아이디 (6~12자 이내)"><br><br>
            <input class="input-size" type="text" name="nickname" minlength="2" maxlength="10" placeholder="닉네임 (2~10자 이내)"><br><br>
            <input class="input-size" type="password" name="pw" minlength="8" maxlength="20" placeholder="비밀번호 (8~20자 이내)"><br><br>
            <input class="input-size" type="password" name="pw_re" minlength="8" maxlength="20" placeholder="비밀번호 재입력"><br><br>
            <input class="join-button indigo" type="submit" value="확인" formaction="joinAction.php">
            <input class="cancel-button gray" type="submit" value="취소" formaction="<?php echo $_SESSION["page"]?>">
          </form>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>

  </body>

</html>
