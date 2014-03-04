<?php

for ($i=1; $i<=40; $i++) {
  $result = $i;
  $flg    = 0;
  if ($result % 3 === 0) {
    $flg = 1;
  } else {
    // 二桁の数字の場合
    $flg = checkForDoubleDigits($result);
  }
  // 3の倍数もしくは3が付く数字の時には！を付ける
  if ($flg) {
    $result .= '!';
  }
  echo $result;
}


function checkForDoubleDigits($num) {
  $flg = false;
  if ($num < 10) {
    return $flg;
  }
  $remainder = $num % 10;
  $hoge = $num - $remainder;
  if ($hoge % 3 === 0)  {
    $flg =1;
  }
  return $flg;
}
