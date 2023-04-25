<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

require_once './core/config.php';
require_once './core/product.php';

// 인스턴스 생성
$product = new Product($db);
$product->id = $id;

if ($product->delete()):
  $a = ["message" => "상품 삭제됨."];
  echo json_encode($a);
else:
  $a = ["message" => "상품 삭제되지 않음"];
  echo json_encode($a);
endif;
