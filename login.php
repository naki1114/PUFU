<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 로그인</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">

  </head>

  <?php
    include_once 'base.php';

    echo $_POST["title"];
  ?>

  <body>
    
    <div class="pufu-login-row1">
      <span>&nbsp;</span>
      <span class="span-location">
        <div class="login-box">
          <form method="post">
            <input class="input-size" type="text" name="id" minlength="6" maxlength="12" placeholder="아이디 (6~12자 이내)"><br><br>
            <input class="input-size" type="password" name="pw" minlength="8" maxlength="20" placeholder="비밀번호 (8~20자 이내)"><br><br>
            <input class="login-button indigo" type="submit" formaction="loginAction.php" value="로그인">
            <input class="join-button indigo" type="submit" formaction="join.php" value="회원가입">
          </form>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>
    
  </body>

</html>
