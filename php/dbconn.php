<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '1234';
$mysql_db= 'test';

// 닷홈에서 쓸 때
// $mysql_host = 'localhost'; //호스트명
// $mysql_user = 'sree';      //사용자명
// $mysql_password = "leeseul1!";  //비밀번호
// $mysql_db = 'sree';     //데이터베이스명

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if (!$conn) { // 연결 오류 발생 시 스크립트 종료
  die("연결 실패: " . mysqli_connect_error());
}

session_start(); 

?>