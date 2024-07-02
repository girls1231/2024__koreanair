<?php

include('dbconn.php');

$mb_id = trim($_POST['mb_id']);

if($mb_id != NULL){//아이디 값을 전달 받았다면
  $sql = "select * from koreanair_member where mb_id = '$mb_id'";
  $result = mysqli_query($conn, $sql);
  $mb = mysqli_fetch_assoc($result);

  if(isset($mb['mb_id'])){
    echo "사용이 불가능합니다. 이미 존재하는 아이디 입니다.";
  }else{
    echo "사용이 가능합니다.";
  };

};
?>