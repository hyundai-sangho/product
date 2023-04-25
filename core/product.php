<?php

class Product
{
  private $conn;
  private $table = 'products';

  public $id;
  public $name;
  public $price;
  public $stock;
  public $created_at;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function get_all()
  {
    $sql = "SELECT * FROM $this->table";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt;
  }

  // 개별 read
  public function get_one()
  {
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (empty($row)) {
      throw new Exception("상품이 존재하지 않습니다.");
    } else {
      $this->name = $row['name'];
      $this->price = $row['price'];
      $this->stock = $row['stock'];
      $this->created_at = $row['created_at'];
    }
  }

  public function create()
  {
    $sql = "INSERT INTO $this->table (name, price, stock) VALUES (:name, :price, :stock)";
    $stmt = $this->conn->prepare($sql);

    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->stock = htmlspecialchars(strip_tags($this->stock));

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':stock', $this->stock);

    if ($stmt->execute()):
      return true;
    endif;

    echo "에러 $stmt->error" . PHP_EOL;
    return false;
  }

  public function update()
  {
    $sql = "UPDATE $this->table SET name = :name, price = :price, stock = :stock WHERE id = :id";
    $stmt = $this->conn->prepare($sql);

    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->stock = htmlspecialchars(strip_tags($this->stock));
    $this->id = htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':stock', $this->stock);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();

    if ($stmt->rowCount() > 0):
      return true;
    else:
      echo "에러 $stmt->error" . PHP_EOL;
      return false;
    endif;
  }

  public function delete()
  {
    $sql = "DELETE FROM $this->table WHERE id = :id";
    $stmt = $this->conn->prepare($sql);

    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();

    if ($stmt->rowCount() > 0):
      return true;
    else:
      return false;
    endif;
  }
}
