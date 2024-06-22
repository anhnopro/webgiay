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
  public static function where($column, $codition, $value)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$column` $codition '$value' ";
    return $model;
  }
  public function get()
  {
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function add($data)
  {
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
  public static function find($id){
    $model=new static; 
    $model->sqlBuilder="SELECT *from $model->tableName where $model->primary=:$model->primary";
    $stmt=$model->conn->prepare($model->sqlBuilder);
    $data=["$model->primary"=>$id];
    $stmt->execute($data);
    $result= $stmt->fetchAll(PDO::FETCH_CLASS);
    if($result){
      return $result[0];
    }
   
  }
  public static function update($id, $data)
  {
      $model = new static;
      $model->sqlBuilder = "UPDATE $model->tableName SET ";
      foreach ($data as $column => $value) {
          $model->sqlBuilder .= "`{$column}`=:$column, ";
      }
      //Xóa dấu ", " ở cuối chuỗi
      $model->sqlBuilder = rtrim($model->sqlBuilder, ", ");
      //Thêm điều kiện cho câu lệnh SQL
      $model->sqlBuilder .= " WHERE `$model->primary`=:$model->primary";

      $stmt = $model->conn->prepare($model->sqlBuilder);
      //Thêm $id vào $data
      $data["$model->primary"] = $id;
      return $stmt->execute($data);
  }
  public static function delete($id){
    $model=new static;
    $model->sqlBuilder = "DELETE FROM $model->tableName WHERE `$model->primary`=:$model->primary";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    return $stmt->execute(["$model->primary" => $id]);
  }
}
