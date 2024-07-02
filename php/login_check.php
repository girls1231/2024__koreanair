<?php
include('dbconn.php');

$mb_id = trim($_POST['mb_id']);
$mb_password = trim($_POST['mb_password']);

// echo '아이디는 ' , $mb_id.'<br>';
// echo '패스워드는 ' , $mb_password.'<br>';

// 데이터 베이스 비번
$sql = " SELECT * FROM koreanair_member where mb_id = '$mb_id'";
$result = mysqli_query($conn,$sql);
$array = mysqli_fetch_assoc($result);
$password =  $array['mb_password'];

// echo "데이터 베이스 비번은 ".$password.'<br>';

//내가 입력한 비번
$sql = "select PASSWORD('$mb_password') AS pass";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$mb_pwd = $row['pass'];

// echo "내가 입력한 비번은". $mb_pwd.'<br>';

//사용자 암호화 데이터 베이스 암호가 일치하지 않는다면
if(!$array['mb_id']||!($password===$row['pass'])){
  echo "<script>alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.')</script>";
  echo "<script>location.replace('login.php');</script>";
};

// 일치하면 세션정보를 만든다
$_SESSION['ss_mb_id']= $mb_id;

mysqli_close($conn);

if(isset($_SESSION['ss_mb_id'])){
  echo "<script>alert('로그인 성공');</script>";
  echo "<script>location.replace('index.php');</script>";
  session_start();
  $_SESSION['ss_mb_id'] = $mb_id;
};

?>