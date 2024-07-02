<?php

  session_start(); //세션시작
  session_unset(); //모든 세션 정보 삭제(언레지스터)
  session_destroy(); //세션해제

  if(!isset($_SESSION['ss_mb_id'])){ //모든 세션정보가 삭제 된다면, 로그인 페이지로 이동
    echo "<script>alert('로그아웃 되었습니다.');</script>";
    echo "<script>location.replace('../index.php');</script>";
    exit;
  }
?>