<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="font.css">
    <link rel="icon" href="/logo/PUFU Logo.png"/> 
    <!-- <link rel="apple-touch-icon" href="PUFU Logo.png"/>  -->

  </head>

  <?php
    include_once 'connect.php';
    session_start();

    if ($_SESSION["page"]) {

    }
    else {
      $_SESSION["page"] = "index.php";
    }
  ?>

  <body>

    <!-- 이미지 -->
    <div class="pufu-row1">
        <span>
          <div class="pufu-lbox-row">
            <span>&nbsp;</span>
            <span>
              <div class="null-box">
                <a href="index.php" class="pufu-logo">
                  <h2>Pokemon Unite</h2>
                  <h2>For You</h2>
                  <h1>포유뽀유</h1>
                </a>
              </div>
            </span>
            <span>&nbsp;</span>
          </div>
        </span>
        <span class="pufu-img"></span>
        <span>
          <div class="pufu-rbox-row">
            <span>&nbsp;</span>
            <span>
              <div class="login-status-box">
<?php
              if ($_SESSION["nickname"]) {  ?>
                <span><?php echo $_SESSION["nickname"]; ?>님, 환영합니다.</span>
                <span>
                  <button class="pufu-login-button indigo" onclick="location.href='userpage.php';">마이페이지</button>
                </span>
                <span>&nbsp;</span>
<?php         }
              else {  ?>
                <span>&nbsp;</span>
                <span>
                  <button class="pufu-login-button indigo" onclick="location.href='login.php';">로그인</button>
                </span>
                <span><a href="join.php" class="login-a">회원가입</a></span>
<?php         }  ?>
              </div>
            </span>
            <span>&nbsp;</span>
          </div>
        </span>
    </div>

    <!-- 메뉴 바 -->
    <div class="pufu-row2">
      <span>
        <div class="indigo">
          <div class="pufu-col s2">
            <a class="pufu-null-button indigo">&nbsp;</a>
          </div>
        </div>
      </span>
      <span style="background-color:#3f51b5;">
        <div class="indigo">
          <div class="pufu-col s2">
            <a href="index.php" class="pufu-button indigo">홈</a>
          </div>
          <div class="pufu-col s2">
            <a href="database.php" class="pufu-button indigo">데이터베이스</a>
          </div>
          <div class="pufu-col s2">
            <a href="meta.php" class="pufu-button indigo">메타</a>
          </div>
          <div class="pufu-col s2">
            <a href="board.php" class="pufu-button indigo">게시판</a>
          </div>
          <div class="pufu-col s2">
            <a href="shop.php" class="pufu-button indigo">상점</a>
          </div>
        </div>
      </span>
      <span>
        <div class="indigo">
          <div class="pufu-col s2">
            <a class="pufu-null-button indigo">&nbsp;</a>
          </div>
        </div>
      </span>
    </div>

  </body>

</html>