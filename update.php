<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

require_once './core/config.php';
require_once './core/product.php';

// 인스턴스 생성
$product = new Product($db);

// get raw posted data
$data = json_decode(file_get_contents("php://input"));

if (isset($data)):
  $product->name = $data->name;
  $product->price = $data->price;
  $product->stock = $data->stock;
  $product->id = $id;

  if ($product->update()):
    $a = ["message" => "상품 업데이트됨."];
    echo json_encode($a);
  else:
    $a = ["message" => "상품 업데이트 되지 않음"];
    echo json_encode($a);
  endif;
endif;
