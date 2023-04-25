<?php

$part = explode('/', $_SERVER['REDIRECT_URL']);

// GET, POST, PUT, DELETE
if ($part[1] == 'products') {
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($part[2]) && is_numeric($part[2])) {
      $id = $part[2];
      require_once 'read_one.php';
    } else {
      require_once 'read_all.php';
    }
  } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'create.php';
  } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if (isset($part[2]) && is_numeric($part[2])) {
      $id = $part[2];
      require_once 'update.php';
    } else {
      echo "수정할 아이디를 URL에 입력해주세요.";
    }
  } elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    if (isset($part[2]) && is_numeric($part[2])) {
      $id = $part[2];
      require_once 'delete.php';
    } else {
      echo "삭제할 아이디를 URL에 입력해주세요.";
    }
  } else {
    echo "페이지를 찾을 수 없습니다.";
  }
}
