<!DOCTYPE html>
<html>

  <head>

    <title>포유뽀유 - 마이페이지</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="userpage.css">

  </head>

  <?php
    include_once 'base.php';
  ?>

  <body>
    
    <div class="pufu-info-row1">
      <span>&nbsp;</span>
      <span class="span-location">
        <div class="info-box">
          <form method="post">
            <p>아이디 : <?php echo $_SESSION["id"];?></p>
            <p>닉네임 : <?php echo $_SESSION["nickname"];?></p>
            <input class="logout-button indigo" type="submit" formaction="logoutAction.php" value="로그아웃">
            <input class="withdraw-button red" type="submit" formaction="withdraw.php" value="회원탈퇴">
          </form>
        </div>
      </span>
      <span>&nbsp;</span>
    </div>
    
  </body>

</html>
