<?php
namespace App\Models;
class ProductAttrModel extends BaseModel{
    protected $tableName='product_attr';
    public static function exists($id_product, $id_attribute) {
        $model = new static;
        $model->sqlBuilder = "SELECT COUNT(*) FROM $model->tableName WHERE id_product = :id_product AND id_attribute = :id_attribute";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute(['id_product' => $id_product, 'id_attribute' => $id_attribute]);
        return $stmt->fetchColumn() > 0;
    }
    public static function deleteByProductAndAttribute($id_product, $id_attribute) {
        $model = new static;
        $model->sqlBuilder = "DELETE FROM $model->tableName WHERE id_product = :id_product AND id_attribute = :id_attribute";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        return $stmt->execute(['id_product' => $id_product, 'id_attribute' => $id_attribute]);
    }
}
?>