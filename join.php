<?php
include('header.php');
include('./php/dbconn.php');

?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입 | 대한항공</title>
  <!-- 2. JQUERY.COM에서 CND방식으로 연결 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<body>
  <main>
    <section class="register">
      <h2>회원가입</h2>
      <form name="회원가입" method="post" action="./php/join_update.php"  onsubmit="return formCheck();" id="join_form">
        <!-- No -->
        <!-- mb_id 아이디 -->
        <p>
          <label for="mb_id">아이디</label>
          <input type="text" id="mb_id" name="mb_id" max-length="16" placeholder="아이디를 입력해주세요">
          <!-- <input type="button" value="아이디 중복확인" id="id_check" name="id_check"> -->
          <div class="id_check"></div>
        </p>

        <!-- mb_password 비번 -->
        <p>
          <label for="mb_password">비밀번호</label>
          <input type="password" id="mb_password" name="mb_password" max-length="16" placeholder="비밀번호를 입력해주세요">
        </p>

        <!-- mb_name 이름 -->
        <p>
          <label for="mb_name">이름</label>
          <input type="text" id="mb_name" name="mb_name" placeholder="이름을 입력해주세요">
        </p>        

        <!-- mb_date 입력 날짜 -->

        <!-- 입력버튼 -->
        <p>
          <input type="submit" value="가입하기" id="sub_btn">
          <input type="reset" value="가입취소" id="reset_btn">
        </p>
      </form>
    </section>
  </main>
  <script>
    function formCheck(){
      let id = document.getElementById('mb_id').value;
      let password = document.getElementById('mb_password').value;
      let name = document.getElementById('mb_name').value;
      
      if(id.length <1){
        alert('아이디를 입력하지 않았습니다');
        id.focus();
        return false;
      }
      if(password.length <1){
        alert('비밀번호를 입력하지 않았습니다');
        password.focus();
        return false;
      }
      if(name.length <1){
        alert('이름을 입력하지 않았습니다');
        name.focus();
        return false;
      }
      return true;
    };


$(document).ready(function(){
    // 아이디에 키보드를 누르면 바로 함수가 실행된다. (keyup)
    $('#mb_id').on('keyup',function(){
      let self = $(this);
      let mb_id;

      //아이디가 일치하면 (아이디 입력 폼에 값이 일치하면)
      if(self.attr("id") === "mb_id"){
        mb_id = self.val(); //입력한 값을 변수에 담는다
      };
      $.post(
        "./php/id_check.php",
        {mb_id:mb_id},
        function(data){
          if(data){
            self.parent().parent().find('div').html(data);
            self.parent().parent().find('div').addClass('id_check');
          };
        });
    });
});
  </script>

</body>
</html>