<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once './core/config.php';
require_once './core/product.php';

// 인스턴스 생성
$product = new Product($db);

$stmt = $product->get_all();

$num = $stmt->rowCount();

if ($num > 0):
  $product_arr = [];
  $product_arr['data'] = [];

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $product_item = [
      'id' => $id,
      'name' => $name,
      'price' => $price,
      'stock' => $stock,
      'created_at' => $created_at
    ];

    array_push($product_arr['data'], $product_item);
  }

  echo json_encode($product_arr);

else:
  echo json_encode(['message' => '제품을 찾을 수 없습니다.']);

endif;
