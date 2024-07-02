<?php

include('dbconn.php');

// 변수 받아오기
$mb_id = trim($_POST['mb_id']);
// echo '아이디는 : '. $mb_id . '<br>';

$mb_password = trim($_POST['mb_password']);
// echo '비밀번호는 : '. $mb_password . '<br>';

$mb_name = trim($_POST['mb_name']);
// echo '이름은 : '.$mb_name . '<br>';

date_default_timezone_set('Asia/Seoul');
$mb_datetime =  date('Y-m-s H:i:s',time());
// echo '현재 시각은 : ' .$mb_datetime . '<br>';


//비밀번호 암호화 2가지 방법
// $mb_pwd = password_hash($mb_password, PASSWORD_DEFAULT);
  $sql = "select PASSWORD('$mb_password') AS pass";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  $mb_pwd = $row['pass'];

// echo $mb_pwd;

// 전달 받은 값을 데이터 베이스에 자료 입력한다
$sql = "insert into 
koreanair_member (mb_id, mb_password, mb_name, mb_datetime) 
value('$mb_id', '$mb_pwd','$mb_name','$mb_datetime')";

$result = mysqli_query($conn , $sql);

if($result){
  echo "<script>alert('등록되었습니다');</script>";
  echo "<script>location.replace('../login.php');</script>";
}else{
  echo "회원가입 실패 : ". mysqli_error($conn);
  // echo "<script>history.back(-1);</script>";
  mysqli_close($conn);
};
?>

