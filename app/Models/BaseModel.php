<?php

namespace App\Models;

use PDO;

class BaseModel
{
  protected $conn;
  protected $tableName;
  protected $sqlBuilder;
  protected $primary = "id";
  public function __construct()
  {
    try {
      $host = HOSTNAME;
      $dbname = DBNAME;
      $username = USERNAME;
      $password = PASSWORD;
      $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
      $this->conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_AUTOCOMMIT);
    } catch (\Throwable $th) {
      echo "Không kết nối được CSDL $th";
    }
  }
  public static function all()
  {
    $model = new static;
    $model->sqlBuilder = "SELECT *from $model->tableName";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function add($data) {
    $model = new static;
    $model->sqlBuilder = "INSERT INTO $model->tableName (";
    $values = "";
    foreach ($data as $column => $value) {
        $model->sqlBuilder .= "`{$column}`, ";
        $values .= ":{$column}, ";
    }

    $model->sqlBuilder = rtrim($model->sqlBuilder, ", ") . ")";
    $values = "VALUES (" . rtrim($values, ", ") . ")";
    $model->sqlBuilder .= " " . $values;
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute($data);
    return $model->conn->lastInsertId();
}
}
