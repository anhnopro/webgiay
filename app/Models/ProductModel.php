<?php

namespace App\Models;

use PDO;

class ProductModel extends BaseModel
{
    protected $tableName = "product";

    public static function listprdDetail($id)
    {
        $model = new static;
        $sql = "SELECT 
    p.name AS product_name,
    p.image,
    p.price,
    p.sale_price,
    p.describe,
    c.name AS category_name,
    GROUP_CONCAT(CONCAT(a.name, ': ', a.value) SEPARATOR ', ') AS attributes
    FROM product p
    JOIN category c ON p.id_category = c.id_category
    JOIN product_attr pa ON p.id_product = pa.id_product 
    JOIN attribute a ON pa.id_attribute = a.id_attribute
    WHERE p.id_product = :id
    GROUP BY p.id_product, p.name, p.image, p.price, p.sale_price, p.describe, c.name;

        ";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
