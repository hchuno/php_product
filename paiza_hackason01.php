<?php

list($pricesNum, $campaignDays) = explode(" ", trim(fgets(STDIN)));
$pricesNum = intval($pricesNum);
$campaignDays = intval($campaignDays);

$productPrices = array();
$campaignPrices = array();
for ($i=0; $i<$pricesNum; $i++) {
  $productPrices[] = intval(trim(fgets(STDIN)));
}
for ($i=0; $i<$campaignDays; $i++) {
  $campaignPrices[] = intval(trim(fgets(STDIN)));
}

sort($productPrices);
$middleNum = floor($pricesNum/2);
$head = 0;
$tail = 0;
foreach ($campaignPrices as $campaignPrice) {
  $headNum = 0;
  $tailNum = 0;
  $maxTmp = 0;
  if ($campaignPrice - $productPrices[0] > $productPrices[$middleNum]) {
    // 最後尾
    $tailNum = $pricesNum - 1;
  } else {
    // 真ん中の値
    $tailNum = $middleNum;
  }
  $head = $productPrices[$headNum];
  $tail = $productPrices[$tailNum];
  while ($head < $tail) {
    $totalPrice = $head + $tail;
    if ($totalPrice === $campaignPrice) {
      $maxTmp = $totalPrice;
      break;
    } elseif ($totalPrice > $campaignPrice) {
      $tailNum--;
    } elseif ($totalPrice < $campaignPrice) {
      $headNum++;
      if ($maxTmp < $totalPrice) {
        $maxTmp = $totalPrice;
      }
    }
    $head = $productPrices[$headNum];
    $tail = $productPrices[$tailNum];
  }
  echo $maxTmp."\n";
}
