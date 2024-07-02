<?php
include('header.php');
include('./php/dbconn.php');

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 | 대한항공</title>
  </head>
  <body>
    <main>
      <section class="login">
        <h2>login</h2>
        <form name="login" method="post" action="./php/login_check.php" onsubmit="return form_check();">
          <p>
          <label for="mb_id">아이디</label><input type="text" id="mb_id" name="mb_id" placeholder="아이디를 입력해주세요">
          </p>

          <p>
          <label for="mb_password">패스워드</label><input type="password" id="password" name="mb_password" placeholder="비밀번호를 입력해주세요">
          </p>

          <p>
          <input type="checkbox" id="id_save" name="id_save"><label for="id_save">아이디 저장</label>
          </p>

          <p>
          <input type="submit" value="로그인" id="login_btn">
          <a href="index.html" title="메인으로">로그인 취소</a>
          </p>
            
          <p>
            <a href="join.php" title="회원가입">회원가입</a>
            <a href="id_search.php" title="아이디 찾기">아이디 찾기</a>
            <a href="pw_search.php" title="비밀번호 찾기">비밀번호 찾기</a>
          </p>

          <h3>sns로그인</h3>
          <p>
            <a href="#" title="카카오 로그인">카카오 로그인</a>
            <a href="#" title="네이버 로그인">네이버 로그인</a>
            <a href="#" title="구글 로그인">구글 로그인</a>
          </p>
        </form>
      </section>
    </main>
    <!-- 유효성 검사 -->
    <script>
      function form_check(){
        let mb_id = document.getElementById('mb_id').value;
        let mb_password = document.getElementById('mb_password').value;
        // 아이디 체크
        if(mb_id.length<1){
          alert('아이디를 입력하지 않았습니다.');
          mb_id.focus();
          return false;
        };
        // 패스워드 체크
        if(mb_password.length<1){
          alert('비밀번호를 입력하지 않았습니다.');
          mb_id.focus();
          return false;
        };
        return true;
      };
    </script>
    <!-- style -->
    <style>
      .login{
        width: 80%;
        max-width: 500px;
        margin: 0 auto;
      }
      .login label[for="mb_id"],.login label[for="mb_password"] {
        display: none;
      }

      .login h2{
        text-align: center;
        font-size: 28px;
        text-transform: uppercase;
        margin: 80px 0px 50px 0;
      }

      .login p{
        margin: 10px;
        height: 30px;
        /* line-height: 30px; */
      }

      .login p:first-child input, .login p:nth-child(2) input{
        height: 28px; width: 100%;
        border: none;
        outline: none;
      }
      .login p:nth-child(4){
        display: flex;
        justify-content: space-between;
      }
      .login p:nth-child(4) input, .login p:nth-child(4) a{
        height: 28px; width: 48%;
        color: white;
        border: none; border-radius: 3px;
      }
      .login p:nth-child(4) input{
        background-color: blue;
      }
      .login p:nth-child(4) a{
        display: inline-block;
        background-color: #333;
        line-height: 28px; text-align: center;
      }

      .login p:nth-child(5){
        display: flex;
        justify-content: space-around;
      }
      .login p:nth-child(5) a{
        display: inline-block;
        width: 25%;
        text-align: center;
        line-height: 30px;
      }
    </style>
  </body>
  </html>

