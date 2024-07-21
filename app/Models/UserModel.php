<?php
namespace App\Models;
use PDO;
class UserModel extends BaseModel{
    protected $tableName='user';
    public static function login($email,$password){
    $model = new static;
      $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
      $stmt = $model->conn->prepare($sql);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR); // Cần mã hóa mật khẩu nếu có
      $stmt->execute();
      $result = $stmt->fetch();

      return $result;

    }
}
?>