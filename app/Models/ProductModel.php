<?php

namespace App\Models;

use PDO;

class ProductModel extends BaseModel
{
    protected $primary = 'id_product';
    protected $tableName = "product";
    public static function listPrdHome()
    {
        $model = new static;

        $sql = "SELECT p.id_product as id, 
        p.name AS product_name,
         p.price, 
         p.sale_price, 
        p.image,
         p.describe, 
         p.status,
         c.name AS category_name,
          c.id_category 
        from product p join category c on p.id_category =c.id_category 
        where p.status=1
        ORDER BY p.id_product limit 8 ";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function listprdDetail($id)
    {
        $model = new static;
        $sql = "SELECT 
    p.id_product as id,
    p.name AS product_name,
  
    p.image,
    p.price,
    p.sale_price,
    p.describe,
    c.name AS category_name,
    GROUP_CONCAT(CONCAT(a.name, ': ', a.value) SEPARATOR ', ') AS attributes,
     GROUP_CONCAT(CASE WHEN a.name = 'size' THEN a.value END) AS sizes,
     GROUP_CONCAT(CASE WHEN a.name = 'color' THEN a.value END) AS colors
    FROM product p
    JOIN category c ON p.id_category = c.id_category
    JOIN product_attr pa ON p.id_product = pa.id_product 
    JOIN attribute a ON pa.id_attribute = a.id_attribute
    WHERE p.id_product = :id
    GROUP BY p.id_product, p.name, p.image, p.price, p.sale_price, p.describe, c.name";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
   
    public static function updateProduct($id, $data)
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
    public static function updateProductAttributes($productId, $attributeName, $attributeValues)
    {
        $model = new static;

        $sql = "DELETE pa FROM product_attr pa
                JOIN attribute a ON pa.id_attribute = a.id_attribute
                WHERE pa.id_product = :productId AND a.name = :attributeName";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(['productId' => $productId, 'attributeName' => $attributeName]);

        // Insert new attributes
        foreach ($attributeValues as $value) {
            if (!empty($value)) {
                // Check if attribute already exists
                $sql = "SELECT id_attribute FROM attribute WHERE name = :name AND value = :value";
                $stmt = $model->conn->prepare($sql);
                $stmt->execute(['name' => $attributeName, 'value' => $value]);
                $attribute = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($attribute) {
                    $attributeId = $attribute['id_attribute'];
                } else {
                    // Insert new attribute
                    $sql = "INSERT INTO attribute (name, value) VALUES (:name, :value)";
                    $stmt = $model->conn->prepare($sql);
                    $stmt->execute(['name' => $attributeName, 'value' => $value]);
                    $attributeId = $model->conn->lastInsertId();
                }

                // Insert into product_attr
                $sql = "INSERT INTO product_attr (id_product, id_attribute) VALUES (:productId, :attributeId)";
                $stmt = $model->conn->prepare($sql);
                $stmt->execute(['productId' => $productId, 'attributeId' => $attributeId]);
            }
        }
    }
    
}
